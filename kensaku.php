<!DOCTYPE HTML PUBLIC"-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<meta http-equiv="Content-Type" context="text/html; charset=UTF-8">
	<title>検索</title>	
</head>
<body>
	<?php
	$code=$_POST['code'];

	$dsn = 'mysql:dbname=phpkiso;host=localhost';
	$user = 'root';
	$password = '';
	$dbh = new PDO($dsn, $user, $password);
	$dbh->query('SET NAMES utf8');

	$sql = 'SELECT * FROM `survey` WHERE code=?';
	$data[] = $code;
	$stmt = $dbh->prepare($sql);
	$stmt->execute($data);

	while(1)
	{
		$rec = $stmt->fetch(PDO::FETCH_ASSOC);
		if($rec==false)
		{
			break;
		}
		echo $rec['code'];
		echo '&nbsp;';
		echo $rec['nickname'];
		echo '&nbsp;';
		echo $rec['email'];
		echo '&nbsp;';
		echo $rec['goiken'];
		echo '<br />';
	}


	$dbh = null;
	?>
	
</body>