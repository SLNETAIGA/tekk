<?php
include "head.php";
if( !isset( $_REQUEST['u'] ) ){
	cool_die("Bad request.");
}

$person = $_REQUEST['u'];
if( empty($person) ){
cool_die('Bad request!');
}

$id = gen_hid($person);
if( !file_exists("r/$id/person.d") ){
cool_die('You try to access non existing account.');
}

$regdate = file_get_contents("r/$id/date.d");
$ip = file_get_contents("r/$id/ip.d");
$vip = "no";
if( file_exists("r/$id/vip.d") ){
$vip = "<font color=gold>yes</font>";
}
?>
<h1>Tekk <span class="glyphicon glyphicon-comment"></span></h1>
<p>User <?php echo htmlspecialchars($person); ?> info.</p><hr>
<?php
echo "Login: ".htmlspecialchars($person)."<br>";
echo "Reg date: ".$regdate."<br>";
if($vip == "no"){
	echo "IP: ".$ip."<br>";
}
echo "VIP: ".$vip."<br>";
?>
<br><a class="btn btn-warning" href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a> | <a class="btn btn-success" onclick="window.close()"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>