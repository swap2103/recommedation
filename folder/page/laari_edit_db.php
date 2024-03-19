<?php 
include("connection.php");
session_start();

$lno=$fname=$lname=$laariname=$email=$pno=NULL;

$fname=strtolower($_POST['first_name']);
$lname=strtolower($_POST['last_name']);


$laariname=strtolower($_POST['laari_name']);

$email=$_POST['email'];
$pno=strtolower($_POST['phone']);

$query="UPDATE laari_owner SET fname=:fname , lname=:lname , pno=:pno , email=:email WHERE id=:id";
$pdo_stmt=$con->prepare($query);
$pdo_stmt->execute(array(":fname"=>$fname,":lname"=>$lname,":pno"=>$pno,":email"=>$email,":id"=>$_SESSION['laari_owner_id']));


$query="UPDATE laari_info SET laari_name=:laari_name WHERE id=:id";
$pdo_stmt=$con->prepare($query);
$pdo_stmt->execute(array(":laari_name"=>$laariname,":id"=>$_SESSION['laari_owner_id']));


if($pdo_stmt->rowCount()>0)
{
	header("Location:profile.php");
}



?>