<?php
$connect = 'localhost'; 
$user = 'root';         
$pass = '';
$db = 'todolist';				

try {
	$conn = new PDO("mysql:host=$connect; dbname=$db", $user, $pass);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){ 
	echo "Non c'è connessione: " . $e->getMessage();
}

?>