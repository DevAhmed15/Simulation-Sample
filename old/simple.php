<?php

$conn = mysql_connect("localhost", "root", "root");

if (!$conn) {
    echo "Unable to connect to DB: " . mysql_error();
    exit;
}

if (!mysql_select_db("simulation")) {
    echo "Unable to select user: " . mysql_error();
    exit;
}
if (isset($_POST['name'])) {
    

$n=$_POST['name'];

$sql = ("SELECT * FROM (
    SELECT * FROM records ORDER BY id DESC LIMIT $n
) sub
ORDER BY id ASC");
$result = mysql_query($sql);

if (!$result) {
    echo "<script> alert('No Data Iserted'); </script>";
    exit;
}

if ( $n > mysql_num_rows($result)) {
    echo "<script> alert('No Enough Data !!') </script>";
    exit;
}

$i = 0;
$sum=0;
 while($process = mysql_fetch_assoc($result)){
    $row[$i] = $process;
    $coast = $row[$i]['demand'];
    $sum=$sum+$coast;  
    

    $i++;
   
}
$forec=$sum/$n;
$addF="INSERT INTO forecast(value,type) VALUES ('$forec','1')";
mysql_query($addF);
echo "<script> alert('Simple Moving AVG is $forec'); </script>";

mysql_free_result($result);
}
?>

<body>
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
