<?php include "./head.php"; include "adm_cfg.php"; ?>
<h1>Tekk <span class="glyphicon glyphicon-comment"></span></h1>
<p>Admin form.</p>
<form action=adm.php method=POST>
<input type=text name=m placeholder="HyperID"><br>
<input type=text name=key placeholder="Admin password"><br>
<input type=submit name=submit value=submit>
</form>

<?php
if( isset( $_POST['submit'] ) ){
if(isset( $_POST['key'] ) and isset( $_POST['m'] )){
$k = $_POST['key'];
$m = $_POST['m'];

if( $k == $admin["pass"] ){
echo "<p class='alert alert-success'><b>Success!</b></p>"
file_put_contents("./r/".$m."/vip.d","");
} else {
cool_die("Invalid admin password!");
}
} else {
cool_die("Bad request.");
}
}