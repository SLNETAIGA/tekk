<?php
include "head.php";

if( !isset($_POST['u']) ){
cool_die('Bad request!');
}

$person = $_POST['u'];
if(!preg_match("#^[aA-zZ0-9\-_]+$#",$person)){
	cool_die("Unallowed charsets in nick!");
}

if( empty($person) ){
cool_die('Bad request!');
}

if( strlen($person) > 10 ){
cool_die("Max length of nickname is 10 chars.");
}

$id = gen_hid($person);


if( file_exists("r/$id/person.d") ){
cool_die("This account already exists.");
}

mkdir("r/$id");
$fp = fopen("r/$id/person.d", "w");
 
fwrite($fp, strip_tags($person));
 
fclose($fp);

$fp = fopen("r/$id/date.d", "w");
 
fwrite($fp, date("H:i:s"));
 
fclose($fp);

$fp = fopen("r/$id/ip.d", "w");
 
fwrite($fp, $_SERVER["REMOTE_ADDR"]);
 
fclose($fp);

?> <h1>Tekk <span class="glyphicon glyphicon-comment"></span></h1>
<p>Chating room!</p>
<div class="alert alert-success"> <?php
echo "<b>Success! <span class='glyphicon glyphicon-ok-sign'></span></b><br>";
echo "Your HyperID: ";
echo $id;
echo "<br>Go <a href=connect.php>here</a>, type your HyperID and you will be entered to Tekk. Or go <a href=auto_connect.php?id=".$id.">here</a> and access into chat.<br><b>Warning!</b> Save your HyperID! Without HyperID you can't get access to your account!";
?> </div>