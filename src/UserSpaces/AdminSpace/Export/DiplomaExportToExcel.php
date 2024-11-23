<?php 
include "../../../../Backend/Connection/connection.php";
$q="select * from diploma";
$statement=$PDO->prepare($q);
$statement->execute();
$out="<table border=1>";
$out.="<tr>";
$out.="<th>CodeD</th>";
$out.="<th>Name</th>";
$out.="</tr>";
while($result=$statement->fetch(PDO::FETCH_ASSOC)){
    $out.="<tr>";
    $out.="<th>".$result['CodeD']."</th>";
    $out.="<th>".$result['Name']."</th>";
    $out.="</tr>";
}
$out.="</table>";
header('content-type:application/xls');
header('content-Disposition:attachment;filename=Diploma-List.xls');
echo $out;
?>