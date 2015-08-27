<?php

session_start();

// If the shopping cart does not exist
if( !isset($_SESSION['cart']) || isset($_GET['clearcart']) ) {
	
	// create the cart
	$_SESSION['cart'] = [];

}

// include the header
include 'app/templates/header.php';

// Dispaly all the cart contents
include 'app/templates/cartContents.php';