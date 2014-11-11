<?php
return array(
    'index' => 'anvard',
    'login' => 'anvard/login/{provider}',
    'loginredirect' => '/dashboard',   // set this if you want a default redirect after login, else it will use back()
    'logout' => 'anvard/logout',
    'logoutredirect' => '/',
    'authfailed' => 'user/login',
    'endpoint' => 'anvard/endpoint', // set this if you want a default redirect after logout, else it will use back()
);
