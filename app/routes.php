<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::resource('applications', 'ApplicationsController');
//Route::get('applications', 'ApplicationsController@index');

Route::get('/', function(){
  // return "Hi!"; # for testing
  //$applications = Application::orderBy('ent_applied_date', 'desc')->get();
  return View::make('index');
});

Route::get('edit', 
  function() { 
    $application = Application::find(1); 
    return View::make('applications.edit')->with(compact('application'));
  }
);

Route::post(
  'applications/{id}/update', 
  ['as'=>'applications.update', 'uses' => 'ApplicationsController@update']
//    function() { 
//       dd(Input::all());
//      
//    }
);
  