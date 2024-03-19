<?php
//RECOMMENDED

$cnt=(int)exec('python C:\xampp\htdocs\laari\Test_Samples\page\test_recomm_count_tokens.py');
if($cnt>3){
    $out_str=exec('python C:\xampp\htdocs\laari\Test_Samples\page\test_recomm_products.py');
    
    //file_put_contents("name.txt",$name['first_name']);
    $name=file_get_contents("name.txt");
    $rec_data=file_get_contents("user_corpuses/".$name."_recommend.json");
    $rec=(array)json_decode($rec_data,true);    
    $con=mysqli_connect("localhost","root","","project");
    if($con){
    $qry="select * from laari_info";
    $res=mysqli_query($con,$qry);
    echo "<h1 class='margin-bottom'>Recommended Laaries</h1>";
    while($row=mysqli_fetch_array($res)){
    $rec_loop=0;
    $tag_loop=0;
    $match_flag=0;
    $tags=unserialize($row[7]);
    while($rec_loop!=count($rec)){
        $tag_loop=0;
        //echo $row[1]."-".$rec[$rec_loop];
        //echo "<br>";
        if($rec[$rec_loop]==strtolower($row[1])){
            $match_flag=1;
        }
        while($tag_loop!=count($tags)){
            //echo "<br>";
            //echo $tags[$tag_loop]."-".$rec[$rec_loop];
            //echo "<br>";
            if(strtolower($tags[$tag_loop])==$rec[$rec_loop]){
                $match_flag=1;
            }
            $tag_loop=$tag_loop+1;
            }
        $rec_loop=$rec_loop+1;
        }
        if($match_flag==1){
            $qry="select * from laari_info";
            $res=mysqli_query($con,$qry);
            while($row=mysqli_fetch_array($res)){
            echo "<div class='s-12 m-12 l-4 xl-3 xxl-3'>";
            
   $image_path="laari_pic/laari_profile/".$row[9];
   //echo "<a href='laari/".$row[0]." target='_blank'>"."<img  src='$image_path' height=200 width=500>"."</a>";
   
echo "<a href='laari/".$row[0]."'>"."<img src='$image_path' height=200 width=200>"."</a>";
            echo "<h3>".$row[1]."</h3>";
            $arr=unserialize($row[7]);
            //$str=implode(',',$arr);
             $str=$row[4];
    if($row[5]!="choose option")
    {
      $str=$str.",".$row[5];
    }
    if($row[6]!="choose option")
    {
      $str[6]=$str.",".$row[6];
    }
   echo "<h5>$str</h5>";
            echo "<form class='customform s-12 margin-bottom2x' action=''>";
            echo "</form>";
            echo "</div>";
        }
      }
    }
}

    else{
    //Connection failed
    }
}
else{
//NOT READY FOR RECOMMENDATIONS YET    
}
?>