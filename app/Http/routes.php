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

Route::get('/test', 'testController@index');

Route::post('/send-email', 'emailController@sendEmail');

Route::post('/send-invitation', 'emailController@sendInvite');

Route::get('/verify-user', 'emailController@verifyUser');

//reset password
Route::put('user/{id}/reset-password', 'UsersController@resetPassword');
Route::put('/change-password', 'UsersController@changePassword');
Route::put('/forgot-password', 'UsersController@forgotPassword');
Route::put('/users/{id}/activate', 'UsersController@activateAccount');
//disable account
Route::get('/disable-account', 'UsersController@disableAccount');

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

Route::get('/posts', 'PostController@index');

Route::get('/post/{id}', 'PostController@show');

Route::post('/post', 'PostController@store');

Route::put('/post/{id}', 'PostController@update');

Route::delete('/post/{id}', 'PostController@destroy');

/*================================
=            comments            =
================================*/

Route::post('/post/comment', 'CommentsController@store');

Route::post('/comment/reply', 'CommentsController@reply');

Route::delete('/post/comment/{id}', 'CommentsController@destroy');
/*=====  End of comments  ======*/



Route::get('/v1/tags', 'TagsController@index');


Route::group(['middleware' => 'jwt.auth'], function()
{
    Route::resource('session', 'AuthenticateController', ['only' => ['index']]);
    Route::get('/session/user', 'AuthenticateController@getSessionUser');
    
});


Route::get('/fees',  'feesController@index');

Route::get('/fee/{id}', 'feesController@show');

Route::post('/fees', 'feesController@store');

Route::put('/fee/{id}', 'feesController@update');

Route::delete('/fee/{id}', 'feesController@destroy');



