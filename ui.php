<?php
include "head.php";

if( !isset($_COOKIE["fcook"]) ){
cool_die("Sign-in or sign-up before.");
}

$id = $_COOKIE["fcook"];

if( !file_exists("r/$id/person.d") ){
cool_die("Try to access from non exists account.");
}

if(file_exists("r/$id/vip.d") and $_SERVER["REMOTE_ADDR"] != file_get_contents("r/$id/ip.d")){
	cool_die("Your current ip not equals your ip on sign-uping. It's disallowed for vip users. Maybe you need update your ip.");
}

if( isset( $_POST['submit'] ) && isset( $_POST['m'] ) && !empty( $_POST['m'] ) ){ 
if( !file_exists("r/$id/vip.d") ){
	$msg = strip_tags($_POST['m']);
	if(strlen($msg) > 100){
		cool_die("Max size of message is 100 chars! (for vip's = 500)");
	}
} else {
	$msg = strip_tags($_POST['m'],"<b><br><i><a>");
	if(strlen($msg) > 500){
		cool_die("Max size of message is 500 chars!");
	}
}

$i = file_get_contents("r/$id/person.d");

$msg = str_replace(":)","<img alt=':)' src=smiles/0.png>",$msg);
$msg = str_replace(":D","<img alt=':D' src=smiles/1.png>",$msg);
$msg = str_replace(";)","<img alt=';)' src=smiles/2.png>",$msg);
$msg = str_replace("XD","<img alt='XD' src=smiles/3.png>",$msg);
$msg = str_replace(":|","<img alt=':|' src=smiles/15.png>",$msg);
$msg = str_replace("D:","<img alt='D:' src=smiles/14.png>",$msg);
$msg = str_replace(":(","<img alt=':(' src=smiles/8.png>",$msg);
$msg = str_replace(":C","<img alt=':C' src=smiles/13.png>",$msg);
$msg = str_replace(";(","<img alt=';(' src=smiles/11.png>",$msg);
$msg = str_replace(":love:","<img alt=':love:' src=smiles/6.png>",$msg);
$msg = str_replace(":heart:","<img alt=':heart:' src=smiles/24.png>",$msg);
$msg = str_replace(":cia:","<img alt=':cia:' src=smiles/7.png>",$msg);
$msg = str_replace("-_-","<img alt='-_-' src=smiles/48.png>",$msg);
$msg = str_replace(":like:","<img alt=':like:' src=smiles/59.png>",$msg);
$msg = str_replace(":dislike:","<img alt=':dislike:' src=smiles/60.png>",$msg);
$msg = str_replace(":0","<img alt=':0' src=smiles/50.png>",$msg);
$msg = str_replace(":\\","<img alt=':\\' src=smiles/26.png>",$msg);
$msg = str_replace(":/","<img alt=':/' src=smiles/26.png>",$msg);
$msg = str_replace("<:0","<img alt='<:0' src=smiles/27.png>",$msg);
$msg = preg_replace('/@(\\w+)/','<a target=_blank href=user.php?u=$1>$0</a>',$msg);

if(!file_exists("r/$id/vip.d")){
$a2=fopen("c/ch.d","r");
$text=fread($a2,filesize("c/ch.d"));
fclose($a2);

$what="[".date("H:i:s")."] <a target=_blank href=user.php?u=".$i.">".$i."</a>: ".$msg."<br>\n";
$f=fopen("c/ch.d","w");
fwrite($f,$what.$text);
fclose($f);
} else {
file_put_contents("c/ch.d",$new,FILE_APPEND);

$a2=fopen("c/ch.d","r");
$text=fread($a2,filesize("c/ch.d"));
fclose($a2);

$what="[".date("H:i:s")."] <a target=_blank href=user.php?u=".$i."><font color=DarkGoldenRod>".$i."</font> (<b>VIP</b>)</a>: ".$msg."</a></i></b><br>\n";
$f=fopen("c/ch.d","w");
fwrite($f,$what.$text);
fclose($f);
}
header("Location: ui.php");
}
?>
<h1>Tekk <span class="glyphicon glyphicon-comment"></span></h1>
<p>Chating room!</p>
<a target=_blank href="user.php?u=<?php $id = $_COOKIE["fcook"]; $i = file_get_contents("r/$id/person.d"); echo htmlspecialchars($i); ?>" class="btn btn-primary"><span class="glyphicon glyphicon-user"></span> <?php $id = $_COOKIE["fcook"]; $i = file_get_contents("r/$id/person.d"); echo htmlspecialchars($i); ?></a> | <a class="btn btn-warning" href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a> | <a class="btn btn-danger" href="exit.php"><span class="glyphicon glyphicon-off"></span> Exit</a><br><hr>

<iframe id="text" frameBorder="0" height="300" width="500" src="ui_frame.php" marginheight="20" hspace="20">Sorry, your browser is unsupported.</iframe><br><br>

<form action=ui.php method=POST>
<div class="row">
<div class="col-lg-6">
<div class="input-group">
<span class="input-group-addon" id="sizing-addon2">Your Message <span class="glyphicon glyphicon-chevron-right"></span></span>
<input aria-describedby="sizing-addon2" class="form-control" type=text name=m>
<span class="input-group-btn">
<button class="btn btn-success" name=submit id=submit>Send! <span class="glyphicon glyphicon-send"></span></button>
</span>
</div>
</div>
</div>
</form>
<p>Max size of message is <b><?php if(!file_exists("r/$id/vip.d")){echo "100";}else{echo "500";} ?></b> chars.</p>

<script>
setInterval(function(){
	document.getElementById('text').src = document.getElementById('text').src;
}, 7000);
</script>
