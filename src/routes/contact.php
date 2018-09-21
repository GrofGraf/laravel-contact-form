<?php

Route::group(['middleware' => 'web'], function () {

  Route::get('contact', 'GrofGraf\LaravelContactForm\Controllers\ContactController@show_form')->name('show_contact_form');

  Route::post('contact', 'GrofGraf\LaravelContactForm\Controllers\ContactController@post_form')->name('post_contact_form');
  
});
