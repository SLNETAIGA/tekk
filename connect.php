<?php include "head.php"; ?>
<h1>Tekk <span class="glyphicon glyphicon-comment"></span></h1>
<p>Sign-in form.</p>
<form action=connect.php method=POST>
<div class="row">
<div class="col-lg-6">
<div class="input-group">
  <span class="input-group-addon" id="sizing-addon2">HyperID</span>
  <input aria-describedby="sizing-addon2" class="form-control" type=text name=id placeholder="Your HyperID">
<span class="input-group-btn">
<input type=submit class="btn btn-success" name=submit value="Sign-in!">
</span>
</div>
</div>
</div>
</form>
<a class="btn btn-warning" href="index.php">Don't have account? Sign-up! <span class="glyphicon glyphicon-flash"></span></a>

<?php

if( isset( $_POST['submit'] ) ){
$id = $_POST['id'];
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

}