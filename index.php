<?php include "head.php"; ?>
<h1>Tekk <span class="glyphicon glyphicon-comment"></span></h1>
<p>A simple chating service.</p>

<form action=reg.php method=POST>
<div class="row">
<div class="col-lg-6">
<div class="input-group">
<span class="input-group-addon" id="sizing-addon2">Your nickname</span>
<input class="form-control" type=text name=u placeholder="Just your nickname!"><br>
<span class="input-group-btn">
<input type=submit class="btn btn-success" value="Sign-up!" name=submit>
</span>
</div>
</div>
</div>
</form>
<p>Allowed charsets in nick is <b>A-Z</b>,<b>0-9</b>,<b>-</b> and <b>_</b></p>

<a class="btn btn-warning" href="connect.php">Have an account? Sign-in! <span class="glyphicon glyphicon-log-in"></span></a>
<a class="btn btn-success" href="ui.php">Already signed-in? Go to chat! <span class="glyphicon glyphicon-share-alt"></span></a>
<a class="btn btn-primary" href="https://github.com/SLNETAIGA/tekk">Visit the GitHub repository of Tekk!</span></a> 