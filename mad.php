<?php


$host="localhost";
$us="root";
$pass="";
$db="simulation";

$con=mysql_connect($host,$us,$pass);
mysql_select_db($db);


if (isset($_POST['mon']) && isset($_POST['year'])) {
    
$year=$_POST['year'];
$month=$_POST['mon'];
    if(empty($month) || empty($year) ){
     echo "<script> alert('Insert All Data') </script>";
        exit;
    }
$sql2 = ("SELECT * FROM (
    SELECT * FROM records 
    WHERE year='$year' AND month <= '$month'
    ORDER BY month DESC
) sub
ORDER BY month ASC");
$result2 = mysql_query($sql2);
$i=1;
$j=1;
$total=0;
    
while($row=mysql_fetch_array($result2))
{
  $process[$i]=$row;
    
    if($process[$i]['demand']==NULL)
        $process[$i]['demand']=0;
    
     if($process[$i]['forecast']==NULL)
        $process[$i]['forecast']=0;
    
$dem = $process[$i]['demand'];
 $forc =$process[$i]['forecast'];
    $min=$dem - $forc ;
   $total+=$min;    
 $i++;

}
$total=$total/$month;
echo "<script> alert('MAD is $total'); </script>";
}
?>

<body>
    <div> <h1> MAD is <?php echo $total; ?></h1></div>
<div><a href="forecast4.html">  GO Back </a>
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
