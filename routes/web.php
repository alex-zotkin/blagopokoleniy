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



Route::get('/', ['as'=>'index', 'uses'=>'IndexController@index']);

Route::get('articles', ['as'=>'articles', 'uses'=>'ArticlesController@index']);
Route::get('articles/{id}', ['as'=>'article', 'uses'=>'ArticleController@index']);


Route::get('events', ['as'=>'events_years', 'uses'=>'EventsController@index']);
Route::get('events/{year}', ['as'=>'events', 'uses'=>'EventsController@index']);
Route::get('events/{year}/{id}', ['as'=>'event', 'uses'=>'EventsController@index']);


Route::get('achievements', ['as'=>'achievements', 'uses'=>'AchievementsController@index']);

Route::get('contacts', ['as'=>'contacts', 'uses'=>'ContactsController@index']);

Route::get('about', ['as'=>'about', 'uses'=>'AboutController@index']);

Route::get('mission', ['as'=>'mission', 'uses'=>'MissionController@index']);

Route::get('login', ['as'=>'login', 'uses'=>'AuthController@getLogin']);
Route::post('login', ['as'=>'login', 'uses'=>'AuthController@postLogin']);
Route::get('logout', ['as'=>'logout', 'uses'=>'AuthController@logout']);


//Route::get('register', ['as'=>'register', 'uses'=>'RegisterController@index']);
//Route::post('register', ['as'=>'register', 'uses'=>'RegisterController@create']);

///////////////////////ADMIN////////////////////////
Route::get('admin', ['as'=>'admin', 'uses'=>'AdminController@index']);

Route::get('admin/achievements', ['as'=>'adminAchievements', 'uses'=>'AdminController@achievements']);
Route::get('admin/achievements/imgs/delete/{name}', ['as'=>'adminAchievementsDelete', 'uses'=>'AdminController@achievementsDelete']);
Route::post('admin/achievements/imgs/add', ['as'=>'adminAchievementsAdd', 'uses'=>'AdminController@achievementsAdd']);
Route::post('admin/achievements/docs/add', ['as'=>'adminAchievementsAddDocs', 'uses'=>'AdminController@achievementsAddDocs']);
Route::get('admin/achievements/docs/delete/{name}', ['as'=>'adminAchievementsDeleteDoc', 'uses'=>'AdminController@achievementsDeleteDoc']);

Route::get('admin/events', ['as'=>'adminEvents', 'uses'=>'AdminController@events']);
Route::get('admin/events/add', ['as'=>'adminEventsAdd', 'uses'=>'AdminController@eventsAdd']);
Route::post('admin/events/add', ['as'=>'adminEventsAddPost', 'uses'=>'AdminController@eventsAddPost']);
Route::get('admin/events/delete/{year}/{name}', ['as'=>'adminEventsDelete', 'uses'=>'AdminController@eventsDelete']);
Route::get('admin/events/edit/{year}/{name}', ['as'=>'adminEventsEdit', 'uses'=>'AdminController@eventsEdit']);


Route::get('admin/news', ['as'=>'adminNews', 'uses'=>'AdminController@news']);
Route::get('admin/news/add', ['as'=>'adminNewsAdd', 'uses'=>'AdminController@newsAdd']);
Route::post('admin/news/add', ['as'=>'adminNewsAddPost', 'uses'=>'AdminController@newsAddPost']);
Route::get('admin/news/delete/{id}', ['as'=>'adminNewsDelete', 'uses'=>'AdminController@newsDelete']);

///////////////////////////////////////////////////////
Route::get('/home', function(){
    return redirect()->route('index');
});