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

$sql = ("SELECT * FROM (
    SELECT * FROM records 
    WHERE year='$year' AND month < '$month'
    ORDER BY month DESC LIMIT $number
) sub
ORDER BY month ASC");
$result = mysql_query($sql);

if (!$result) {
echo "<script> alert('!Not Enough Data'); </script>";
    exit;
}
if ( $number > mysql_num_rows($result)) {
    echo "<script> alert('Not Enough Data !!') </script>";
    exit;
}

}
$i = 0;
$sum=0;
 while($process = mysql_fetch_assoc($result)){
    $row[$i] = $process;
    $coast = $row[$i]['demand'];
    $sum=$sum+$coast;  
    

    $i++;
   
}
$forec=$sum/$number;

echo "<script> alert('Simple Moving AVG is $forec'); </script>";

mysql_free_result($result);
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


?>

<body>
    <div> <h1> Simple Moving Average is <?php echo $forec; ?></h1></div>
<div><a href="forecast.html">  GO Back </a>
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
