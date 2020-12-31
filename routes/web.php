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

// Front Routes
Route::get('/','HomeController@index')->name('home');
Route::get('signin','HomeController@signin')->name('signin');
Route::get('signup','HomeController@signup')->name('signup');
Route::get('logout','HomeController@logout')->name('logoutuser');
Route::post('login','HomeController@login')->name('login');
Route::post('register','HomeController@register')->name('register');
Route::get('language/{l}','HomeController@language');
Route::post('password_reset','HomeController@reset')->name('reset');



Route::get('sell-to-us','HomeController@sell')->name('sell');
Route::post('sell','HomeController@sell_Update')->name('sell.update');
Route::get('dashboard','HomeController@dashboard')->name('dashboard');
Route::get('ticket/{id}','HomeController@ticket_view')->name('ticket');
Route::post('ticket/update/','HomeController@ticket_update')->name('ticket.update');


Route::get('products','HomeController@products')->name('products');
Route::get('product/{id}','HomeController@product_view')->name('product');
Route::get('category/{id}','HomeController@productsByCat')->name('productsByCat');
Route::post('product/search','HomeController@productsSearch')->name('productsSearch');

//Cart
Route::get('cart','CartController@cart')->name('cart');
Route::get('cart/add/{id}','CartController@add_to_cart')->name('cart.add');
Route::get('cart/increament/{id}', 'CartController@increament')->name('cart.increament');
Route::get('cart/decreament/{id}', 'CartController@decreament')->name('cart.decreament');
Route::get('cart/remove/{id}', 'CartController@remove')->name('cart.remove');



Route::get('about','HomeController@about')->name('about');
Route::get('courses','HomeController@university')->name('universities');
Route::post('courses/search','HomeController@search')->name('universities.search');
Route::get('courses/{id}','HomeController@course')->name('course');
Route::get('course/{id}','HomeController@courses')->name('courses');
Route::get('course/type/{id}','HomeController@by_type')->name('courses.type');





Route::get('finance','HomeController@finance')->name('finance');
Route::get('events','HomeController@event')->name('event');
Route::get('employability','HomeController@employability')->name('employability');
Route::get('news','HomeController@news')->name('news');
Route::get('news/{id}','HomeController@news_view')->name('news.view');
Route::get('open-day','HomeController@openday')->name('openday');
Route::get('contact','HomeController@contact')->name('contact');
Route::get('enquire','HomeController@enquire')->name('enquire');
Route::post('enquire/update','HomeController@enquire_update')->name('enquire.update');
Route::get('search','HomeController@searchbar')->name('search');


