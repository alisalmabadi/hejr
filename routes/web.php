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
    return redirect('/user');
});

/**payment routes **/
Route::get('payment/verify','PaymentController@verify')->name('payment.verify');
Route::get('payment/verify-melat','PaymentController@verify_melat')->name('payment.verify-melat');
Route::Post('payment/request','PaymentController@request')->name('payment.request');


Route::group(['prefix'=>'admin','as' => 'admin.'],function(){
//Login Routes...
    Route::get('/','AdminController@index')->name('index');
Route::get('/login',['as'=>'login','uses'=>'AdminAuth\LoginController@showLoginForm']);
Route::post('/login',['as'=>'login','uses'=>'AdminAuth\LoginController@login']);
Route::get('/logout',['as'=>'logout','uses'=>'AdminAuth\LoginController@logout']);
/*Route::GET('/post/isaac',['as'=>'post.isaac','uses'=>'PostController@isaac']);*/

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

    /*****admin Article *******/
    Route::resource('article_category', 'ArticleCategoryController', ['except' => ['destroy']]);
    Route::Delete('/article_category/destroy',['as'=>'article_category.destroy','uses'=>'ArticleCategoryController@destroy']);
    Route::post('/article_category/slug',['as'=>'article_category.slug','uses'=>'ArticleCategoryController@slug']);
    Route::resource('article', 'ArticleController', ['except' => ['destroy']]);
    Route::Delete('/article/destroy',['as'=>'article.destroy','uses'=>'ArticleController@destroy']);
    Route::post('/article/slug',['as'=>'article.slug','uses'=>'ArticleController@slug']);
    Route::Post('/article/filter',['as'=>'article.filter','uses'=>'articleController@filter']);
    /*****admin Article *******/


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
    Route::post('event/create/validate1', ['uses'=>'EventController@create_validate1', 'as'=>'event.create.validate1']);
    Route::post('event/create/validate2', ['uses'=>'EventController@create_validate2', 'as'=>'event.create.validate2']);
    Route::post('event/create/validate3', ['uses'=>'EventController@create_validate3', 'as'=>'event.create.validate3']);
    Route::resource('event' , 'EventController' , ['except'=>'show','destroy']);
    Route::post('event/showAllEvents', ['uses'=>'EventController@showAllEvents','as'=>'event.showAllEvents']);
    Route::post('event/image/delete', ['uses'=>'EventController@delete_image', 'as'=>'event.delete_image']);
    /*** admin event ***/

    /*** admin event user ***/
    Route::get('citySelector' , ['uses'=>'EventController@citySelector' , 'as'=>'event.city_selector']);
    Route::get('event/delete/{event}' , ['uses'=>'EventController@delete','as'=>'event.delete']);
/*    Route::resource('eventUser' , 'EventUserController' , ['except'=>'show','destroy','create','edit','store','update']);*/
    Route::get('eventUser/events', ['uses'=>'EventUserController@events', 'as'=>'eventUser.events']);
    Route::get('eventUser/events/{event}', ['uses'=>'EventUserController@single_event', 'as'=>'eventUser.single_event']);
    Route::get('eventUser/changeStatus', ['uses'=>'EventUserController@changeStatus', 'as'=>'eventUser.changeStatus']);
    /*** admin event user ***/

    /*** add user to event ***/
    Route::get('event/addUser' , ['uses'=>'EventController@addUser' , 'as'=>'event.addUser']);
    Route::post('event/addUser' ,['uses'=>'EventController@selectEvent' , 'as'=>'event.addUser.selectEvent']);
    Route::post('event/addUser/loadUsersByCore' , ['uses'=>'EventController@loadUsersByCore', 'as'=>'event.addUser.loadUsersByCore']);
    Route::post('event/addUser/store' , ['uses'=>'EventController@storeUser' , 'as'=>'event.addUser.store']);
    Route::post('event/addUser/remove' , ['uses'=>'EventController@removeUser' , 'as'=>'event.addUser.remove']);
    Route::post('event/addUser/showResult' , ['uses'=>'EventController@showResult' , 'as'=>'event.addUser.showResult']);
    Route::post('event/addUser/selectAll' , ['uses'=>'EventController@selectAll' , 'as'=>'event.addUser.selectAll']);
    Route::post('event/addUser/loadUsersByCore', ['uses'=>'EventController@loadUsersByCore', 'as'=>'event.loadUsersByCore']);
    /*** add user to event ***/

    /*** discounts ***/
    Route::get('discount/changeStatus/{item}' , ['uses'=>'DiscountController@changeStatus' , 'as'=>'discount.changeStatus']);
    Route::get('discount/delete/{id}' , ['uses'=>'DiscountController@delete' , 'as'=>'discount.delete']);
    Route::resource('discount' , 'DiscountController' , ['except' => 'destroy']);
    /*** discounts ***/

    /*** images ***/
/*    Route::delete('image/delete' , ['uses'=>'ImageController@delete','as'=>'image.delete']);
    Route::resource('image' , 'ImageController', ['except'=>'destroy']);    
    Route::post('image/showEventImages' , ['uses'=>'ImageController@show_event_images' , 'as'=>'image.show_event_images']);
    Route::post('image/addEventImage' , ['uses'=>'ImageController@add_event_image', 'as'=>'image.add_event_image']);
    Route::post('image/deleteEventImage', ['uses'=>'ImageController@delete_event_image', 'as'=>'image.delete_event_image']);*/
    /*** end of images ***/

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
    Route::post('/prodile/edit/uniDetails', ['as'=>'uni_details', 'uses'=>'UserController@uni_details']);
    Route::post('/profile/edit/updateUni', ['as'=>'university.updates', 'uses'=>'UserController@university_update']);
    Route::post('/profile/edit/addUni', ['as'=>'university.add', 'uses'=>'UserController@university_add']);
    Route::post('checkemail',['as'=>'checkemail','uses'=>'UserController@checkemail']);
    Route::post('checkusername',['as'=>'checkusername','uses'=>'UserController@checkusername']);
    Route::post('uploadpic',['uses'=>'UserController@uploadpic','as'=>'uploadpic']);
    /**notification ***/
    
    Route::post('notification/get',['uses'=>'NotificationController@get','as'=>'notification.get']);
    Route::post('notification/unread/get',['uses'=>'NotificationController@unreadget','as'=>'notification.unread.get']);

    Route::post('notification/read',['uses'=>'NotificationController@read','as'=>'notification.get']);

    /***user events ***/
    Route::get('events',['uses'=>'UserController@show_events','as'=>'events']);
    
/*** event Create For Spec Users ***/
    Route::get('events/create',['uses'=>'UserController@createEvent','as'=>'events.create']);

    Route::post('events/store',['uses'=>'UserController@storeEvent','as'=>'events.store']);
    
    Route::get('events/index',['uses'=>'UserController@indexCreatedEvents','as'=>'events.index']);

    Route::patch('events/{event}',['uses'=>'UserController@updateEvent','as'=>'events.update']);

    Route::get('events/{event}/edit',['uses'=>'UserController@editCreatedEvents','as'=>'events.edit']);
/*** event Create For Spec Users ***/

    Route::post('events/register',['uses'=>'UserController@registerEvent','as'=>'events.register']);
    Route::get('events/registered/{user_event}',['uses'=>'UserController@showregistered_event','as'=>'events.registered']);
    Route::get('events/showAllRegistered', ['uses'=>'UserController@showAllRegistered','as'=>'events.showAllRegistered']);
    Route::post('event/getDetails' , ['uses'=>'EventController@getDetails' , 'as'=>'event.details']);

    /***peyment routes ***/
    
    Route::get('payment/verify','PaymentController@verify')->name('payment.verify');
    Route::Post('payment/request','PaymentController@request')->name('payment.request');

    /***peyment routes ***/

    /***** core_users_routes ******/
    Route::get('coreUsers', ['as'=>'coreUsers.index', 'uses'=>'UserController@core_users_index']);
    Route::get('coreUsers/create', ['as'=>'coreUsers.create', 'uses'=>'UserController@core_users_create']);
    Route::post('coreUsers/store', ['as'=>'coreUsers.store', 'uses'=>'UserController@core_users_store']);
    Route::get('coreUsers/edit/{user}', ['as'=>'coreUsers.edit', 'uses'=>'UserController@core_users_edit']);
    Route::get('coreUsers/show/{user}', ['as'=>'coreUsers.show', 'uses'=>'UserController@core_users_show']);
    Route::patch('coreUsers/update/{user}', ['as'=>'coreUsers.update', 'uses'=>'UserController@core_users_update']);
    /***** core_users_routes ******/

});

/*****public routes**********/
Route::post('show_cities',['uses'=>'UserController@show_cities','as'=>'show_cities']);
Route::post('loadfields',['as'=>'loadfields','uses'=>'FieldController@search']);
/*****public routes**********/