Route::group(['middleware' => 'jwt.auth'], function(){

  


  
  /*=============================
  =            users            =
  =============================*/
  Route::get('/users', 'UsersController@index');

  Route::get('/users/{id}', 'UsersController@show');

  Route::post('/users', 'UsersController@store');

  Route::post('/user/location', 'userLocationController@store');

  Route::put('/user/location', 'userLocationController@update');

  Route::put('/users/{id}', 'UsersController@update');



  Route::delete('/users/{id}', 'UsersController@destroy');  
  /*=====  End of users  ======*/
 
  /*=============================
  =            rates            =
  =============================*/
  Route::get('/rates', 'rateController@index');

  Route::get('/rate/{id}', 'rateController@show');

  Route::post('/rates', 'rateController@store');

  Route::put('/rate/{id}', 'rateController@update');

  
  
  /*=====  End of rates  ======*/
  

  /*====================================
  =            users profile            =
  ====================================*/
  
  /*----------  job seekers  ----------*/
  Route::get('/members', 'membersController@index');
  
  Route::get('/member/profile', 'membersController@profile');

  Route::get('/members/items', 'membersController@items');
  
  Route::get('/member/{id}', 'membersController@show');
  
  Route::post('/members', 'membersController@store');
  
  Route::put('/member/{id}', 'membersController@update');

  Route::delete('/members/{id}', 'membersController@destroy');



  /*----------  human resources managers  ----------*/
  Route::get('/vendors', 'vendorController@index');

  Route::get('/vendor/companies', 'vendorController@companies');

  Route::get('/vendor/products', 'vendorController@products');

  Route::get('/vendor/bids',  'vendorController@showBids');

  Route::get('/vendor/biding-section', 'vendorController@bidingSection');

  Route::post('/vendor/bids', 'vendorController@storeBid');

  Route::post('/vendor/product', 'vendorController@storeProduct');

  Route::get('/vendor/{id}', 'vendorController@show');
  
  Route::post('/vendors', 'vendorController@store');
  
  Route::put('/vendor/{id}', 'vendorController@update');

  Route::delete('/vendor/product/{id}', 'vendorController@destroyProduct');

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



 

  

   /*===============================
  =            requests            =
  ===============================*/
  Route::get('/request', 'requestController@index');

  Route::get('/request/notifications', 'requestController@notifications');

  Route::get('/request/{id}', 'requestController@show');

  Route::post('/request', 'requestController@store');

  Route::put('/request', 'requestController@update');

  Route::delete('/request/{id}', 'requestController@destroy');
    
  /*=====  End of requests  ======*/





  /*====================================
  =             category            =
  ====================================*/
  
  Route::get('/categories', 'categoryController@index');

  Route::get('/category/{id}', 'categoryController@show');

  Route::get('/category/{id}/products', 'categoryController@products');

  Route::post('/categories', 'categoryController@store');

  Route::put('/category/{id}', 'categoryController@update');

  Route::delete('/category/{id}', 'categoryController@destroy');
  
  /*=====  End of  category  ======*/

  /*=================================
  =             product            =
  =================================*/
  
  Route::get('/products', 'productController@index');

  Route::get('/product/{id}', 'productController@show');

  Route::get('/product/{id}/brands', 'productController@brands');

  Route::post('/product', 'productController@store');

  Route::put('/product/{id}', 'productController@update');

  Route::delete('/product/{id}', 'productController@destroy'); 
  
  /*=====  End of  product  ======*/




  /*==================================
  =             brands            =
  ==================================*/
  
  Route::get('/brands', 'brandsController@index');

  Route::get('/brand/{id}', 'brandsController@show');

  Route::get('/brand/{id}/models', 'brandsController@models');

  Route::post('/brand', 'brandsController@store');

  Route::put('/brand/{id}', 'brandsController@update');

  Route::delete('/brand/{id}', 'brandsController@destroy');
   
  /*=====  End of  brands  ======*/
    
  /*=====================================
  =             models            =
  =====================================*/
  
  Route::get('/models', 'modelsController@index');

  Route::get('/models/{id}', 'modelsController@show');

  Route::post('/model', 'modelsController@store');

  Route::put('/model/{id}', 'modelsController@update');

  Route::delete('/model/{id}', 'modelsController@destroy');
  
  /*=====  End of  models  ======*/

  /*=================================
  =             bids            =
  =================================*/
  
  Route::get('/bids', 'bidsController@index');

  Route::get('/bid/{id}',  'bidsController@show');

  Route::post('/bids', 'bidsController@store');

  Route::delete('/bid/{id}', 'bidsController@destroy');
  
  /*=====  End of bids  ======*/
  
  /*=================================
  =             items            =
  =================================*/
  
  Route::get('/items', 'itemsController@index');

  Route::get('/item/{id}',  'itemsController@show');

  Route::get('/item/{id}/bids', 'itemsController@showBids');

  Route::put('/item/{id}/record', 'itemsController@storeBidRecord');

  Route::post('/item', 'itemsController@store');

  Route::put('/item/{id}', 'itemsController@update');

  Route::delete('/item/{id}', 'itemsController@destroy');
  
  /*=====  End of items  ======*/
  
  
  
});

/*=================================
=            constants            =
=================================*/

Route::get('/countries', 'countriesController@index');

Route::get('/country/{id}', 'countriesController@show');

Route::get('/country/{id}/states', 'countriesController@states');

Route::post('/country', 'countriesController@store');

Route::put('country/{id}', 'countriesController@update');

Route::delete('/country/{id}', 'countriesController@destroy');

Route::get('/states', 'statesController@index');

Route::get('/state/{id}', 'statesController@show');

Route::get('/state/{id}/cities', 'statesController@cities');

Route::post('/state', 'statesController@store');

Route::put('state/{id}', 'statesController@update');

Route::delete('/state/{id}', 'statesController@destroy');

Route::get('/cities', 'citiesController@index');

Route::get('/city/{id}', 'citiesController@show');

Route::post('/city', 'citiesController@store');

Route::put('city/{id}', 'citiesController@update');

Route::delete('/city/{id}', 'citiesController@destroy');



Route::get('/near', 'nearByController@index');


/*=====  End of constants  ======*/

  



  /*====================================
  =            access level            =
  ====================================*/
  Route::get('/access-level', 'AccessLevelController@index');

  Route::get('/access-level/{id}', 'AccessLevelController@show');

  Route::post('/access-level', 'AccessLevelController@store');

  Route::put('/access-level/{id}', 'AccessLevelController@update');

  Route::delete('/access-level/{id}', 'AccessLevelController@destroy');
  


  Route::get('/email', function(){
    return view('emails.verification');
  });
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
