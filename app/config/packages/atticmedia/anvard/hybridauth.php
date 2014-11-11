<?php
return array(

    // 'base_url' => URL::route(Config::get('anvard::routes.login')),
    // 
    'providers' => array (

        "Google" => array (
            "enabled" => false,
            "keys"    => array ( "id" => "PUT_YOURS_HERE", "secret" => "PUT_YOURS_HERE" ),
            "scope"   => "https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email" // optional
        ),

        'Facebook' => array (
            'enabled' => true,
            'keys'    => array ( 'id' => '1497838613816654', 'secret' => '3a9a7cef5121598907caef728cd4c927' ),
            "scope"   => "email, user_about_me, user_birthday, user_hometown, user_website, offline_access, read_stream, publish_stream, read_friendlists", // optional
        ),

        'Twitter' => array (
            'enabled' => true,
            'keys'    => array ( 'key' => 'NOubEZPWg2BrfCKn8VArsVHKU', 'secret' => '9TClPsFbY82skvhQrjluHd2g5Vo3G0EutAMpWacCTAaulRUQ2T' )
        ),

        'LinkedIn' => array (
            'enabled' => false,
            'keys'    => array ( 'key' => '', 'secret' => '' )
        ),
    )







);