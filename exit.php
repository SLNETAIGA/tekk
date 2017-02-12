<?php
include "head.php";

if( setcookie ("fcook", "", 1) ){
	echo "<div class='alert alert-success'>Success!</div>";
	header("Location: index.php");
} else {
	cool_die("Unable to exit. Unknown error.");
}