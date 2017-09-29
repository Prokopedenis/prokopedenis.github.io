<?php

	$link = mysqli_connect("localhost", "id2601144_prokopedenis", "prokopedenis10", "id2601144_test"); 
	mysqli_query($link,"set names utf8");
	
	//обработка входящей ссылки INSERT INTO `Short_URL` (`Id`, `URL`, `HASH`) VALUES ('', 'http://php.net/manual/ru/function.base-convert.php', 'wqda');
	if(isset($_GET["q"]))
	{
		$q = $_REQUEST["q"];

		if(isset($_GET["e"])) //проверяем наличие желаемого вида для ссылки
		{
			$e = $_REQUEST["e"];
			$site = "https://prokopedenis.000webhostapp.com/redir.php"; //Адрес страницы с редиректом 
			
	
			echo "<a href='' target='_blank'>dsfsdf</a>"; //выводим пользователю ссылку, в виде ссылки
			
		}
		else //случайная ссылка
		{
			// проверка на наличие ссылки в базе. если есть, то выдаётся готовая
			if($result=mysqli_query($link,"SELECT * FROM `URL` WHERE URL='$q'"))
			{
				$raw=mysqli_fetch_assoc($result); echo $raw['HASH']; 
			}
			else
			{
				echo 'nooo';
			}

			 
			
		}
	}	

?>