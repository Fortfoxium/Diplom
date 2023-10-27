
<header>
				<a href="http://websiteofpoliklinika/index.php"><img src='http://websiteofpoliklinika/img/Logo.png' height="70" width="70" id="Logo"></a>
				<p id="title" name="title">
				ГБУЗ поликлиника №2	города Калининграда
				</p>
				<div id="ForUsers" name="ForUsers">
					<?php
						$log=$_SESSION['login'];
						$result=mysqli_query($DB, 'SELECT login FROM user WHERE login="'.$log.'"');
						$user=mysqli_fetch_assoc($result);
						if (!empty($user['login']) and $user['login']!=="Admin"  ){?>
						<font face='Century Gothic, Arial'><a href="http://<?php echo($_SERVER["SERVER_NAME"]) ?>/exit.php" onclick="return confirm('Вы уверены что хотите выйти?');">Выход </a>| <a href='http://<?php echo($_SERVER["SERVER_NAME"]) ?>/Account/account.php'> Личный кабинет </a></font>
						<?php } else { ?>
						<font face='Century Gothic, Arial'> <a href='#zatemnenie_log'> Вход </a></font>
						<?php }; ?>
					|<font face='Century Gothic, Arial'><a href="http://<?php echo($_SERVER["SERVER_NAME"]) ?>/For_Pacients/help.php"> Помощь </a></font>
				</div>

						<ul id="navbar">
							<?php
								if($_SESSION['role']=="User")
								{
									echo "<a href='http://".$_SERVER["SERVER_NAME"]."/For_Pacients/zap.php'><li>Запись к врачу</li></a>";
								};
								if($_SESSION['role']=="Registrator")
								{

									echo "<a href='http://".$_SERVER["SERVER_NAME"]."/For_workers/lists_pacients.php'><li> <img src='http://websiteofpoliklinika/img/icon_list.png' width='19' height='19'> Списки пациентов</li></a>";
									echo "<a href='http://".$_SERVER["SERVER_NAME"]."/For_workers/raspisanie.php'><li> <img src='http://websiteofpoliklinika/img/icon_timesheet.png' width='19' height='19'> Расписание</li></a>";
									echo "<a href='http://".$_SERVER["SERVER_NAME"]."/For_Pacients/zap.php'><li> <img src='http://websiteofpoliklinika/img/icon_doctor_doc.png' width='19' height='19'> Запись к врачу</li></a>";
									echo "<a href='http://".$_SERVER["SERVER_NAME"]."/For_workers/ambulotor.php'><li> <img src='http://websiteofpoliklinika/img/icon_add.png' width='19' height='19'> Добавить амбулаторного больного</li></a>";
									echo "<a href='http://".$_SERVER["SERVER_NAME"]."/For_workers/delete.php'><li> <img src='http://websiteofpoliklinika/img/icon_delete.png' width='19' height='19'> Удалить запись к врачу</li></a>";
								};
								if($_SESSION['role']=="User" || empty($_SESSION['role']))
								{
									echo '
									<a href="http://'.$_SERVER["SERVER_NAME"].'/index.php#infa" ><li>Об учреждении</li></a>
									<a href="http://'.$_SERVER["SERVER_NAME"].'/index.php#table" ><li>Пациентам</li></a>';
								};
							?>
						</ul>
						</header>