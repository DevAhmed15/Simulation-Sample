<?php


$host="localhost";
$us="root";
$pass="root";
$db="simulation";

$con=mysql_connect($host,$us,$pass);
mysql_select_db($db);

/*$sql="SELECT * FROM records where year='2000'";
$query=mysql_query($sql);
while($row=mysql_fetch_array($query))
      {
          echo $row['month']." ";
}
$year=2000;
$number=2;
$month=3;
//$month=$month-1;
$sql = ("SELECT *
 FROM records 
 WHERE year='$year' AND month='$month' 
 ");
$result = mysql_query($sql);

$sql2 = ("SELECT * FROM (
    SELECT * FROM records 
    WHERE year='$year' AND month <= '$month'
    ORDER BY month DESC LIMIT $number
) sub
ORDER BY month ASC");
$result2 = mysql_query($sql2);

$i = 0;
$sum=0;

while($process=mysql_fetch_assoc($result))
{
$row1[$i]=mysql_fetch_assoc($result2);
    $coast = $row1[$i]['demand'];
    $sum=$sum+$coast;  
    

    $i++;
 }
 
 

echo $sum;*/
$sql=mysql_query("SELECT forecast FROM records where month='1' AND year='2015'");
$row=mysql_fetch_assoc($sql);
echo $row['forecast']+1545;
/*$year=2000;
$month=2;
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
$sql="UPDATE records SET forecast=8 WHERE year='$year' AND month= '$month'";
mysql_query($sql);
        echo "yes";
    }
}*/
/*$i=1;
$j=1;
$year=2000;
$total=0;
$month=2;

$sql2 = ("SELECT * FROM (
    SELECT * FROM records 
    WHERE year='$year' AND month <= '$month'
    ORDER BY month DESC
) sub
ORDER BY month ASC");
$result2 = mysql_query($sql2);
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
echo $total;*/
?>
<!--<body>
<div><button><a href="#">  GO Back </a></button>
</div>
    <style>
    body{
     background-color:#d7adad;   
    }
        div{
       text-align:center;
            margin-top:50px;
           
        }
button{
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
   a,div:hover
        {
            cursor:pointer;
        }
    
</style>
</body>-->