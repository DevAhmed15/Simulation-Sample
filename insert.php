<?php 

$host="localhost";
$us="root";
$pass="";
$db="simulation";

$con=mysql_connect($host,$us,$pass);
mysql_select_db($db);

$year=@$_POST['year'];
$month=@$_POST['month'];
$demand=@$_POST['demand'];
if(empty($year) || empty($month) || empty($demand) )
{
    echo "<script> alert('Insert All date , Please'); </script>";
}
else
{
$query="INSERT INTO records(year,month,demand) VALUES ('$year','$month','$demand')";
if(@$_POST['submit']){
$query=mysql_query($query);
    if($query)
        echo "<script> alert('ADDED'); </script>";
 }

}
?>
<body>
<div><a href="register.html">  GO Back </a>
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