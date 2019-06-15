<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'admin','as' => 'admin.'],function(){
//Login Routes...
    Route::get('/','AdminController@index')->name('index');
Route::get('/login',['as'=>'login','uses'=>'AdminAuth\LoginController@showLoginForm']);
Route::post('/login',['as'=>'login','uses'=>'AdminAuth\LoginController@login']);
Route::get('/logout',['as'=>'logout','uses'=>'AdminAuth\LoginController@logout']);
Route::GET('/post/isaac',['as'=>'post.isaac','uses'=>'PostController@isaac']);

Route::group(['prefix'=>'users','as'=>'user.'],function (){
    Route::get('/',['uses'=>'UserController@index','as'=>'all']);
    Route::get('create',['uses'=>'UserController@create','as'=>'create']);
    Route::get('{user}/edit',['uses'=>'UserController@edit','as'=>'edit']);
    Route::post('store',['uses'=>'UserController@store','as'=>'store']);
    Route::post('user/{user}',['uses'=>'UserController@update','as'=>'update']);
    Route::get('multiple',['uses'=>'UserController@multiple','as'=>'multiple']);
    Route::post('multiple-store',['uses'=>'UserController@multiple_store','as'=>'multiple_store']);


});
/** admin area  **/
Route::resource('area','AreaController',['except'=>['show','destroy']]);
Route::delete('area/destroy','AreaController@destroy');
/** admin area  **/

/** admin field  **/
    Route::resource('field','FieldController',['except'=>['show','destroy']]);
    Route::delete('field/destroy','FieldController@destroy');
/** admin field  **/

    /** admin grade  **/
    Route::resource('grade','GradeController',['except'=>['show','destroy']]);
    Route::delete('grade/destroy','GradeController@destroy');
    /** admin grade  **/

    /** admin job  **/
    Route::resource('job','JobController',['except'=>['show','destroy']]);
    Route::delete('job/destroy','JobController@destroy');
    /** admin job  **/

    /** admin university_types  **/
    Route::resource('university-type','UniversityTypeController',['except'=>['show','destroy']]);
    Route::delete('university-type/destroy','UniversityTypeController@destroy');
    /** admin university_types  **/


    /** admin university  **/
    Route::resource('university','UniversityController',['except'=>['show','destroy']]);
    Route::delete('university/destroy','UniversityController@destroy');
    /** admin university  **/

    /** admin soldier_services  **/
    Route::resource('soldier-service','SoldierServicesController',['except'=>['show','destroy']]);
    Route::delete('soldier-service/destroy','SoldierServicesController@destroy');
    /** admin soldier_services **/

    /** admin soldier_services  **/
    Route::resource('core','CoreController',['except'=>['show','destroy']]);
    Route::delete('core/destroy','SoldierServicesController@destroy');
    /** admin soldier_services **/

    /***admin message_types **********/
    Route::resource('messagetype','MessageTypeController',['except'=>['show','destroy']]);
    Route::delete('messagetype/destroy','MessageTypeController@destroy');
    /***admin message_types **********/

    /***admin message **********/
    Route::resource('message','MessageController',['except'=>['show','destroy']]);
    Route::delete('message/destroy','MessageController@destroy');
    /***admin message **********/


    /***show users for message route *******/
    Route::post('users','UserController@show_users')->name('show_users');

    /*** admin event subject ***/
    Route::get('eventSubject/changeStatus/{event}' , ['uses'=>'EventSubjectController@changeStatus' , 'as'=>'eventSubject.changeStatus']);
    Route::delete('eventSubject/destroy','EventSubjectController@destroy');
    Route::resource('eventSubject' , 'EventSubjectController' , ['except'=>'show','destroy']);
    /*** admin event subject ***/

    /*** admin event type ***/
    Route::get('eventType/changeStatus/{event}' , ['uses'=>'EventTypeController@changeStatus' , 'as'=>'eventType.changeStatus']);
    Route::delete('eventType/destroy','EventTypeController@destroy');
    Route::resource('eventType' , 'EventTypeController' , ['except'=>'show','destroy']);
    /*** admin event type ***/

    /*** admin event Status ***/
    Route::get('eventStatus/changeStatus/{event}' , ['uses'=>'EventStatusController@changeStatus' , 'as'=>'eventStatus.changeStatus']);
    Route::delete('eventStatus/destroy','EventStatusController@destroy');
    Route::resource('eventStatus' , 'EventStatusController' , ['except'=>'show','destroy']);
    /*** admin event Status ***/

    /*** admin event ***/
    Route::get('event/changeStatus/{event}' , ['uses'=>'EventController@changeStatus' , 'as'=>'eventStatus.changeStatus']);
    Route::delete('event/destroy','EventController@destroy');
    Route::resource('event' , 'EventController' , ['except'=>'show','destroy']);
    Route::post('event/getDetails' , ['uses'=>'EventController@getDetails' , 'as'=>'event.details']);
    /*** admin event ***/

    /*** admin event user ***/
    Route::get('citySelector' , ['uses'=>'EventController@citySelector' , 'as'=>'event.city_selector']);
    Route::get('event/delete/{event}' , ['uses'=>'EventController@delete','as'=>'event.delete']);
    Route::resource('eventUser' , 'EventUserController' , ['except'=>'show','destroy','create','edit','store','update']);
    /*** admin event user ***/

    /*** add user to event ***/
    Route::get('event/addUser' , ['uses'=>'EventController@addUser' , 'as'=>'event.addUser']);
    Route::post('event/addUser' ,['uses'=>'EventController@selectEvent' , 'as'=>'event.addUser.selectEvent']);
    Route::post('event/addUser/loadUsersByCore' , ['uses'=>'EventController@loadUsersByCore', 'as'=>'event.addUser.loadUsersByCore']);
    Route::post('event/addUser/store' , ['uses'=>'EventController@storeUser' , 'as'=>'event.addUser.store']);
    Route::post('event/addUser/remove' , ['uses'=>'EventController@removeUser' , 'as'=>'event.addUser.remove']);
    Route::post('event/addUser/showResult' , ['uses'=>'EventController@showResult' , 'as'=>'event.addUser.showResult']);
    Route::post('event/addUser/selectAll' , ['uses'=>'EventController@selectAll' , 'as'=>'event.addUser.selectAll']);
    /*** add user to event ***/

    /*** discounts ***/
    Route::get('discount/changeStatus/{item}' , ['uses'=>'DiscountController@changeStatus' , 'as'=>'discount.changeStatus']);
    Route::get('discount/delete/{id}' , ['uses'=>'DiscountController@delete' , 'as'=>'discount.delete']);
    Route::resource('discount' , 'DiscountController' , ['except' => 'destroy']);
    /*** discounts ***/

});

