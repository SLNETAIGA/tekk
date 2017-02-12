<?php
include "head.php";

if( !isset($_COOKIE["fcook"]) ){
cool_die("Sign-in or sign-up before.");
}

$id = $_COOKIE["fcook"];

if( !file_exists("r/$id/person.d") ){
cool_die("Try to access from non exists account.");
}


?>
Tekk Chat <span class="glyphicon glyphicon-comment"></span><br><br>
<?php echo file_get_contents("c/ch.d"); ?>