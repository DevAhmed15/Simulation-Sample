<?php

$conn = mysql_connect("localhost", "root", "");

if (!$conn) {
    echo "Unable to connect to DB: " . mysql_error();
    exit;
}

if (!mysql_select_db("simulation")) {
    echo "Unable to select user: " . mysql_error();
    exit;
}
if (isset($_POST['mon']) && isset($_POST['num']) && isset($_POST['year'])) {
    
$year=$_POST['year'];
$month=$_POST['mon'];
$number=$_POST['num'];
    if( empty($number) || empty($month) || empty($year) ){
     echo "<script> alert('Insert All Data') </script>";
        exit;
    }
        if($number>=$month)
    {
     echo "<script> alert('Wrong !! Enter Valid Numbers' ) </script>";
        exit;   
    }
$sql1 = ("SELECT * FROM (
    SELECT * FROM weights ORDER BY id DESC LIMIT $number
) sub
ORDER BY id DESC");
$result1 = mysql_query($sql1);


if ( $number > mysql_num_rows($result1)) {
    echo "<script> alert(' Error No rows found, nothing to print so am exiting') </script>";
    exit;
}

$x=0;
$sum1=0;
 while($process1 = mysql_fetch_assoc($result1)){
    $row1[$x] = $process1;
    $value = $row1[$x]['value'];
    $sum1=$sum1+$value;
}   

$sql = ("SELECT * FROM (
    SELECT * FROM records 
    WHERE year='$year' AND month < '$month'
    ORDER BY month DESC LIMIT $number
) sub
ORDER BY month ASC");
$result = mysql_query($sql);


if ( $number > mysql_num_rows($result)) {
    echo " Error No rows found, nothing to print so am exiting";
    exit;
}

$sql2 = ("SELECT * FROM (
    SELECT * FROM weights ORDER BY id DESC LIMIT $number
) sub
ORDER BY id ASC");
$result2 = mysql_query($sql2);


if ( $number > mysql_num_rows($result2)) {
echo "<script> alert('Error No rows found, nothing to print so am exiting'); </script>";
    exit;
}
$i=0;
$sum=0;
while ($process= mysql_fetch_assoc($result)) {

    $row2[$i]=mysql_fetch_assoc($result2);
    $Myval=$row2[$i]['value'];
    $row[$i]=$process;
    $coast = $row[$i]['demand'];
    $sum=$sum+($Myval*$coast);
    $i++;
}

$forec=$sum/$sum1;
echo "<script> alert('Result is $forec'); </script>";
    $sqll= ("SELECT * FROM (
    SELECT * FROM records 
    WHERE year='$year' AND month= '$month'
    ORDER BY month DESC LIMIT 1
) sub
ORDER BY month ASC");
$resultt = mysql_query($sqll);
while($roww=mysql_fetch_assoc($resultt))
{
    if($roww['forecast']==NULL){
$upF="UPDATE records SET forecast='$forec' WHERE year='$year' AND month= '$month'";
mysql_query($upF);
}
}
}
if($forec)
{
 $sqql="DELETE * FROM weights";
    mysql_query($sqql);
}



?>
<body>
        <div> <h1> Weighted Moving Average is <?php echo $forec ;?></h1></div>
<div><a href="forecast2.html">  GO Back </a>
</div>
    <style>
    body{
     background-color:#d7adad;   
    }
        div{
  margin-left: 250px;
text-align: center;
            margin-top:50px;
background-color: #638cb2;
width: 800px;
height: 300px;
    box-shadow:10px 10px 10px 10px;
    border-radius:30px;
           
        }
a{
    text-decoration: none;
    color: white;
    font-size: 150px;
}
   a:hover
        {
            cursor:pointer;
        }
    
</style>
</body>