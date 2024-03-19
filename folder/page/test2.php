<?php
include("connection.php");

		$rating=0;
		$query="UPDATE laari_rating SET rating=:rating";
		$pdo_stament=$con->prepare($query);
		$pdo_stament->execute(array(":rating"=>$rating));

?>
