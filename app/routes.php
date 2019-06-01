<?php

$router->get('', 'PagesController@home');
$router->get('about', 'PagesController@about');
$router->get('contacts', 'PagesController@contact');
$router->get('users', 'UserController@index');
$router->post('names', 'UserController@store');