/***laravel filemanger ***/
Route::group(['prefix' => 'filemanager', 'middleware' => ['admin','CreateDefaultFolder','web'],'as'=>'unisharp.lfm.'], function () {
    // display main layout
    Route::get('/', [
        'uses' => '\\UniSharp\LaravelFilemanager\Controllers\LfmController@show',
        'as' => 'show',
    ]);

    // display integration error messages
    Route::get('/errors', [
        'uses' => '\\UniSharp\LaravelFilemanager\Controllers\LfmController@getErrors',
        'as' => 'getErrors',
    ]);

    // upload
    Route::any('/upload', [
        'uses' => '\\UniSharp\LaravelFilemanager\Controllers\UploadController@upload',
        'as' => 'upload',
    ]);

    // list images & files
    Route::get('/jsonitems', [
        'uses' => '\\UniSharp\LaravelFilemanager\Controllers\ItemsController@getItems',
        'as' => 'getItems',
    ]);

    Route::get('/move', [
        'uses' => '\\UniSharp\LaravelFilemanager\Controllers\ItemsController@move',
        'as' => 'move',
    ]);

    Route::get('/domove', [
        'uses' => '\\UniSharp\LaravelFilemanager\Controllers\ItemsController@domove',
        'as' => 'domove'
    ]);

    // folders
    Route::get('/newfolder', [
        'uses' => '\\UniSharp\LaravelFilemanager\Controllers\FolderController@getAddfolder',
        'as' => 'getAddfolder',
    ]);

    // list folders
    Route::get('/folders', [
        'uses' => '\\UniSharp\LaravelFilemanager\Controllers\FolderController@getFolders',
        'as' => 'getFolders',
    ]);

    // crop
    Route::get('/crop', [
        'uses' => '\\UniSharp\LaravelFilemanager\Controllers\CropController@getCrop',
        'as' => 'getCrop',
    ]);
    Route::get('/cropimage', [
        'uses' => '\\UniSharp\LaravelFilemanager\Controllers\CropController@getCropimage',
        'as' => 'getCropimage',
    ]);
    Route::get('/cropnewimage', [
        'uses' => '\\UniSharp\LaravelFilemanager\Controllers\CropController@getNewCropimage',
        'as' => 'getCropimage',
    ]);

    // rename
    Route::get('/rename', [
        'uses' => '\\UniSharp\LaravelFilemanager\Controllers\RenameController@getRename',
        'as' => 'getRename',
    ]);

    // scale/resize
    Route::get('/resize', [
        'uses' => '\\UniSharp\LaravelFilemanager\Controllers\ResizeController@getResize',
        'as' => 'getResize',
    ]);
    Route::get('/doresize', [
        'uses' => '\\UniSharp\LaravelFilemanager\Controllers\ResizeController@performResize',
        'as' => 'performResize',
    ]);

    // download
    Route::get('/download', [
        'uses' => '\\UniSharp\LaravelFilemanager\Controllers\DownloadController@getDownload',
        'as' => 'getDownload',
    ]);

    // delete
    Route::get('/delete', [
        'uses' => '\\UniSharp\LaravelFilemanager\Controllers\DeleteController@getDelete',
        'as' => 'getDelete',
    ]);

    Route::get('/demo', '\\UniSharp\LaravelFilemanager\Controllers\DemoController@index');
});
/***laravel filemanger ***/

