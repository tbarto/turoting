<?php namespace Atticmedia\Anvard;

use Hybrid_Auth;
use Hybrid_Provider_Adapter;
use Hybrid_User_Profile;
use Illuminate\Log\Writer;

class Anvard {

    /**
     * The configuration for Anvard
     *
     * @var array
     */
    protected $config;

    /**
     * The service used to login
     *
     * @var Hybrid_Provider_Adapter $adapter
     */
    protected $adapter;


    /**
     * The profile of the current user from
     * the provider, once logged in
     *
     * @var Hybrid_User_Profile
     */
    protected $adapter_profile;

    /**
     * The name of the current provider,
     * e.g. Facebook, LinkedIn, etc
     *
     * @var string
     */
    protected $provider;

    /**
     * The logger
     *
     * @var Writer
     */
    protected $logger;

    public function __construct($config) {
        $this->config = $config;
    }

    /**
     * Get a social profile for a user, optionally specifying
     * which social network to get, and which user to query
     */
    public function getProfile($network = NULL, $user = NULL) {
        if ( $user === NULL ) {
            $user = Auth::user();
            if (!$user) {
                return NULL;
            }
        }
        if ($network === NULL) {
            $profile = $user->profiles()->first();
        } else {
            $profile = $user->profiles()->where('network', $network)->first();
        }
        return $profile;
    }

    public function getProviders() {
        $haconfig = $this->config['hybridauth'];
        $providers = array();
        foreach ($haconfig['providers'] as $provider => $config) {
            if ( $config['enabled'] ) {
                $providers[] = $provider;
            }
        }
        return $providers;
    }


    /**
     * @return String
     */
    public function getCurrentProvider() {
        return $this->provider;
    }
    public function setCurrentProvider(String $provider) {
        $this->provider = $provider;
    }

    /**
     * @return Hybrid_Provider_Adapter
     */
    public function getAdapter() {
        return $this->adapter;
    }
    public function setAdapter(Hybrid_Provider_Adapter $adapter) {
        $this->adapter = $adapter;
    }


    /**
     * @return Writer
     */
    public function getLogger() {
        return $this->logger;
    }
    public function setLogger(Writer $logger) {
        $this->logger = $logger;
    }

    /**
     * Attempt a login with a given provider
     */
    public function attemptAuthentication($provider, Hybrid_Auth $hybridauth, $retry = 0) {
        try {
            $this->provider = $provider;
            $adapter = $hybridauth->authenticate($provider);
            $this->setAdapter($adapter);
            $this->setAdapterProfile($adapter->getUserProfile());
            $profile = $this->findProfile();
            return $profile;
        } catch (\Exception $e) {
            // uncomment this if you want more info
            //var_dump($e->getMessage());
            $this->errorCodes($e,$provider, $hybridauth, $retry);
        }
    }

    public function setAdapterProfile(Hybrid_User_Profile $profile) {
        $this->adapter_profile = $profile;
    }

    /**
     * @return Hybrid_User_Profile
     */
    public function getAdapterProfile() {
        return $this->adapter_profile;
    }

