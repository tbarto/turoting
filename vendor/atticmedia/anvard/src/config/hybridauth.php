<?php
return array(

    // 'base_url' => URL::route(Config::get('anvard::routes.login')),

    'providers' => array (

        "Google" => array (
            "enabled" => true,
            "keys"    => array ( "id" => "PUT_YOURS_HERE", "secret" => "PUT_YOURS_HERE" ),
            "scope"   => "https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email" // optional
        ),

        'Facebook' => array (
            'enabled' => true,
            'keys'    => array ( 'id' => '', 'secret' => '' ),
            "scope"   => "email, user_about_me, user_birthday, user_hometown, user_website, offline_access, read_stream, publish_stream, read_friendlists", // optional
        ),

        'Twitter' => array (
            'enabled' => true,
            'keys'    => array ( 'key' => 'nTRlHjc1ixhVYvXTVz4kRkKsb', 'secret' => 'IXBYOyIg0N6Ioo6OnStEfwKuMd6qC8ZsQdPIibVu3J8vpG8QK9' )
        ),

        'LinkedIn' => array (
            'enabled' => true,
            'keys'    => array ( 'key' => '', 'secret' => '' )
        ),
    )







);