<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/login', 'UserController@login')->name('login');
Route::post('/login', 'UserController@login')->name('dologin');
// Route::get('/register', 'RegisterController@index')->name('register');
// Route::post('/register', 'RegisterController@sendsms')->name('sendsms');
// Route::post('/register/checksms', 'RegisterController@checksms')->name('checksms');
// Route::post('/register/createuser', 'RegisterController@createuser')->name('createuser');
Route::group(['middleware' => ['auth', 'message']], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard_admin');


    Route::group(['prefix' => '/charges'], function () {
        Route::get('/', 'ChargeController@index')->name('charges');
        Route::any('/create', 'ChargeController@create')->name('charge_create');
        Route::any('/edit/{id}', 'ChargeController@edit')->name('charge_edit');
        Route::get('/delete/{id}', 'ChargeController@delete')->name('charge_delete');
    });


    Route::group(['prefix' => '/reports'], function () {
        Route::get('/', 'ReportController@index')->name('reports');
        Route::any('/create', 'ReportController@create')->name('report_create');
        Route::any('/edit/{id}', 'ReportController@edit')->name('report_edit');
        Route::get('/delete/{id}', 'ReportController@delete')->name('report_delete');
    });
    /*
    Route::group(['prefix' => '/need_parent_tag_ones'], function () {
        Route::get('/', 'NeedParentTagOneController@index')->name('need_parent_tag_ones');
        Route::any('/create', 'NeedParentTagOneController@create')->name('need_parent_tag_one_create');
        Route::any('/edit/{id}', 'NeedParentTagOneController@edit')->name('need_parent_tag_one_edit');
        Route::get('/delete/{id}', 'NeedParentTagOneController@delete')->name('need_parent_tag_one_delete');
    });

    Route::group(['prefix' => '/need_parent_tag_twos'], function () {
        Route::get('/', 'NeedParentTagTwoController@index')->name('need_parent_tag_twos');
        Route::any('/create', 'NeedParentTagTwoController@create')->name('need_parent_tag_two_create');
        Route::any('/edit/{id}', 'NeedParentTagTwoController@edit')->name('need_parent_tag_two_edit');
        Route::get('/delete/{id}', 'NeedParentTagTwoController@delete')->name('need_parent_tag_two_delete');
    });

    Route::group(['prefix' => '/need_parent_tag_threes'], function () {
        Route::get('/', 'NeedParentTagThreeController@index')->name('need_parent_tag_threes');
        Route::any('/create', 'NeedParentTagThreeController@create')->name('need_parent_tag_three_create');
        Route::any('/edit/{id}', 'NeedParentTagThreeController@edit')->name('need_parent_tag_three_edit');
        Route::get('/delete/{id}', 'NeedParentTagThreeController@delete')->name('need_parent_tag_three_delete');
    });

    Route::group(['prefix' => '/need_parent_tag_fours'], function () {
        Route::get('/', 'NeedParentTagFourController@index')->name('need_parent_tag_fours');
        Route::any('/create', 'NeedParentTagFourController@create')->name('need_parent_tag_four_create');
        Route::any('/edit/{id}', 'NeedParentTagFourController@edit')->name('need_parent_tag_four_edit');
        Route::get('/delete/{id}', 'NeedParentTagFourController@delete')->name('need_parent_tag_four_delete');
    });

    Route::group(['prefix' => '/parent_tag_ones'], function () {
        Route::get('/', 'ParentTagOneController@index')->name('parent_tag_ones');
        Route::any('/create', 'ParentTagOneController@create')->name('parent_tag_one_create');
        Route::any('/edit/{id}', 'ParentTagOneController@edit')->name('parent_tag_one_edit');
        Route::get('/delete/{id}', 'ParentTagOneController@delete')->name('parent_tag_one_delete');
    });

    Route::group(['prefix' => '/parent_tag_twos'], function () {
        Route::get('/', 'ParentTagTwoController@index')->name('parent_tag_twos');
        Route::any('/create', 'ParentTagTwoController@create')->name('parent_tag_two_create');
        Route::any('/edit/{id}', 'ParentTagTwoController@edit')->name('parent_tag_two_edit');
        Route::get('/delete/{id}', 'ParentTagTwoController@delete')->name('parent_tag_two_delete');
    });

    Route::group(['prefix' => '/parent_tag_threes'], function () {
        Route::get('/', 'ParentTagThreeController@index')->name('parent_tag_threes');
        Route::any('/create', 'ParentTagThreeController@create')->name('parent_tag_three_create');
        Route::any('/edit/{id}', 'ParentTagThreeController@edit')->name('parent_tag_three_edit');
        Route::get('/delete/{id}', 'ParentTagThreeController@delete')->name('parent_tag_three_delete');
    });

    Route::group(['prefix' => '/parent_tag_fours'], function () {
        Route::get('/', 'ParentTagFourController@index')->name('parent_tag_fours');
        Route::any('/create', 'ParentTagFourController@create')->name('parent_tag_four_create');
        Route::any('/edit/{id}', 'ParentTagFourController@edit')->name('parent_tag_four_edit');
        Route::get('/delete/{id}', 'ParentTagFourController@delete')->name('parent_tag_four_delete');
    });

    Route::group(['prefix' => '/tags'], function () {
        Route::get('/', 'TagController@index')->name('tags');
        Route::any('/create', 'TagController@create')->name('tag_create');
        Route::any('/edit/{id}', 'TagController@edit')->name('tag_edit');
        Route::get('/delete/{id}', 'TagController@delete')->name('tag_delete');
    });

    Route::group(['prefix' => '/need_tags'], function () {
        Route::get('/', 'NeedTagController@index')->name('need_tags');
        Route::any('/create', 'NeedTagController@create')->name('need_tag_create');
        Route::any('/edit/{id}', 'NeedTagController@edit')->name('need_tag_edit');
        Route::get('/delete/{id}', 'NeedTagController@delete')->name('need_tag_delete');
    });

    Route::group(['prefix' => '/collections'], function () {
        Route::get('/', 'CollectionController@index')->name('collections');
        Route::any('/create', 'CollectionController@create')->name('collection_create');
        Route::any('/edit/{id}', 'CollectionController@edit')->name('collection_edit');
        Route::get('/delete/{id}', 'CollectionController@delete')->name('collection_delete');
    });

    Route::group(['prefix' => '/products'], function () {
        Route::get('/', 'ProductController@index')->name('products');
        Route::any('/create', 'ProductController@create')->name('product_create');
        Route::any('/edit/{id}', 'ProductController@edit')->name('product_edit');
        Route::get('/delete/{id}', 'ProductController@delete')->name('product_delete');
    });

    Route::group(['prefix' => '/temperatures'], function () {
        Route::get('/', 'TemperatureController@index')->name('temperatures');
        Route::any('/create', 'TemperatureController@create')->name('temperature_create');
        Route::any('/edit/{id}', 'TemperatureController@edit')->name('temperature_edit');
        Route::get('/delete/{id}', 'TemperatureController@delete')->name('temperature_delete');
    });

    Route::group(['prefix' => '/students'], function () {
        Route::any('/', 'StudentController@index')->name('students');
        Route::any('/all', 'StudentController@indexAll')->name('student_all');
        Route::any('/create', 'StudentController@create')->name('student_create');
        Route::any('/edit/{call_back}/{id}', 'StudentController@edit')->name('student_edit');
        Route::get('/delete/{id}', 'StudentController@delete')->name('student_delete');
        Route::get('/call/{id}', 'StudentController@call')->name('student_call');
        Route::post('/tag', 'StudentController@tag')->name('student_tag');
        Route::post('/temperature', 'StudentController@temperature')->name('student_temperature');
        Route::any('/csv', 'StudentController@csv')->name('student_csv');
        Route::post('/supporter', 'StudentController@supporter')->name('student_supporter');
        Route::get('/purchases/{id}', 'StudentController@purchases')->name('student_purchases');
    });

    Route::group(['prefix' => '/marketer'], function () {
        Route::any('profile','MarketerController@profile')->name('marketerprofile');
        Route::get('dashboard','MarketerController@dashboard')->name('marketerdashboard');
        Route::get('mystudents','MarketerController@mystudents')->name('marketermystudents');
        Route::get('students','MarketerController@students')->name('marketerstudents');
        Route::any('students/create','MarketerController@createStudents')->name('marketercreatestudents');
        Route::get('payments','MarketerController@payments')->name('marketerpayments');
        Route::get('circulars','MarketerController@circulars')->name('marketercirculars');
        Route::get('mails','MarketerController@mails')->name('marketermails');
        Route::get('discounts','MarketerController@discounts')->name('marketerdiscounts');
        Route::get('products','MarketerController@products')->name('marketerproducts');
        Route::get('code','MarketerController@code')->name('marketercode');
    });



    Route::group(['prefix' => '/sources'], function () {
        Route::get('/', 'SourceController@index')->name('sources');
        Route::any('/create', 'SourceController@create')->name('source_create');
        Route::any('/edit/{id}', 'SourceController@edit')->name('source_edit');
        Route::get('/delete/{id}', 'SourceController@delete')->name('source_delete');
    });


    Route::group(['prefix' => '/messages'], function () {
        Route::get('/', 'MessageController@index')->name('messages');
        Route::any('/create', 'MessageController@create')->name('message_create');
        Route::get('/user/{id}', 'MessageController@userIndex')->name('message_user');
        Route::any('/user_create/{id}', 'MessageController@userCreate')->name('message_user_create');
        Route::any('/message_create/{id}', 'MessageController@messageCreate')->name('message_message_create');
    });

    Route::group(['prefix' => '/purchases'], function () {
        Route::get('/', 'PurchaseController@index')->name('purchases');
        Route::any('/create', 'PurchaseController@create')->name('purchase_create');
        Route::any('/edit/{id}', 'PurchaseController@edit')->name('purchase_edit');
        Route::get('/delete/{id}', 'PurchaseController@delete')->name('purchase_delete');
    });

    Route::group(['prefix' => '/user_supporters'], function () {
        Route::get('/', 'SupporterController@index')->name('user_supporters');
        Route::any('/students/{id}', 'SupporterController@students')->name('supporter_allstudents');
        Route::any('/create', 'SupporterController@create')->name('user_supporter_create');
        Route::post('/change_pass', 'SupporterController@changePass')->name('user_supporter_changepass');
    });

    Route::group(['prefix' => '/schools'], function () {
        Route::get('/', 'SchoolController@index')->name('schools');
        Route::any('/create', 'SchoolController@create')->name('school_create');
        Route::any('/edit/{id}', 'SchoolController@edit')->name('school_edit');
        Route::get('/delete/{id}', 'SchoolController@delete')->name('school_delete');
    });

    Route::group(['prefix' => '/sale_suggestions'], function () {
        Route::get('/', 'SaleSuggestionController@index')->name('sale_suggestions');
        Route::any('/create', 'SaleSuggestionController@create')->name('sale_suggestion_create');
        Route::any('/edit/{id}', 'SaleSuggestionController@edit')->name('sale_suggestion_edit');
        Route::get('/delete/{id}', 'SaleSuggestionController@delete')->name('sale_suggestion_delete');
    });

    Route::group(['prefix' => '/call_results'], function () {
        Route::get('/', 'CallResultController@index')->name('call_results');
        Route::any('/create', 'CallResultController@create')->name('call_result_create');
        Route::any('/edit/{id}', 'CallResultController@edit')->name('call_result_edit');
        Route::get('/delete/{id}', 'CallResultController@delete')->name('call_result_delete');
    });

    Route::group(['prefix' => '/notices'], function () {
        Route::get('/', 'NoticeController@index')->name('notices');
        Route::any('/create', 'NoticeController@create')->name('notice_create');
        Route::any('/edit/{id}', 'NoticeController@edit')->name('notice_edit');
        Route::get('/delete/{id}', 'NoticeController@delete')->name('notice_delete');
    });

    Route::group(['prefix' => '/supporter_students'], function () {
        Route::any('/', 'SupporterController@student')->name('supporter_students');
        Route::any('/students', 'SupporterController@newStudents')->name('supporter_student_new');
        Route::post('/call', 'SupporterController@call')->name('supporter_student_call');
        Route::post('/seen', 'SupporterController@seen')->name('supporter_student_seen');
        Route::any('/calls/{id}', 'SupporterController@calls')->name('supporter_student_allcall');
        Route::any('/create', 'SupporterController@studentCreate')->name('supporter_student_create');
        Route::any('/purchases', 'SupporterController@purchases')->name('supporter_student_purchases');
    });

    Route::group(['prefix' => '/circulars'], function () {
        Route::get('/', 'CircularController@index')->name('circulars');
        Route::any('/create', 'CircularController@create')->name('circular_create');
        Route::any('/edit/{id}', 'CircularController@edit')->name('circular_edit');
        Route::get('/delete/{id}', 'CircularController@delete')->name('circular_delete');
    });

    Route::group(['prefix' => '/helps'], function () {
        Route::get('/', 'HelpController@index')->name('helps');
        Route::get('/grid', 'HelpController@grid')->name('grid');
        Route::any('/create', 'HelpController@create')->name('help_create');
        Route::any('/edit/{id}', 'HelpController@edit')->name('help_edit');
        Route::get('/delete/{id}', 'HelpController@delete')->name('help_delete');
    });
    */
});