    protected function findProfile() {
        $adapter_profile = $this->getAdapterProfile();
        $ProfileModel = $this->config['db']['profilemodel'];
        $UserModel = $this->config['db']['usermodel'];
        $user = NULL;

        // Have they logged in with this provider before?
        $profile_builder = call_user_func_array(
            "$ProfileModel::where",
            array('provider', $this->provider)
        );
        $profile = $profile_builder
            ->where('identifier', $adapter_profile->identifier)
            ->first();

        /**
         * Check if user is currently logged in first
         *    ... then check if their is a profile matching the social user
         *    ... then check if the email matches
         * If none of the above, create a new user.
         */
        if (\Auth::check()) {
            $user = \Auth::user();
        } elseif ($profile) {
            // ok, we found an existing user
            $user = $profile->user()->first();
            $this->logger->debug('Anvard: found a profile, id='.$profile->id);
        } elseif ($adapter_profile->email) {
            $this->logger->debug('Anvard: could not find profile, looking for email');
            // ok it's a new profile ... can we find the user by email?
            $user_builder = call_user_func_array(
                "$UserModel::where",
                array('email', $adapter_profile->email)
            );
            $user = $user_builder
                ->first();
        }
        // If we haven't found a user, we need to create a new one
        if (!$user) {
            $this->logger->debug('Anvard: did not find user, creating');
            $user = new $UserModel();
            // map in anything from the profile that we want in the User
            $map = $this->config['db']['profiletousermap'];
            foreach ($map as $apkey => $ukey) {
                $user->$ukey = $adapter_profile->$apkey;
            }

            // Default username,email,password/confirmation
            $user->username = $adapter_profile->email;
            $user->email = $adapter_profile->email;
            $user->password = uniqid();
            $user->password_confirmation = $user->password;

            // get the custom config from the db.php config file
            $values = $this->config['db']['uservalues'];
            foreach ( $values as $key=>$value ) {
                if (is_callable($value)) {
                    $user->$key = $value($user, $adapter_profile);
                } else {
                    $user->$key = $value;
                }
            }
            $rules = $this->config['db']['userrules'];
            $result = $user->save($rules);
            if ( !$result ) {
                $this->logger->error('Anvard: FAILED TO SAVE USER');
                return NULL;
            }
        }
        if (!$profile) {
            // If we didn't find the profile, we need to create a new one
            $profile = $this->createProfileFromAdapterProfile($adapter_profile, $user);
        } else {
            // If we did find a profile, make sure we update any changes to the source
            $profile = $this->applyAdapterProfileToExistingProfile($adapter_profile, $profile);
        }
        $result = $profile->save();
        if (!$result) {
            $this->logger->error('Anvard: FAILED TO SAVE PROFILE');
            return NULL;
        }
        $this->logger->info('Anvard: succesful login!');
        return $profile;

    }

    protected function createProfileFromAdapterProfile($adapter_profile, $user) {
        $ProfileModel = $this->config['db']['profilemodel'];
        $attributes['provider'] = $this->provider;
        // @todo use config value for foreign key name
        $attributes['user_id'] = $user->id;
        $profile = new $ProfileModel($attributes);
        $profile = $this->applyAdapterProfileToExistingProfile($adapter_profile, $profile);
        return $profile;
    }

    protected function applyAdapterProfileToExistingProfile($adapter_profile, $profile) {
        $attributes = get_object_vars($adapter_profile);
        foreach ($attributes as $k=>$v) {
            $profile->$k = $v;
        }
        return $profile;
    }

    protected function errorCodes($e, $provider, $hybridauth, $retry = 0){
        // this is straight from: http://hybridauth.sourceforge.net/userguide/Integrating_HybridAuth_SignIn.html
        // Display the recived error,
        // to know more please refer to Exceptions handling section on the userguide
        switch( $e->getCode() ){
            case 0 : \Session::flash('error', 'Unspecified error.  Code '. $e->getCode());  break;
            case 1 : \Session::flash('error', 'Hybridauth configuration error.  Code '. $e->getCode()); break;
            case 2 : \Session::flash('error', 'Provider not properly configured. Code '. $e->getCode()) ; break;
            case 3 : \Session::flash('error', 'Unknown or disabled provider. Code '. $e->getCode()) ; break;
            case 4 : \Session::flash('error', 'Missing provider application credentials. Code '. $e->getCode()); break;
            case 5 : \Session::flash('error', 'Authentification failed.
                    The user has canceled the authentication or the provider refused the connection.  Code'. $e->getCode()) ;
                break;
            case 6 : \Session::flash('error', 'User profile request failed. Most likely the user is not connected.
                to the provider and he should authenticate again.  Code '. $e->getCode());
                $hybridauth->logoutAllProviders();
                $retry++;
                break;
            case 7 : \Session::flash('error', 'User not connected to the provider.  Code '. $e->getCode());
                $hybridauth->logoutAllProviders();
                $retry++;
                break;
            case 8 : \Session::flash('error', 'Provider does not support this feature.  Code '. $e->getCode()); break;
        }

        // case 6 and 7 would need to try again, this makes it so the user doesn't have to do that manually.
        // do this a couple times
        if($retry > 0 && $retry < 3){
            $this->attemptAuthentication($provider, $hybridauth, $retry);
        }

        \Session::flash('error', '<br /><br /><b>Original error message:</b> '. $e->getMessage());
    }
}
