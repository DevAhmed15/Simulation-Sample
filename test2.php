<?

$host="localhost";
$us="root";
$pass="root";
$db="simulation";

$con=mysql_connect($host,$us,$pass);
mysql_select_db($db);

/*$number=2;
$month=6;
$year=2000;
$sql2 = ("SELECT * FROM (
    SELECT * FROM records 
    WHERE year='$year' AND month < '$month'
    ORDER BY month DESC LIMIT $number
) sub
ORDER BY month ASC");
$result2 = mysql_query($sql2);
$i=0;
$sum=0;
while($row2=mysql_fetch_assoc($result2))
{
    $row[$i] = $row2;
    $coast=$row[$i]['demand'];
   $sum=$sum+$coast;
   $i++;

}
echo $sum;
$number;*/
$number=4;
$month=4;
$year=2000;
$sql = ("SELECT * FROM (
    SELECT * FROM records 
    WHERE year='$year' AND month < '$month'
    ORDER BY month DESC LIMIT $number
) sub
ORDER BY month DESC");
$result = mysql_query($sql);
while ($process= mysql_fetch_assoc($result)) {
echo $process['demand']."<br />";
}

//----------------------------------
/*$year=2000;
$month=1;
$number=1;
$sql= ("SELECT * FROM (
    SELECT * FROM records 
    WHERE year='$year' AND month= '$month'
    ORDER BY month DESC LIMIT $number
) sub
ORDER BY month ASC");
$result2 = mysql_query($sql);
while($row2=mysql_fetch_assoc($result2))
{
if( $row2['forecast']!= NULL){
    //echo "<br />--<br />";
    echo "Yes";
}*/

?>