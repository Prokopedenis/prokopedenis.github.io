<?php



	function write_page() //в случае, если переход не по ссылке для редиректа, отображаем главную страницу
	{
		echo "<DOCTYPE html>
				<html>
				<head>

				<title>Сокращатель ссылок</title>

				</head>
				<body>
					
					Введите ссылку:<br>
					<input id='href' value=''><br>
					Введите желаемый вид ссылки (опционально) <br>
					https://prokopedenis.000webhostapp.com/redir.php?r=<input id='href2' value=''><br>
					<input type='button' onclick='SendGet()' value='Сгенерировать'><br>

					<div id='idd'></div>
				  
				<script>
				  
				function SendGet() //самая обычная отправка данных ajax 
				{
					//сбор данных из полей для ввода и формирование сообщения для отправки
					var str=document.getElementById('href').value;
					var str2=document.getElementById('href2').value;
					var msg='ajax.php?q=' + str;
					
					if (str.length == 0) //если запрос пустой, стираем выводимую ссылку
					{ 
						document.getElementById('idd').innerHTML = '';
						return;
					} else 
						{
							var xmlhttp = new XMLHttpRequest();
							
							xmlhttp.onreadystatechange = function() 
							{
								if (this.readyState == 4 && this.status == 200) 
								{
									document.getElementById('idd').innerHTML = this.responseText;
								}
							};
							
							
							
							if(str2.length != 0) //проверка на заполнение необязательного поля
							{
								msg=msg+'&e='+str2;
							}

							xmlhttp.open('GET', msg, true);
							xmlhttp.send();
						}
				}
					
				</script>

				</body>

				</html>";
	}
	
	write_page();
?>