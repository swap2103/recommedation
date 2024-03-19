<?php
if(file_exists("itemfile.txt")){
$items=file_get_contents("itemfile.txt");
$s_price=file_get_contents("pricefile.txt");

$menu=unserialize($items);
$price=unserialize($s_price);

$i=0;
echo "<table border='2'>";
while($i < count($menu)){
    echo "<tr>";
    echo "<td>".$menu[$i]."</td>";
    echo "<td>".$price[$i]."</td>";
    echo "</tr>";
    $i=$i+1;
}
echo "</table>";
}
?>