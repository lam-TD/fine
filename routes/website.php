<?php




Route::get('/','pageController@getindex')->name('/');


// ====== LOGIN ======


Route::get('registerW','pageController@getregister')->name('registerW');
Route::get('registersuccess','pageController@getregisterSuccess')->name('registersuccess');
Route::get('logoutW','pageController@LogoutSession')->name('logoutW'); // logout
Route::get('loginW','pageController@getlogin')->name('loginW');

Route::post('loginpost','pageController@LoginSession')->name('loginpost');
Route::post('registerWpost','loginController@registerW')->name('registerWpost');
// login facebook
Route::get('login/facebook/redirect', 'loginController@redirectToProvider')->name('loginfacebook');
Route::get('login/facebook/callback', 'loginController@handleProviderCallback');

//user
Route::get('user','pageController@getuser');

// load detail
Route::get('detail/id={id}&type={type}','pageController@getdetail')->name("detail");
Route::get('detail/s','pageController@getServiceTypeVicinity');
Route::get('save_rating/id={id}&rating={r}&detail={t}','publicDetail@save_rating');
Route::get('save_update_rating/id={id}&rating={r}&detail={t}','publicDetail@save_update_rating');



// load addplace
Route::get('addplace','pageController@getaddplace')->name('addplace');
Route::get('loadPalce','pageController@loadPalce')->name('addplace');



Route::post('addplace', 'pageController@postPlace');
//  load addservice
Route::get('addservice','pageController@getaddservice');

Route::get('city','pageController@getcount_place_city');

Route::get('lam/type={type}','pageController@findservicetocity');

Route::get('d/f={f}','pageController@typelam');

Route::get('lamdv/type={type}','pageController@getlam');

Route::get('count_place_Allcity','pageController@count_place_Allcity');
Route::get('count_place_display','pageController@count_place_display');

Route::get('lamindex/id={id}','publicDetail@get_service_id');



// detail service
Route::get('detail-service/id={id}','publicDetail@get_service_id');

Route::get('detail/id={id}&type={type}','publicDetail@get_detail');

Route::get('diadiem2/id={id}','publicDetail@dichvu_lancan');



//search public
Route::get('p_search','publicSearchController@get_search');

// place_city
// Route::get('city/{id}','publicSearchController@get_place_city');

Route::get('count_ser/{id}','publicSearchController@count_servies_type');
Route::get('get_all_place_city_type/{id}&type={t}','publicSearchController@get_all_place_city_type');

Route::get('image_city/{id}','pageController@image_city');


//================================= TEST ======================================
Route::get('count_city_service_all_image','pageController@count_city_service_all_image');
Route::get('searchServices_All/keyword={k}','pageController@searchServices_All');
Route::get('getlam/id={id}&l={l}','pageController@getServicesTake');
Route::get('likelam/{idser}','publicDetail@count_service_all_and_type');

Route::get('count_service_all_and_type/{id}','publicCityController@count_service_all_and_type');//test add view service
Route::get('phantrang/{id}','publicCityController@checkPaginate');

Route::get('getServicesTake/type={t}&id={i}','pageController@getServicesTake');

//tetx
Route::get('lamtr/{type}&lim={l}','pageController@gettypeService');

//================================ NEW ========================================

//get num service of city all
Route::get('count_city_service_all','pageController@count_city_service_all');



//================== add place ================
Route::get('addplace','publicaddplaceController@getaddplace')->name('addplace');

Route::get('loadDistrict/{idcity}','publicaddplaceController@loadDistrict');
Route::get('loadWard/{id}','publicaddplaceController@loadWard');





//================== search header =============
Route::get('searchServices_All/keyword={k}','pageController@searchServices_All');

Route::get('searchService_City_AllType/idcity={id}&keyword={k}','pageController@searchService_City_AllType');

Route::get('searchService_City_Type/idcity={id}&type={t}&keyword={k}','pageController@searchService_City_Type');

Route::get('searchServices_AllCity_idType/type={t}&keyword={k}','pageController@searchServices_AllCity_idType');

Route::get('search','pageController@getpageSearch')->name('search');




//================= detail ==================
Route::get('checkLogin','publicDetail@checkLogin');
Route::get('ThemVaCapNhatLike/{id}','publicDetail@ThemVaCapNhatLike');

//============ check like
Route::get('checkLike/userid={d}&svid={s}','publicDetail@checkLike');


// ================ serviece city ==============
Route::get('city/{id}&type={type}&page={p}','publicCityController@getCity');

Route::get('city-all/id={id}&district={dis}&type={type}&fil={fil}&page={page}&li={li}','publicCityController@get_service_city_fillter');




// =============== user info ===========
Route::get('info','accountController@get_info_account')->name('info');
Route::post('info',['as'=>'postinfo','uses'=>'accountController@post_edit_info_account']);



//test

Route::get('getRating/{id}','publicDetail@getRating');
Route::get('checkUserRating/{idservice}&user_id={id}','publicDetail@checkUserRating');

Route::get('check-login','publicDetail@check_Login');




//====== place user
Route::get('place-user','accountController@getPlace_user');
Route::get('place-user/add/{id}','accountController@addplace');

//====== place user

Route::get('service-user','accountController@getservice_user');
Route::get('service-user/add/{id}','accountController@addservice_user');

//get con search
Route::get('conSearch/{idcity}&type={type}&keyword={key}&select={select}','pageController@conSearch');


//=========















































?>
