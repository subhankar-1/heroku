<?php
$m= new MongoClient();
$db=$m->quizdatabase;
$col=$db->admins;


$n=$_POST['name'];
$p=$_POST['pwd'];

$in=$col->insert(["admin name"=>$n,"password"=>$p]);

echo $n."  is registered as admin";
?>
