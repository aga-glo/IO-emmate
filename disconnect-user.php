<?php


//to jest komentarz, ktory ma przypomniec o tym, ze powtarzalny chunk kodu taki jak ten, ktory sprawdza czy user jest zalogowany mozna zapisac w oddzielnym pliku (np. sprawdzLogowanie.php) i zaincludowac go tutaj przy wykorzystaniu require_once
	session_start();

	if (isSet($_SESSION['userId'])) {
		
	} else {
		header('Location: index.php');
		exit;
	}



?>