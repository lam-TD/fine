<?php
include 'website.php';
include 'cms.php';
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('couter/couter={name}', 'CounterEventsController@Counter');
Route::resource('eating', 'EatingController');


Route::resource('services','ServicesController');
Route::get('service/service-id={id_service}&user-id={id_user}', 'ServicesDetailsController@showDetails');
Route::resource('usersearch', 'userSearch');

Route::resource('hotels', 'vnt_hotelsController');
Route::post('add-places', 'tourist_places_controller@AddPlace');
Route::post('add-services/{id}','tourist_places_controller@AddServices');
Route::get('get-name-services/{id}', 'tourist_places_controller@GetNamePlace');
Route::resource('tourist-places', 'tourist_places_Controller');
Route::resource('transport', 'transportController');

//sự kiện
Route::resource('events', 'EventsController');
Route::get('counter-events', 'CounterEventsController@countEvent');
//tham quan
Route::resource('sightseeing', 'sightseeingController');

Route::resource('entertainments', 'vnt_entertainmentsController');
Route::resource('like', 'LikeController');

// TIM KIEM
// tìm kiếm địa điểm lân cận giới hạn 10 địa điểm


// search new
Route::get('search/placevicinity/location={latitude},{longitude}&radius={radius}','SearchController@searchPlaceVicinity');

Route::get('search/servicevicinity/location={latitude},{longtitude}&type={type}&radius={radius}','SearchController@searchServicesVicinity');

Route::get('search/services/keyword={keyword}','SearchController@searchServicesKeyword');

Route::get('search/searchServicesTypeKeyword/type={type}&keyword={keyword}','SearchController@searchServicesTypeKeyword');

// LOGIN-LOGOUT-REGISTER
Route::post('login2','loginController@postLogin');
Route::post('register','loginController@register');
Route::get('logout','loginController@logout');
// web

Route::post('upload-image/{id}','ImagesController@Upload');
Route::get('get-icon/{id}', 'ImagesController@getIcon');
Route::get('get-banner/{id}', 'ImagesController@getBanner');
Route::get('get-thumb-1/{id}', 'ImagesController@getThumbnail1');
Route::get('get-thumb-2/{id}', 'ImagesController@getThumbnail2');
Route::get('get-detail-1/{id}', 'ImagesController@getImageDetail1');
Route::get('get-detail-2/{id}', 'ImagesController@getImageDetail2');
Route::get('get-only-icon-image', 'ImagesController@GetOnlyIconImage');


Route::get('rating-service/{id}','Rating_Service_Controller@rating');
Route::get('rating-view/{id_danhgia}','Rating_Service_Controller@view_rating');
Route::get('rating-view-by-user/{id_user}','Rating_Service_Controller@view_rating_by_user');


Route::post('rating-post', 'Rating_Service_Controller@postRating');
Route::get('ward', 'tourist_places_controller@GetWardList');
Route::get('province', 'tourist_places_controller@GetProvinceCity');
Route::get('ward/{id}', 'tourist_places_controller@GetWardListByID');
Route::get('district/{id}', 'tourist_places_controller@GetDisTrictListByID');

Route::get('google-maps','testGoogleMapsApi@FunctionName');
//partner
Route::get('get-services-poseted_by/month={month}&user_id={id}','Partner_Controller@getServices');
Route::get('get-places-poseted_by/month={month}&user_id={id}','Partner_Controller@getServices');
Route::get('get-task-list/{id}', 'Partner_Controller@getTaskList');

Auth::routes();
 
Route::get('/home', 'HomeController@index')->name('home');
