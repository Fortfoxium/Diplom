<?php
	SESSION_START();
	include "../connection_code_to_data_base.php";
	if($_SESSION['role']!=="Registrator")
	{
	echo "<html> <head> <Meta http-equiv='refresh' content='0; URL=chttp://websiteofpoliklinika/index.php'> </head> </html>";
	};
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="utf-8">
	<title>Просмотр списков пациентов</title>
        <link rel="stylesheet" href='../base_of_pages.css'>
</head>
<body>
<style type="text/css">
	form  { display: table;      }
form p{ display: table-row;width: 100%  }
label { display: table-cell; }
input { display: table-cell;  margin-top: 2%; width: 335px; height: 30px; 
  font-family: Century Gothic, Helvetica, Arial, sans-serif;
  letter-spacing: inherit;
  word-spacing: inherit;
                font-size: 16px;
  border: 0.1em solid}
select{ margin-top: 2%; width: 340px; height: 30px; 
  font-family: Century Gothic, Helvetica, Arial, sans-serif;
  letter-spacing: inherit;
  word-spacing: inherit;font-size: 16px;
  border: 0.1em solid;
   }
button{
	 margin-top: 2%; width: 340px; height: 30px; 
  font-family: Century Gothic, Helvetica, Arial, sans-serif;
  letter-spacing: inherit;
  word-spacing: inherit;
  border: 0.1em solid
}
label{
	font-family: Century Gothic, Helvetica, Arial, sans-serif;font-size: 17px;
}

</style>

<?php include ($_SERVER['DOCUMENT_ROOT'].'/header.php') ?>
						<main style="padding: 15px; height:900px">
							<div >
	<script src="../jquery-3.6.3.js"></script>
	<script src="inputmask.min.js"></script>
								<script>

							$(function() {
                          

                          

						  $("#tel").mask("9999999999");
						

						

						  });
								</script>
								<h2 style="font-family: Century Gothic, Helvetica, Arial, sans-serif; background-color: white; padding: 5px; ">Добавление амбулаторного больного</h2>
								<FORM action="add.php" method="POST">
										<p style="font-family: Century Gothic, Helvetica, Arial, sans-serif;font-size: 15px; background-color: white; padding: 5px; ">
										Личные данные:
								</p>
									<p><label for="login">Логин пациента</label><input type="text" placeholder="Введите логин" size="24" name="login" id="login" class="login" required></p>
									<p><label for="password">Пароль пациента</label><input type="text" placeholder="Введите пароль" size="24" name="password" id="password" class="password" required></br></p>
									<p><label for="name_pac">Имя пациента</label><input type="text" placeholder="Введите имя" pattern="[А-Яа-яЁё]{2,45}" size="24" name="name_pac" id="name_pac" class="name_pac" required></p>
									<p><label for="fname_pac">Фамилия пациента</label><input type="text" placeholder="Введите фамилию" pattern="[А-Яа-яЁё]{2,45}" size="24" name="fname_pac" id="fname_pac" class="fname_pac" required></p>
									<p><label for="otchname_pac">Отчество пациента</label><input type="text" placeholder="Введите отчество" pattern="[А-Яа-яЁё]{5,45}" size="24" name="otchname_pac" id="otchname_pac" class="otchname_pac" required></p>
									<p><label for="date_born">Дата рождения пациента </label><input type="date" placeholder="Введите дату рождения" size="24" name="date_born" id="date_born" class="date_born" required></p>
									<p><label for="tel">Телефон пациента </label><input type="text" placeholder="Введите номер телефона" size="24" data-mask="9999999999" name="tel" id="tel" class="tel" required></p>
									<p><label for="oms">ОМС пациента </label><input type="text" placeholder="Введите ОМС" pattern="[0-9]{16,16}"  data-mask="9999999999999999" size="24" name="oms" id="oms" class="oms" required></p>
									<p><label for="pol">Пол пациента </label><select  name="pol" id="pol" class="pol">
								<option disabled  selected="selected">Выберите пол</option>
									<option value="0">Женщина</option>
									<option value="1">Мужчина</option>
								</select></p>
								<p style="font-family: Century Gothic, Helvetica, Arial, sans-serif;font-size: 15px; background-color: white; padding: 5px; ">
										Адрес прописки:
								</p>
									<p><label for="street">Улица проживания</label><input type="text" placeholder="Улица" size="24" pattern="[А-Яа-яЁё]{2,45}" name="street" id="street" class="street" required></p>
									<p><label for="building">Дом проживания</label><input type="text" placeholder="Дом" size="24" name="building" pattern="[0-9]{1,3}" id="building" class="building" required></p>
									<p><label for="apart">Квартира проживания</label><input type="text" placeholder="Квартира" size="24" name="apart" pattern="[0-9]{1,4}" id="apart" class="apart" required></p>
<p style="font-family: Century Gothic, Helvetica, Arial, sans-serif;font-size: 15px; background-color: white; padding: 5px; "	>
										Дополнительно:
								</p>
									<p><label for="email">Электронная почта пациента</label><input type="email" placeholder="Электронный адрес" size="24" name="email" id="email" class="email" ></p>

					<button id="button_log" class="button_log" name="button_log" type="submit"> Добавить!</button>
					<?php 
			if($_SESSION['ERROR']=="ERROR"){
				echo("<p>Такой аккаунт уже есть</p>");
				$_SESSION['ERROR']="";
			}

							?>
							</FORM>
								<p>

								</p>
							</div>

						</main>

<?php include ($_SERVER['DOCUMENT_ROOT'].'/footer.php') ?>

		</div>
	</div>
	</body>
</html>