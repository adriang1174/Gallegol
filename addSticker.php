<?php
							
							$errorDB = false;
							require 'db.php';
							if (mysqli_connect_errno()) {
							$errorDB = true;
							}
							$email              = mysqli_real_escape_string($link, utf8_decode($_REQUEST['email']));
							$national_team 	    = mysqli_real_escape_string($link, utf8_decode($_REQUEST['national_team']));
							$rank			    = mysqli_real_escape_string($link, $_REQUEST['rank']);


							$sql = "insert into bench
									select userid, '{$national_team}' as national_team, {$rank} as rank, 'N' as forecast
									from users where email = '{$email}'
									on duplicate key update rank=values(rank)";
							$res = mysqli_query($link,$sql);
							if(!$res)
								$errorDB = true;
							
							$sql="select bench.*
									from bench, users where users.email = '{$email}' and bench.userid = users.userid";	
							
							$res = mysqli_query($link,$sql);
							//var_dump($res);
							$rows = array();
							while($r = mysqli_fetch_assoc($res)) {
								$r['national_team'] = utf8_encode($r['national_team']);
								$rows[] = $r;
							}
							print '{"bench":'.json_encode($rows)."}";
?>