/********user auth routes***************/

// Authentication Routes...
Route::get('login', [
    'as' => 'login',
    'uses' => 'Auth\LoginController@showLoginForm'
]);
Route::post('login', [
    'as' => 'login_user',
    'uses' => 'Auth\LoginController@login'
]);
Route::get('logout', [
    'as' => 'logout',
    'uses' => 'Auth\LoginController@logout'
]);

// Password Reset Routes...
Route::post('password/email', [
    'as' => 'password.email',
    'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail'
]);
Route::get('password/reset', [
    'as' => 'password.request',
    'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm'
]);
Route::post('password/reset', [
    'as' => '',
    'uses' => 'Auth\ResetPasswordController@reset'
]);
Route::get('password/reset/{token}', [
    'as' => 'password.reset',
    'uses' => 'Auth\ResetPasswordController@showResetForm'
]);

// Registration Routes...
Route::get('register', [
    'as' => 'register',
    'uses' => 'Auth\RegisterController@showRegistrationForm'
]);
Route::post('register', [
    'as' => 'register_user',
    'uses' => 'Auth\RegisterController@register'
]);
/********user auth routes***************/

Route::group(['prefix'=>'user','as'=>'user.'],function(){
   Route::get('/',['as'=>'panel','uses'=>'UserController@panel']);
    Route::get('profile',['as'=>'profile','uses'=>'UserController@profile']);
    Route::post('update',['as'=>'update','uses'=>'UserController@profile_edit']);
    Route::post('checkemail',['as'=>'checkemail','uses'=>'UserController@checkemail']);
    Route::post('checkusername',['as'=>'checkusername','uses'=>'UserController@checkusername']);
    Route::post('uploadpic',['uses'=>'UserController@uploadpic','as'=>'uploadpic']);
    Route::post('notification/get',['uses'=>'NotificationController@get','as'=>'notification.get']);
    /***user events ***/
    Route::get('events',['uses'=>'UserController@show_events','as'=>'events']);

    Route::get('events/create',['uses'=>'UserController@createEvent','as'=>'events.create']);

});

/*****public routes**********/
Route::post('show_cities',['uses'=>'UserController@show_cities','as'=>'show_cities']);
Route::post('loadfields',['as'=>'loadfields','uses'=>'FieldController@search']);
/*****public routes**********/

/******test route***********/
/*Route::get('test',function(){
   return view('user.dashboard');
});*/
/******test route***********/
Route::get('/test' , function(){
dd('add reposirory - first test for commit and push - 03');
});