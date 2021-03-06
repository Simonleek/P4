<?php

/**
* Index
*/
Route::get('/', 'IndexController@getIndex');

/**
* User Control
*/
Route::get('/signup', 'UserController@getSignup');
Route::get('/login', 'UserController@getLogin' );
Route::post('/signup', ['before' => 'csrf', 'uses' => 'UserController@postSignup'] );
Route::post('/login', ['before' => 'csrf', 'uses' => 'UserController@postLogin'] );
Route::get('/logout', ['before' => 'auth', 'uses' => 'UserController@getLogout'] );

/**
* Task
* (Explicit Routing)
*/
Route::get('/task/view/{option}', 'TaskController@getIndex');
Route::get('/task/edit/{id}', 'TaskController@getEdit');
Route::post('/task/edit', 'TaskController@postEdit');
Route::post('/task/edit/{id}', 'TaskController@postEdit');
Route::get('/task/create', 'TaskController@getCreate');
Route::post('/task/create', 'TaskController@postCreate');
Route::post('/task/delete', 'TaskController@postDelete');
/*
*RESTFUL Task Type
*/
Route::resource('tasktype', 'TaskTypeController');

/* environment set up and debug
Route::get('/get-environment',function() {

    echo "Environment: ".App::environment();

});
Route::get('/trigger-error',function() {

    # Class Foobar should not exist, so this should create an error
    $foo = new Foobar;

});
Route::get('mysql-test', function() {

    # Print environment
    echo 'Environment: '.App::environment().'<br>';

    # Use the DB component to select all the databases
    $results = DB::select('SHOW DATABASES;');

    # If the "Pre" package is not installed, you should output using print_r instead
    echo Pre::render($results);

});
Route::get('/debug', function() {

    echo '<pre>';

    echo '<h1>environment.php</h1>';
    $path   = base_path().'/environment.php';

    try {
        $contents = 'Contents: '.File::getRequire($path);
        $exists = 'Yes';
    }
    catch (Exception $e) {
        $exists = 'No. Defaulting to `production`';
        $contents = '';
    }

    echo "Checking for: ".$path.'<br>';
    echo 'Exists: '.$exists.'<br>';
    echo $contents;
    echo '<br>';

    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';

    echo '<h1>Debugging?</h1>';
    if(Config::get('app.debug')) echo "Yes"; else echo "No";

    echo '<h1>Database Config</h1>';
    print_r(Config::get('database.connections.mysql'));

    echo '<h1>Test Database Connection</h1>';
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    } 
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }

    echo '</pre>';
	
});*/