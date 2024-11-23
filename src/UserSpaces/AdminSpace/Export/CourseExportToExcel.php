<?php 
include "../../../../Backend/Connection/connection.php";
$q="select * from course order by CourseCode";
$statement=$PDO->prepare($q);
$statement->execute();
$out="<table border=1>";
$out.="<tr>";
$out.="<th>CourseCode</th>";
$out.="<th>Name</th>";
$out.="<th>Credits</th>";
$out.="<th>CodeD</th>";
$out.="<th>CodeSemester</th>";
$out.="<th>Year</th>";
$out.="</tr>";
while($result=$statement->fetch(PDO::FETCH_ASSOC)){
    $out.="<tr>";
    $out.="<th>".$result['CourseCode']."</th>";
    $out.="<th>".$result['Name']."</th>";
    $out.="<th>".$result['Credits']."</th>";
    $out.="<th>".$result['CodeD']."</th>";
    $out.="<th>".$result['CodeSemester']."</th>";
    $out.="<th>".$result['Year']."</th>";
    $out.="</tr>";
}
$out.="</table>";
header('content-type:application/xls');
header('content-Disposition:attachment;filename=Course-List.xls');
echo $out;
?>