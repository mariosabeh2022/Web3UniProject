<?php 
include "../../../../Backend/Connection/connection.php";
$q="select * from doctor order by IDD";
$statement=$PDO->prepare($q);
$statement->execute();
$out="<table border=1>";
$out.="<tr>";
$out.="<th>IDD</th>";
$out.="<th>Firstname</th>";
$out.="<th>Middlename</th>";
$out.="<th>Lastname</th>";
$out.="<th>Username</th>";
$out.="<th>Email</th>";
$out.="</tr>";
while($result=$statement->fetch(PDO::FETCH_ASSOC)){
    $out.="<tr>";
    $out.="<th>".$result['IDD']."</th>";
    $out.="<th>".$result['FirstName']."</th>";
    $out.="<th>".$result['MiddleName']."</th>";
    $out.="<th>".$result['LastName']."</th>";
    $out.="<th>".$result['Username']."</th>";
    $out.="<th>".$result['Email']."</th>";
    $out.="</tr>";
}
$out.="</table>";
header('content-type:application/xls');
header('content-Disposition:attachment;filename=Doctor-List.xls');
echo $out;
?>