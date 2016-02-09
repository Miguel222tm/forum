<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/**
 * @route: marketing website
 */
Route::get('/', function () {
    return view('home');
   	
});

/**
 *  System.
 */
Route::get('/app', function(){
	return view('main');
});

/*=====================================
=            social logins            =
=====================================*/

Route::post('/signup', 'AuthenticateController@registerUserByEmail');
Route::post('/authenticate', 'AuthenticateController@authenticate');
Route::post('/auth/google', 'socialAuthController@google');
Route::post('/auth/linkedin', 'socialAuthController@linkedin');
Route::post('/auth/facebook', 'socialAuthController@facebook');


/*=====  End of social logins  ======*/




Route::group(['middleware' => 'jwt.auth'], function()
{
    Route::resource('session', 'AuthenticateController', ['only' => ['index']]);
    Route::get('/session/user', 'AuthenticateController@getSessionUser');
    
});





Route::group(['middleware' => 'jwt.auth'], function(){
  /*=============================
  =            users            =
  =============================*/
  Route::get('/users', 'UsersController@index');

  Route::get('/users/{id}', 'UsersController@show');

  Route::post('/users', 'UsersController@store');

  Route::put('/users/{id}', 'UsersController@update');

  Route::delete('/users/{id}', 'UsersController@destroy');  
  /*=====  End of users  ======*/
 

  /*====================================
  =            users profile            =
  ====================================*/
  
  /*----------  job seekers  ----------*/
  Route::get('/members', 'membersController@index');
  
  Route::get('/members/profile', 'membersController@profile');
  
  Route::get('/members/{id}', 'membersController@show');
  
  Route::post('/memberss', 'membersController@store');
  
  Route::put('/members/{id}', 'membersController@update');

  Route::delete('/members/{id}', 'membersController@destroy');



  /*----------  human resources managers  ----------*/
  Route::get('/vendors', 'vendorController@index');

  Route::get('/vendor/companies', 'vendorController@companies');

  Route::get('/vendor/{id}', 'vendorController@show');
  
  Route::post('/vendors', 'vendorController@store');
  
  Route::put('/vendor/{id}', 'vendorController@update');

  Route::delete('/vendor/{id}', 'vendorController@destroy');

  /*----------  companies  ----------*/

  Route::get('/employees', 'employeesController@index');

  Route::get('/employee/{id}', 'employeesController@show');
  
  Route::post('/employees', 'employeesController@store');
  
  Route::put('/employee/{id}', 'employeesController@update');

  Route::delete('/employee/{id}', 'employeesController@destroy');
  
  
  /*=====  End of user profile  ======*/
  /*================================
  =            location            =
  ================================*/

  Route::get('/locations', 'locationController@index');

  Route::get('/locations/{id}', 'locationController@show');

  Route::post('/locations', 'locationController@store');

  Route::put('/locations', 'locationController@update');

  Route::delete('/location', 'locationController@destroy');
    
  /*=====  End of location  ======*/


  /*=================================
  =            currency             =
  =================================*/
    
  Route::get('/constant/currency', 'currencyController@index');
    
  Route::get('/constant/currency/{id}', 'currencyController@show');

    
  /*=====  End of currency   ======*/
  
  
  /*=====================================
  =            type of users            =
  =====================================*/
  
  Route::get('/constant/user-types', 'userTypesController@index');

  Route::get('/constant/user-types/{id}', 'userTypesController@show');
  
  /*=====  End of type of users  ======*/  


  

   /*===============================
  =            resumes            =
  ===============================*/
  Route::get('/request', 'requestController@index');

  Route::get('/request/notifications', 'requestController@notifications');

  Route::get('/request/{id}', 'requestController@show');

  Route::post('/request', 'requestController@store');

  Route::put('/request', 'requestController@update');

  Route::delete('/request/{id}', 'requestController@destroy');
    
  /*=====  End of resumes  ======*/

  /*====================================
  =            js category            =
  ====================================*/
  
  Route::get('/category', 'categoryController@index');

  Route::get('/category/{id}', 'categoryController@show');

  Route::post('/category', 'categoryController@store');

  Route::put('/category/{id}', 'categoryController@update');

  Route::delete('/category/{id}', 'categoryController@destroy');
  
  /*=====  End of js category  ======*/

  /*=================================
  =            js product            =
  =================================*/
  
  Route::get('/product', 'productController@index');

  Route::get('/product/{id}', 'productController@show');

  Route::post('/product', 'productController@store');

  Route::put('/product/{id}', 'productController@update');

  Route::delete('/product/{id}', 'productController@destroy'); 
  
  /*=====  End of js product  ======*/




  /*==================================
  =            js courses            =
  ==================================*/
  
  Route::get('/brands', 'brandsController@index');

  Route::get('/brands/{id}', 'brandsController@show');

  Route::post('/brands', 'brandsController@store');

  Route::put('/brands/{id}', 'brandsController@update');

  Route::delete('/brands/{id}', 'brandsController@destroy');
   
  /*=====  End of js courses  ======*/
    
  /*=====================================
  =            js volunteers            =
  =====================================*/
  
  Route::get('/models', 'modelsController@index');

  Route::get('/models/{id}', 'modelsController@show');

  Route::post('/models', 'modelsController@store');

  Route::put('/models/{id}', 'modelsController@update');

  Route::delete('/models/{id}', 'modelsController@destroy');
  
  /*=====  End of js volunteers  ======*/

  /*=================================
  =            js skills            =
  =================================*/
  
  Route::get('/bids', 'bidsController@jsIndex');

  Route::get('/bids/{id}',  'bidsController@jsShow');

  Route::post('/bids', 'bidsController@jsStore');

  Route::delete('/bids/{id}', 'bidsController@jsDestroy');
  
  /*=====  End of js skills  ======*/
  
  
  
});

  /*==============================
  =            skills            =
  ==============================*/
  
  Route::get('/constant/skills', 'skillsController@index');

  Route::get('/constant/skill', 'skillsController@show');  
  
  /*=====  End of skills  ======*/



  /*====================================
  =            access level            =
  ====================================*/
  Route::get('/access-level', 'AccessLevelController@index');

  Route::get('/access-level/{id}', 'AccessLevelController@show');

  Route::post('/access-level', 'AccessLevelController@store');

  Route::put('/access-level/{id}', 'AccessLevelController@update');

  Route::delete('/access-level/{id}', 'AccessLevelController@destroy');
  
  /*=====  End of access level  ======*/
  

 /*Route::get('/token', function () {
       $token = "";

        try {
           $token = JWTAuth::parseToken();
           if (! $token->authenticate()) {
               return response()->json(['user_not_found'], 404);
           }
        } catch (TokenExpiredException $e) {
            return response()->json(['token_expired'], $e->getStatusCode());
        } catch (TokenInvalidException $e) {
            return response()->json(['token_invalid'], $e->getStatusCode());
        } catch (JWTException $e) {
            return response()->json(['token_absent'], $e->getStatusCode());
        }

       return csrf_token();
    });*/
