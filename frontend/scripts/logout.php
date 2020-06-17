<?php 
    include_once ("conexao");    


    session_start ();
	  session_destroy ();
    header ( "Location: ../index.php" );
?>