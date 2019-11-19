<?php
	session_start();
$em=$_SESSION['user name'];
$m= new MongoClient();
$db=$m->quizdatabase;
$col=$db->userregister;
	    if($em!=null)
	    $col->update(
            array('user name' => $em),
            array('$set' => array("logindetails" => '0')),
            array("upsert" => true)
);
//$var=$_POST['user'];
//header("Location: mdblogin.php?id=".$var);
unset($_SESSION['user name']);
header('location: mdbmonitor.php');
?>
