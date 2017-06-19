<?

$conn = mysql_connect("localhost", "root", "");

if (!$conn) {
    echo "Unable to connect to DB: " . mysql_error();
    exit;
}

if (!mysql_select_db("simulation")) {
    echo "Unable to select user: " . mysql_error();
    exit;
}
 if($_POST['submit'])
 {    
$year=$_POST['year'];
$month=$_POST['mon'];
$alpha=$_POST['alpha'];
     
     if($alpha > 1 && $alpha < 0)
     {
echo "<script> alert('ALPHA should be 0 < α < 1') </script>";
         exit;
     }
     if(empty($alpha) ||empty($month) ||empty($year) )
        {
echo "<script> alert('Insert Aplha ,Please') </script>";
         exit;
           
        }


$qforec = "SELECT forecast FROM records 
    WHERE year='$year' AND month < '$month'
    ORDER BY month DESC LIMIT 1 ";

$resforec = mysql_query($qforec);
$qdem=    " SELECT demand FROM records 
    WHERE year='$year' AND month < '$month'
    ORDER BY month DESC LIMIT 1 ";

$resdem = mysql_query($qdem);

   $forecast=mysql_fetch_row($resforec);
     $demand=mysql_fetch_row($resdem);
 $valD=$demand[0];
     $valF=$forecast[0];
     $forec=($valF +($alpha*( $valD - $valF)));
echo "<script> alert('Result is $forec') </script>";

 }
else
{
	echo "<script> alert('No Enough Data') </script>";
 }

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
   <div> <h1> Exponential Smoothing is <?php echo $forec ;?></h1></div>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" >
<body>
<div><a href="forecast3.html">  GO Back </a>
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
