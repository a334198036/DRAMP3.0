<?php
	#session.save_handler  = files 
	#session.save_path     = /tmp
	#session.use_cookies        = 1
	#session.name               = PHPSESSID
	#session.cookie_path        = /tmp
 	
	session_save_path('/tmp/172.22.220.30');
	session_start();
	$_SESSION['page_visited_already'] = "ccl"; 
	#echo  $_SESSION['page_visited_already'];
	




?>
