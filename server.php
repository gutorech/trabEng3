<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', 'usbw', 'capitolio');

	// initialize variables
	$cpf = "";
	$nome = "";
	$horario = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$cpf = $_POST['cpf'];
		$nome = $_POST['nome'];
		$horario = $_POST['horario'];

		mysqli_query($db, "INSERT INTO pessoa (cpf, nome, horario) VALUES ('$cpf', '$nome', '$horario')"); 
		$_SESSION['message'] = "Horario salvo"; 
		header('location: 05_contact.php');
	}
	if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM pessoa WHERE idPessoa=$id");
	$_SESSION['message'] = "Horario deletado"; 
	header('location: 05_contact.php');
	}
	if (isset($_POST['update'])) {
		$id = $_POST['idPessoa'];
		$cpf = $_POST['cpf'];
		$nome = $_POST['nome'];
		$horario = $_POST['horario'];

		mysqli_query($db, "UPDATE pessoa SET cpf='$cpf', nome='$nome', horario='$horario' WHERE idPessoa=$id");
		$_SESSION['message'] = "Horario atualizado"; 
		header('location: 05_contact.php');
	}
