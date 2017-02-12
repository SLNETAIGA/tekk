<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<style>
html {
	padding: 10px;
	margin: auto;
	width: 95%;
}
#text {
	border: 1px solid Silver;
	border-radius: 15px;
	width: 100%;
}
</style>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tekk</title>
<?php
function cool_die($m){
	die("<div class='alert alert-danger'><b>Error! <span class='glyphicon glyphicon-remove-sign'></span></b> $m</div>");
}
// Production
//error_reporting(E_WARNING | E_ERROR | E_PARSE);
// Debug
error_reporting(E_ALL);

date_default_timezone_set("Europe/Moscow");

$bans = array();
if(isset($bans[$_SERVER["REMOTE_ADDR"]])){
	cool_die("We're very sorry, but your ip is banned.");
}

// Change algorithm to your own for security.
function gen_hid($person){
	return sha1(md5(base64_encode($person).sha1($person)));
}