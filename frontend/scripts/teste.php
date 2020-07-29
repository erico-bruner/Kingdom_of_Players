<?php 
 $id_user = filter_input(INPUT_POST, 'id_user', FILTER_SANITIZE_STRING);
 echo $id_user;