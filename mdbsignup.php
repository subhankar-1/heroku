<?php
$m= new MongoClient();
$db=$m->quizdatabase;
$col=$db->userregister;


$n=$_POST['name'];
$p=$_POST['pwd'];

$in=$col->insert(["user name"=>$n,"password"=>$p,"logindetails"=>'0']);

echo $n."  is registered as user";
?>