Route::prefix('admin')->middleware('auth')->namespace('Admin')->name('admin.')->group(function () {

      Route::get('/home', 'DashboardController@index')->name('home');
      Route::get('/test', 'DashboardController@test')->name('test');
      
      // Users change
      Route::get('users/block/{id}','UserController@block')->name('users.block');
      Route::get('users/approve/{id}','UserController@approve')->name('users.approve');
      Route::get('users/disable/{id}','UserController@disable')->name('users.disable');
      Route::get('users/pending/{id}','UserController@pending')->name('users.pending');
      
      //Users
      Route::get('users/delete/{id}','UserController@delete')->name('users.delete');
      Route::resource('users', 'UserController');
      
      // Profiles
      Route::get('profile/{id}','UserController@profile')->name('users.profile');
      Route::post('profileupdate/{id}','ProfileController@update')->name('defaultProfile.update');
      Route::post('profile/create_field/{id}','UserController@create_field')->name('users.create.field');
      Route::post('profile/image','ProfileController@image_update')->name('profile.image');
      
      //Roles
      Route::get('roles/{id}/permissions','RoleController@permissions')->name('roles.permissions');
      Route::post('roles/addpermission/{id}','RoleController@addpermission')->name('roles.addpermission');
      Route::resource('roles', 'RoleController');
      
      //Permissions
      Route::resource('permissions', 'PermissionController');

      //Settings
      Route::post('settings/update','SettingController@setting_update')->name('settings.update');
      Route::get('settings/app','SettingController@app')->name('settings.app');
      Route::get('settings/home','SettingController@home')->name('settings.home');
      Route::get('settings/shop','SettingController@shop')->name('settings.shop');
     
  

      //Complain
      Route::get('complians/client/{id}','ComplainController@client_get');
      Route::post('complains/client','ComplainController@client_sent');
      Route::get('chat/','ComplainController@chat')->name('chat');
      Route::get('chat/getuser/{id}','ComplainController@Get_user');
      Route::post('complains/admin','ComplainController@admin_sent');

      Route::get('complains/view/{id}','ComplainController@view')->name('complains.view');
      Route::post('complains/sent/{id}','ComplainController@sent')->name('complains.sent');
      Route::get('complains/view/all','ComplainController@view_all');
      Route::get('complains/getusers','ComplainController@get_all_users');
      Route::get('complains/get/{id}/msgs','ComplainController@get_all_messages');
      Route::get('complains/{id}/id/{msg}/msgs','ComplainController@sent_messages');
      Route::post('complains/new','ComplainController@new_message')->name('complains.new');
      Route::get('complains/{id}/delete','ComplainController@delete')->name('complains.delete');

       //Categories
       Route::get('categories','CategoryController@index')->name('categories.index');
       Route::get('categories/sub','CategoryController@sub')->name('categories.sub');
       Route::get('categories/create','CategoryController@create')->name('categories.create');
       Route::post('categories/store','CategoryController@store')->name('categories.store');
       Route::get('categories/edit/{id}','CategoryController@edit')->name('categories.edit');
       Route::post('categories/update/{id}','CategoryController@update')->name('categories.update');
       Route::get('categories/delete/{id}','CategoryController@delete')->name('categories.delete');

       //Products
       Route::get('products','ProductController@index')->name('products.index');
       Route::get('products/create','ProductController@create')->name('products.create');
       Route::post('products/store','ProductController@store')->name('products.store');
       Route::get('products/edit/{id}','ProductController@edit')->name('products.edit');
       Route::post('products/update/{id}','ProductController@update')->name('products.update');
       Route::get('products/delete/{id}','ProductController@delete')->name('products.delete');

       //Forms
       Route::get('forms','FormController@index')->name('forms.index');
       Route::get('forms/create','FormController@create')->name('forms.create');
       Route::post('forms/store','FormController@store')->name('forms.store');
       Route::get('forms/edit/{id}','FormController@edit')->name('forms.edit');
       Route::post('forms/update/{id}','FormController@update')->name('forms.update');
       Route::get('forms/delete/{id}','FormController@delete')->name('forms.delete');

      //News
      Route::get('news','NewsController@index')->name('news.index');
      Route::get('news/create','NewsController@create')->name('news.create');
      Route::post('news/store','NewsController@store')->name('news.store');
      Route::get('news/edit/{id}','NewsController@edit')->name('news.edit');
      Route::post('news/update/{id}','NewsController@update')->name('news.update');
      Route::get('news/view/{id}','NewsController@view')->name('news.view');
      Route::get('news/delete/{id}','NewsController@delete')->name('news.delete');

     //Users
      Route::get('partners','PartnerController@index')->name('partners.index');
      Route::get('partners/create','PartnerController@create')->name('partners.create');
      Route::post('partners/store','PartnerController@store')->name('partners.store');
      Route::get('partners/edit/{id}','PartnerController@edit')->name('partners.edit');
      Route::post('partners/update/{id}','PartnerController@update')->name('partners.update');

      
      //Filemanager
      Route::get('filemanager','FileManagerController@index')->name('filemanager.index');
      Route::post('filemanager/upload','FileManagerController@upload')->name('filemanager.upload');
      Route::get('filemanager/delete/{id}','FileManagerController@delete')->name('filemanager.delete');
      Route::get('filemanager/allfiles','FileManagerController@allfiles');


      //Test
       Route::post('test',function(){ return view('test'); });
    
});

// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');