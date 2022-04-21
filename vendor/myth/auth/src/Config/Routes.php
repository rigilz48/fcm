<?php

/*
 * Myth:Auth routes file.
 */
$routes->group('', ['namespace' => 'Myth\Auth\Controllers'], function ($routes) {
    // Login/out
    $routes->get('login', 'AuthController::login', ['as' => 'login']);
    $routes->post('login', 'AuthController::attemptLogin');
    $routes->get('logout', 'AuthController::logout');

    // Registration
    $routes->get('register', 'AuthController::register', ['as' => 'register']);
    $routes->post('register', 'AuthController::attemptRegister');

    // Activation
    $routes->get('activate-account', 'AuthController::activateAccount', ['as' => 'activate-account']);
    $routes->get('resend-activate-account', 'AuthController::resendActivateAccount', ['as' => 'resend-activate-account']);

    // Forgot/Resets
    $routes->get('forgot', 'AuthController::forgotPassword', ['as' => 'forgot']);
    $routes->post('forgot', 'AuthController::attemptForgot');
    $routes->get('reset-password', 'AuthController::resetPassword', ['as' => 'reset-password']);
    $routes->post('reset-password', 'AuthController::attemptReset');
});

$routes->group('', ['filter' => 'role:admin,user'], function($routes) {
    //Admin
    $routes->get('admin', 'Admin/Home::index', ['as' => 'admin']);

    //Blog
    $routes->get('admin/blog', 'Admin/Blog::index', ['as' => 'blog', 'filter' => 'permission:blog']);
    $routes->get('admin/blog', 'Admin/Blog::index', ['as' => 'blog', 'filter' => 'role:admin,user']);

    //Management User
    $routes->get('admin/management/user', 'Admin/Managementuser::index', ['as' => 'user', 'filter' => 'role:admin']);

    //Management Website
    $routes->get('admin/management/website', 'Admin/Managementwebsite::index', ['as' => 'website', 'filter' => 'role:admin']);
    
});