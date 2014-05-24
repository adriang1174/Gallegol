<?php
							
							$errorDB = false;
							require 'db.php';
							if (mysqli_connect_errno()) {
							$errorDB = true;
							}
							$email              = mysqli_real_escape_string($link, utf8_decode($_REQUEST['email']));
							$name		 	    = mysqli_real_escape_string($link, utf8_decode($_REQUEST['name']));

							$sql = "insert into users (email,name)
									values('{$email}','{$name}')
									on duplicate key update name=values(name)";
							$res = mysqli_query($link,$sql);
							//error_log($sql);
							if(!$res)
								$errorDB = true;
							
							$sql="select bench.*
									from bench, users where users.email = '{$email}' and bench.userid = users.userid";	
							
							$res = mysqli_query($link,$sql);
							$rows = array();
							while($r = mysqli_fetch_assoc($res)) {
								$r['national_team'] = utf8_encode($r['national_team']);
								$rows[] = $r;
							}
							print '{"bench":'.json_encode($rows)."}";
?>