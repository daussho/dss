<?php
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/handler.php';

$router = new AltoRouter();

##################################################
################### Routing ######################

$router->map( 'GET', '/', function() {
    userHandler();
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