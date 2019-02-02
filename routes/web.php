<?php

Route::get('/', function () {
    return redirect(url('/phonebook'));
});
  
Route::resource('/phonebook','PhonebookController');
Route::post('/getData','PhonebookController@getData');
/*

    Route::get('/phonebook/{name}',function(){
        return redirect(url('/phonebook'));
    })->where('name','[A-Za-z]+');

*/