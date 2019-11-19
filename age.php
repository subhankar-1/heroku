<?php
	$us=$_POST['usrname'];
	$db=$_POST['birthday'];
	$td=$_POST['today'];
		
	$host="host=127.0.0.1";
	$port="port=5432";
	$dbname="dbname=mydb";
	$credentials="user=postgres password=root";

	$bb=pg_connect("$host $port $dbname $credentials");
	if(!$bb){
		echo "Error :Unable to ope database\n";
			echo "<br>";
	}
	else{
	  echo "Opened databse successfully";
	     echo "<br>";
	}


	$sql1 =<<<EOF
INSERT INTO dob (name,db,td) VALUES('$us','$db','$td');

EOF;

$ret =pg_query($bb,$sql1);
	if(!$ret){
		echo pg_last_error($bb);
	}else{
	   echo "SuperUser Created sussessfully";
	  echo"<br>";
	}
$sql2 =<<<EOF
SELECT AGE(TIMESTAMP  '$td',TIMESTAMP '$db');
EOF;
	$ret =pg_query($bb,$sql2);
	while($row=pg_fetch_row($ret)){
		echo $row[0];
		
	}
	pg_close($bb);
?>

