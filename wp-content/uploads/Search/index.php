<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>AWS PHP</title>
</head>
<body>
	<h1>AWS PHP</h1>
	<?php
		$host ='wordpress.c89xqyjfvpgb.ap-southeast-2.rds.amazonaws.com';
	$user = 'wordpress';
	$pass='wordpress-pass';
	$db_name= 'wordpress';
	
	$conn = new mysqli($host, $user, $pass,$db_name);
	if($conn->connect_error){
		die('Connect eroor: '.$conn->connect_error);
	}
	if($conn){
		echo "success";
	}

	

	$searchs = $_POST["search"];  
	$searchs= trim($searchs);
	echo $searchs;
	if (!$searchs){
		echo '输入为空';
		exit;
	}
		$result = $conn->query("select Id, Name from `Sports Places` where `Sports Places`.`Id`=$searchs");

  		echo "网页搜索结果<hr>";
  		while($row = mysqli_fetch_array($result))
 		{
 			 	
 			
  				echo "<br />";
 				 echo $row['Name'] ;
 				 echo "<hr />";
  				
  
  		}

  		$conn->close();
	?>
</body>
</html>