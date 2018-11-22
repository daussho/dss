<?php
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/handler.php';

$router = new AltoRouter();

##################################################
################### Routing ######################

##################### API ########################

$router->map( 'GET', '/login', function() {
    loginHandler();
});

#################### Views #######################

$router->map( 'GET', '/', function() {
	require __DIR__ . '/views/login.html';
});

$router->map( 'GET', '/home', function() {
    require __DIR__ . '/views/home.html';
});

##################################################

$match = $router->match();

// call closure or throw 404 status
if( $match ) {
	call_user_func_array( $match['target'], $match['params'] ); 
} else {
	// no route was matched
	header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}

?>