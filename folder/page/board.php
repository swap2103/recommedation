<?php
  //if(isset($_POST['submit'])){
//$str1=$_POST['user'];
//$tokens=explode(' ',$str1);
//$i=0;
//while($i!=count($tokens)){
//if(preg_match("/([a-z]*\.[com|html|php])/",$tokens[$i])){
  //  echo "<a href=".$tokens[$i].">".$tokens[$i]."</a>";/
//}
//else{
//    echo $tokens[$i];
//    echo "&nbsp";
//}
//$i=$i+1;
//}
//}
//"/^([a-z]*\.(com|html|php))$/"    //url with spaces!!!!
#$name="swap";
#echo "input type='button' onclick=f2($name) value='button'>";
//$str=shell_exec('python C:\\xampp\\htdocs\\laari\\Test_Samples\\page\\set_add_data.py');
//echo $str;
//$address="Sai krupa Fast food,panvadi,Gujarat,394650";
//file_put_contents("address.txt",$address);

// Please specify your Mail Server - Example: mail.yourdomain.com.
//ini_set("SMTP","smtp.gmail.com");

// Please specify an SMTP Number 25 and 8889 are valid SMTP Ports.//
//ini_set("smtp_port","587");

// Please specify the return address to use
//ini_set('sendmail_from', 'projectmy17@gmail.com');


//mail("projectmy17@gmail.com","BC","mane gusso ave che"); 
// include "connection.php";
// session_start();
// $c1="vegetarian";
// $c2="snacks";
// $c3="desert";

// $stmt = $con->prepare("UPDATE laari_info SET cat_1=? , cat_2=? , cat3=? where laari_owner_id=?");
// $stmt->execute([$c1,$c2,$c3,$_SESSION["laari_owner_id"]]);


?>

<html>
<body>
</body>
<script>
var reg=/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/;
email="swapnilpatel@gmail.com";
if(reg.test(email)){
echo "valid";
}
else{
  echo "not valid";
}
</script>
</html>
