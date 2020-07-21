<?php
if(isset($_POST['id'])) {
	require 'connect.php';
	$id = $_POST['id'];	
	if(empty($id)) {
		echo 'error';
	}else{
		$list = $conn->prepare("SELECT id, fatto FROM todos WHERE id=?");
		$list->execute(['$id']);
		$reck = $list->fetch();
		$uId = $reck['id'];
		$checked = $reck['fatto'];
		$uChecked = $checked ? 0 : 1;
		$res = $conn->query("UPDATE todos SET fatto=$uChecked WHERE id=$uId");
		if($res){
			echo $checked;
		}else{
			echo "error";
		}
		$conn = null;
		exit();
	}
}else{
	header("Location: index.php?mess=error");
}

?>