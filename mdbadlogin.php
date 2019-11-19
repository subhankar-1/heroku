<html>
<head></head>
<body>
<?php
$m= new MongoClient();
$db=$m->quizdatabase;
$col=$db->admins;


$n=$_POST['name'];
$p=$_POST['pwd'];
$flag = 0;
$cursor=$col->find([ 'admin name' => $n]);
if($col->findOne([ 'admin name' => $n])){
	foreach($cursor as $doc){
		if($doc['password']==$p){?>
<h2>Select category</h2><br><br>
			<div class="container text-center"  ><a href="mdbcategory.php">select category of question to be added</a></div>
<h2>Monitor</h2><br><br>
			<div class="container text-center"  ><a href="mdbmonitor.php">Open monitor page</a></div><?php
			$flag=1;
		}
}
if($flag!=1)
echo "please insert correct password";
}
else{

echo $n."  is not registered";
}
?>
</body>
</html>
