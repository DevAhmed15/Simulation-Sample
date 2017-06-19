<?

$conn = mysql_connect("localhost", "root", "root");

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
$alpha=$_POST['alpha'];
     if($alpha >1 && $alpha <0)
     {
echo "<script> alert('ALPHA should be 0< ALPHA <1') </script>";
         exit;
     }
     if(empty($alpha))
        {
echo "<script> alert('Insert Aplha ,Please') </script>";
         exit;
           
        }
$result = mysql_query('SELECT value FROM forecast ORDER BY id DESC LIMIT 1');
$result2 = mysql_query('SELECT demand FROM records ORDER BY id DESC LIMIT 1');


if (mysql_num_rows($result) > 0 && mysql_num_rows($result2) > 0) {
   $lforecast = mysql_fetch_row($result);
      $ldemand = mysql_fetch_row($result2);
  $valF=$lforecast[0];
    $valD=$ldemand[0];
    
 $calc=$valD+($alpha*($valF - $valD));
echo "<script> alert('Result is $calc') </script>";
}

else
{
	echo "<script> alert('No Enough Data') </script>";
 }


?>
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
