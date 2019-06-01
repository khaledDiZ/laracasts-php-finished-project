<?php
require 'vendor/autoload.php';
require 'core/bootstrap.php';

use App\Core \ {
    Router,
    Request
};


Router::load('app/routes.php')
    ->direct(Request::url(), Request::method());
