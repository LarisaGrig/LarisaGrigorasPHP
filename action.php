<?php
if(isset($_POST['titolo'])) {
	require 'connect.php';
	$titolo = $_POST['titolo'];	
	if(empty($titolo)) {
		header("Location: index.php?mess=error");
	}else{
		$stmt = $conn->prepare("INSERT INTO todos(titolo) VALUE(?)");
		$res = $stmt->execute([$titolo]);
		if($res){
			header("Location: index.php?mess=success");
		}else{
			header("Location: index.php");
		}
		$conn = null;
		exit();
	}
}else{
	header("Location: index.php?mess=error");
}

?>