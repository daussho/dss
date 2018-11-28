<?php
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/handler.php';

$router = new AltoRouter();

##################################################
################### Routing ######################

##################### API ########################

$router->map( 'GET', '/api/login', function() {
    loginHandler();
}, 'login-api');

$router->map( 'GET', '/api/data/[:p]', function($p) {
    dataHandler($p);
}, 'data-api');

#################### Views #######################

$router->map( 'GET', '/', function() {
	require __DIR__ . '/views/login.html';
}, 'login-page');

$router->map( 'GET', '/home', function() {
    require __DIR__ . '/views/home.html';
}, 'homepage');

$router->map( 'GET', '/graph', function() {
    require __DIR__ . '/views/graph.html';
}, 'graph-page');

#################### Static #######################

$router->map( 'GET', '/static/[:s]', function() {
    require __DIR__ . '/static/' . $s;
}, 'static-file');

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