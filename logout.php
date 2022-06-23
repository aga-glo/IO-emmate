<?php

	//echo "wylogowuje"; 

	session_start();

	if (isSet($_SESSION['userId'])) {
		//echo "jestes zalogowany";

		unset($_SESSION["userId"]);
		
		header('Location: index.php');
	} else {
		echo "nie jestes zalogowany wiec nie moge wylogowac";
		exit;
	}