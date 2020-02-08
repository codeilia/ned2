<?php

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', "HomeController@index");

    Route::get('edit-pass', "PasswordController@edit")->name('edit-pass');

    Route::put('update-pass', 'PasswordController@update')->name('update-pass');

    Route::resource('soldiers', 'SoldiersController');
    Route::get('archives', 'SoldiersController@archives')->name('archives');
    Route::get('soldiers/{soldier}/updateMartialInfo', 'MartialInfosController@edit')->name('martialInfos.edit');
    Route::put('soldiers/{soldier}/updateMartialInfo', 'MartialInfosController@update')->name('martialInfos.update');
    Route::get('soldiers/{soldier}/updateLeaveInfo', 'LeaveInfosController@edit')->name('leaveInfos.edit');
    Route::put('soldiers/{soldier}/updateLeaveInfo', 'LeaveInfosController@update')->name('leaveInfos.update');
    Route::get('soldiers/{soldier}/archiveForm', 'SoldiersController@archiveForm')->name('soldiers.archiveForm');
    Route::put('soldiers/{soldier}/archive', 'SoldiersController@archive')->name('soldiers.archive');
    Route::get('soldiers/{soldier}/estelam', 'SoldiersController@estelam')->name('soldiers.estelam');


    Route::resource('absences', 'AbsencesController');
    Route::resource('extraDuties', 'ExtraDutiesController');
    Route::resource('shortages', 'ShortagesController');
    Route::resource('voidDuties', 'VoidDutiesController');
    Route::resource('units', 'UnitsController');

    Route::get('statistics/create', "StatisticsController@create")->name('statistics.create');
    Route::get('statistics', "StatisticsController@index")->name('statistics.index');
    Route::get('units-statistics', "UnitsStatisticsController@index")->name('units.statistics.index');
    Route::resource('leaves', 'LeavesController', ['parameters' => ['leaves' => 'leave']]);
//
//Route::resource('extraDuties', 'ExtraDutiesController');
//Route::resource('absences', 'AbsencesController');
//Route::resource('units', 'UnitsController');

//Route::resource('leaves', 'LeavesController');
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('form-111/{soldier}', 'GenerateFormsController@form111')->name('form-111');
});


//Route::get('/home', 'HomeController@index')->name('home');