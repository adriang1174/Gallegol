<?php
							
							$errorDB = false;
							$link = mysqli_connect('localhost', 'uv9032', 'graphica*123','uv9032_gallegol');
							if (mysqli_connect_errno()) {
							$errorDB = true;
							}
							$email              = mysqli_real_escape_string($link, utf8_decode($_REQUEST['email']));
							$rank1			    = mysqli_real_escape_string($link, utf8_decode($_REQUEST['rank1']));
							$rank2			    = mysqli_real_escape_string($link, utf8_decode($_REQUEST['rank2']));
							$rank3			    = mysqli_real_escape_string($link, utf8_decode($_REQUEST['rank3']));
							$rank4			    = mysqli_real_escape_string($link, utf8_decode($_REQUEST['rank4']));
							$rank5			    = mysqli_real_escape_string($link, utf8_decode($_REQUEST['rank5']));	
							$rank6			    = mysqli_real_escape_string($link, utf8_decode($_REQUEST['rank6']));
							$rank7			    = mysqli_real_escape_string($link, utf8_decode($_REQUEST['rank7']));
							$rank8			    = mysqli_real_escape_string($link, utf8_decode($_REQUEST['rank8']));																																									
	
							//Borramos forecast viejo
							$sql = "update bench b inner join users u on(b.userid = u.userid)
									set b.forecast = 'N'
									where u.email = '{$email}'
									";
							$res = mysqli_query($link,$sql);
							
							$sql = "update bench b inner join users u on(b.userid = u.userid)
									set b.forecast = 'Y'
									where u.email = '{$email}'
									and ( 
									(b.national_team = '{$rank1}' and b.rank = 1) or
									(b.national_team = '{$rank2}' and b.rank = 2) or
									(b.national_team = '{$rank3}' and b.rank = 3) or
									(b.national_team = '{$rank4}' and b.rank = 4) or									
									(b.national_team = '{$rank5}' and b.rank = 5) or
									(b.national_team = '{$rank6}' and b.rank = 6) or
									(b.national_team = '{$rank7}' and b.rank = 7) or
									(b.national_team = '{$rank8}' and b.rank = 8) 
									)																										
									";
							$res = mysqli_query($link,$sql);
							error_log($sql);
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