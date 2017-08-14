
<?php

/**
* This part for Auth
*/
$app->group(['prefix' => 'api/v1', 'namespace' => 'Authentication'], function($app){

  $app->post('login','AuthenticationController@authenticate');

});
#-- END ---#

/**
 * This part for authentication data
 */
$app->group(['prefix' => 'api/v1',  'middleware' => 'auth'], function () use ($app) {

    //Route
    $app->get('getUserByApiKey', 'UserController@getUserByApiKey');


});
#-- END --#


/**
* This part for public access
*/
$app->group(['prefix' => 'api/v1', 'namespace' => 'ZogoPartners'], function($app){

  $app->get('welcome', function () use ($app) {
      return response()->json(['name' => 'Abigail', 'state' => 'CA']);
  });

  //parameters
  $app->get('user/{id}', function ($id) {
      return 'User '.$id;
  });

  //Route
  $app->get('partner', 'PartnersApiController@index');
});
#-- END ---#



