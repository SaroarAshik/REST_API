<?php


$router->get('/', function () use ($router) {
    return $router->app->version();
});



//*****************Query Builder CRUD*****************
$router->get('/builder','BuilderController@AllRow');
$router->post('/builder','BuilderController@Insert');
$router->put('/builder','BuilderController@Update');
$router->delete('/builder','BuilderController@Delete');

//*****************Eloquent ORM CRUD******************
//$router->get('/select','DetailsController@selectAll');
$router->post('/select','DetailsController@selectById');
$router->post('/insert','DetailsController@Insert');
$router->post('/delete','DetailsController@Delete');
$router->post('/update', 'DetailsController@Update');
//update er jonno Model e must timestamp use korte hobe

//*****************Some Method******************
$router->get('/count','DetailsController@Count');
$router->get('/max','DetailsController@Max');
$router->get('/min','DetailsController@Min');
$router->get('/avg','DetailsController@Avg');
$router->get('/sum','DetailsController@Sum');


//*****************Authentication*****************
$router->get('/select', ['middleware'=>'auth', 'uses'=>'DetailsController@selectAll']);

