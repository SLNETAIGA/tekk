<?php include "head.php"; ?>
<h1>Tekk <span class="glyphicon glyphicon-comment"></span></h1>
<p>Sign-in auto form.</p>
<?php

if( isset( $_GET['id'] ) ){
$id = $_GET['id'];
if( empty($id) ){
cool_die("Bad request!");
}

if( !file_exists("r/".$id."/person.d") ){
cool_die("Account not exists.");
} 

if( setcookie("fcook",$id,time()+86400) ){
header("Location: ui.php");
} else {
cool_die("Unable to create auth cookie.");
}

} else {
cool_die("Bad request!");
}