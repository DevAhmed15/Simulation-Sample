<?php


$host="localhost";
$us="root";
$pass="root";
$db="simulation";

$con=mysql_connect($host,$us,$pass);
mysql_select_db($db);

$sql="SELECT * FROM records where year='2000'";
$query=mysql_query($sql);
while($row=mysql_fetch_array($query))
      {
          echo $row['month']." ";
}
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