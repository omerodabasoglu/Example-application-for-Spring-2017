<?php

Route::get('/books', 'BookController@index');
Route::get('/books/{title}', 'BookController@show');
Route::get('/books/{title?}', 'BookController@view');

# /routes/web.php
Route::get('/search', 'BookController@search');

Route::get('/', 'WelcomeController');

/**
* Practice
*/
Route::any('/practice/{n?}', 'PracticeController@index');

if(config('app.env') == 'local') {
    Route::get('/logs', function(){ });
}

if(config('app.env') == 'local') {
    Route::get('/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
}

/* code for testing and experimenting */

if(App::environment('local')) {

    Route::get('/drop', function() {

        DB::statement('DROP database fooboks');
        DB::statement('CREATE database fooboks');

        return 'Dropped fooboks; created fooboks.';
    });

};
