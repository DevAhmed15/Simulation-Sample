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



if($_POST['add']){
            $weight=@$_POST['weights'];
            if(empty($weight))
            {
            	echo "<script> alert('No Data Inserted'); </script>";
                exit;
            }
$query="INSERT INTO weights(value) VALUES ('$weight')";
$squery=mysql_query($query);
if($squery)
 echo "<script> alert('ADDED'); </script>";
}

?>
<body>
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
