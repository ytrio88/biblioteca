<?php
	function conexao()
	{
		$connect = new mysqli("localhost", "root", "", "biblioteca");
		$connect->query("SET NAMES 'UTF8'");
		if ($connect->connect_error)
			echo "problema";
		return $connect;
	}
?>