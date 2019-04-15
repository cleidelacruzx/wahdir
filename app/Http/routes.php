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

Route::get('/', function () {
    return view('auth.login');
});

//partner	
Route::resource('partner','PartnerController',['except'=>['destroy']]);
Route::post('comments/{partner_id}',[ 'uses' => 'CommentsController@store','as' => 'comments.store']);
// Route::get('comments/{id}/edit',[ 'uses' => 'CommentsController@edit','as' => 'comments.edit']);
Route::put('comments/{id}',[ 'uses' => 'CommentsController@update','as' => 'comments.update']);
Route::delete('comments/{id}',[ 'uses' => 'CommentsController@destroy','as' => 'comments.destroy']);
Route::get('comments/{id}',[ 'uses' => 'CommentsController@show','as' => 'comments.show']);
//partner


Route::resource('profile','ProfileController',['except'=>['destroy']]);
Route::resource('interns','InternController',['except'=>['destroy']]);
Route::resource('warmleads','WarmLeadsController',['only'=>['index']]);
Route::resource('sites','SitesController',['except'=>['destroy']]);
Route::resource('facilityinfo','FacilityInfoController',['except'=>['destroy']]);


//settings
Route::resource('settings','SettingsController',['only' => ['index']]);
Route::resource('school','SchoolController',['except' =>['create','show']]);
Route::resource('course','CourseController',['except' =>['create','show']]);
Route::resource('papers','PaperController', ['except' =>['create','show']]);
Route::resource('users','UserController',['except' =>['destroy']]);
Route::resource('userDesignation','UserDesignationController',['except' =>['create','show']]);
Route::resource('siteDesignation','siteDesignationController',['except' =>['create','show']]);
Route::resource('partnerDesignation','partnerDesignationController',['except' =>['create','show']]);
Route::resource('partnerOrganization','PartnerOrganizationtionController',['except' =>['create','show']]);

//check if user and email is exist for registration
Route::get('checkUser', 'CheckUserIfExistController@CheckUserIfExist');
Route::get('checkEmail', 'CheckEmailIfExistController@CheckEmailIfExist');

// // Facility Config
Route::resource('facility','FacilityConfigController',['except'=>['show']]);

// Route::resource('facility/get-region-list','FacilityConfigController@getRegionList',['only'=>['index']]);
Route::resource('facility/get-province-list','FacilityConfigController@getProvinceList',['only'=>['index']]);
Route::resource('facility/get-muncity-list','FacilityConfigController@getMuncityList',['only'=>['index']]);
// Route::resource('facility/get-brgy-list','FacilityConfigController@getBrgyList',['only'=>['index']]);
Route::resource('facility/get-hfhudcode-list','FacilityConfigController@gethfhudcodeList',['only'=>['index']]);


// Activation and Deactivation
Route::put('partnerInactive/{id}', ['uses' => 'PartnerInactiveController@update', 'as' => 'PartnerActivation']);
Route::put('profileInactive/{id}', ['uses' => 'ProfileInactiveController@update', 'as' => 'ProfileActivation']);
Route::put('sitesInactive/{id}',   ['uses' => 'SitesInactiveController@update', 'as' => 'SitesActivation']);
Route::put('internInactive/{id}',  ['uses' => 'InternInactiveController@update', 'as' => 'InternActivation']);
Route::put('userInactive/{id}',    ['uses' => 'UserInactiveController@update', 'as' => 'UserActivation']);
Route::put('facilityInfoInactive/{id}',    ['uses' => 'FacilityInfoActiveInactive@update', 'as' => 'FacilityInfoActivation']);


// diactivate partner organization and diactivate all record that have this organization
Route::put('partnerOrganizationInactive/{id}',    ['uses' => 'PartnerOrganizationInactiveController@update', 'as' => 'PartnerOrganizationInactive']);
// diactivate sites facility and diactivate all record that have this facility
Route::put('sitesFacilityInactive/{id}',['uses' => 'FacilityConfigInactiveController@update', 'as' => 'facilityActivation']);

Route::auth();

