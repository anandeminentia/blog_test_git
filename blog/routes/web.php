<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('get_all_books','BookController@index');
$router->post('get_book_by_id','BookController@GetBookDetailsById');
$router->post('add_book','BookController@AddNewBook');
$router->put('update_details','BookController@UpdateDetails');

/*MODEL RELATIONSHIP DEMO*/
$router->get('one_to_one','ModelRelationshipController@OneToOneRelationship');
$router->get('one_to_many','ModelRelationshipController@OneToMayRelationship');
$router->get('many_to_many','ModelRelationshipController@ManyToManyRelationship');

/*EBENT HANDELER DEMO*/
$router->get('/test_event','ModelRelationshipController@TestEventFunction');