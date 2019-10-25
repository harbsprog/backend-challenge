<?php

/* Auth Route */
$router->post(
    '/api/auth/login',
    [
       'uses' => 'AuthController@authenticate'
    ]
);

$router->group([
    'prefix' => '/api',
    'middleware' => 'jwt.auth'
], function() use ($router){


    /* Colors Routes */
    $router->get("/colors", "ColorsController@getAll");
    $router->get("/colors/{id}", "ColorsController@get");
    $router->post("/colors", "ColorsController@store");
    $router->put("/colors/{id}", "ColorsController@update");
    $router->delete("/colors/{id}", "ColorsController@destroy");

    /* Products Routes */
    $router->get("/products", "ProductsController@getAll");
    $router->get("/products/{id}", "ProductsController@get");
    $router->post("/products", "ProductsController@store");
    $router->put("/products/{id}", "ProductsController@update");
    $router->delete("/products/{id}", "ProductsController@destroy");

    /* Users Routes */
    $router->get("/users", "UsersController@getAll");
    $router->get("/users/{id}", "UsersController@get");
    $router->post("/users", "UsersController@store");
    $router->put("/users/{id}", "UsersController@update");
    $router->delete("/users/{id}", "UsersController@destroy");
});
