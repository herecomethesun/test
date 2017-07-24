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
Route::get('/','VisitorsController@showAll');
Route::get('/visitors','VisitorsController@showAll');

Route::get('/visitors/create', 'VisitorsController@create');
Route::post('/visitors/create', 'VisitorsController@update');
Route::get('/visitors/{id}', 'VisitorsController@show');
Route::get('/visitors/{id}/edit', 'VisitorsController@edit');
Route::get('/visitors/{id}/delete', 'VisitorsController@destroy');

Route::post('/visitors','VisitorsController@showAllpost');
Route::post('/visitors/{id}', 'VisitorsController@store');







//Route::get('/visitors/{id}',['as'=>'visitors',function($id){
//    echo $id;
//}]);




//Route::get('/page/{id}',function($id = null){
//    return redirect()->route('visitors',array('id'=>25));
//
//})->where('id','[0-9]+');
//
//
//Route::get('/comments',function(){
//    print_r($_POST);
//});
//
//
//Route::get('/about/{id}','VisitorsController@show');
//
//Route::get('/visitors',['uses'=>'VisitorsController@getVisitors','visitors']);
//Route::get('/visitor/{id}',['uses'=>'VisitorsController@getVisitor','visitor','middleware'=>'mymiddle']);
//
////list pages
//Route::resource('/pages/create','CoreResource@create');
//Route::post('/openForm','CoreResource@store');


?>
