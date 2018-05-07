<?php
	Route::get('qt-test/{id}', 'CMS_ComponentController@_GET_VIEW_PLACES_DETAILS');
	Route::get('lvtn-dashboard', 'CMS_ModuleController@getDashboard')->name('ADMIN_DASHBOARD');
	Route::post('lvtn-dashboard', 'CMS_AddDataController@_POST_TASK');
	

	Route::get('delete-task/{id}', 'CMS_DeleteDataController@_DELETE_TASK')->name('DELETE_TASK');
	Route::get('lvnt-list-services','CMS_ComponentController@_DISPLAY_LIST_SERVICES')->name('ALL_LIST_SERVICES');
	Route::get('lvnt-list-admin','CMS_ComponentController@_DISPLAY_LIST_ADMIN_USER')->name('ALL_LIST_ADMIN');
	Route::get('lvnt-list-mod','CMS_ComponentController@_DISPLAY_LIST_MODERATOR_USER')->name('ALL_LIST_MOD');

	Route::get('lvnt-list-enterpirse','CMS_ComponentController@_DISPLAY_LIST_ENTERPRISE')->name('ALL_LIST_ENTERPRISE');
	Route::get('lvnt-list-partner','CMS_ComponentController@_DISPLAY_LIST_PARTNER')->name('ALL_LIST_PARTNER');
	

	Route::get('lvnt-list-tour-guide','CMS_ComponentController@_DISPLAY_LIST_TOURGUIDE')->name('ALL_LIST_TOURGUIDE');

	Route::get('lvtn-list-user', 'CMS_ComponentController@_DISPLAY_LIST_ALL_USER')->name('ALL_LIST_USER');
	Route::get('lvtn-list-address', 'CMS_ComponentController@_DISPLAY_TOURIST_PLACES')->name('ALL_LIST_PLACE');

	Route::get('lvtn-add-tourist-places', 'CMS_ModuleController@_GETVIEW_ADD_TOURIST_PLACES')->name('ADD_TOURIST_PLACES');
	Route::post('lvtn-add-tourist-places', 'CMS_AddDataController@_POST_TOURIST_PLACES');
	Route::get('lvtn-add-services/{id}', 'CMS_ModuleController@_GETVIEW_ADD_SERVICES')->name('_GETVIEW_ADD_SERVICES');
	Route::post('lvtn-add-services/{id}', 'CMS_AddDataController@_GETVIEW_ADD_SERVICES');

