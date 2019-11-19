<html>
<head></head>
<body>
<?php
$m= new MongoClient();
$db=$m->quizdatabase;
$col=$db->questions;
$col2=$db->answers;
$cursor=$col->find();

$count=0;
foreach ($cursor as $doc){
	$count++;
}

$qid=$count+1;
$q=$_POST['question'];
$anid=(2*$count)+$_POST['cans'];
$in=$col->insert(["qid"=>$qid,"question"=>$q,"ans_id"=>$anid]);

$cursor=$col2->find();
$count=0;
foreach ($cursor as $doc){
	$count++;
}
$a1=$_POST['opt1'];
$a2=$_POST['opt2'];
$in=$col2->insert(["aid"=>$count+1,"answer"=>$a1,"ans_id"=>$qid]);
$in=$col2->insert(["aid"=>$count+2,"answer"=>$a2,"ans_id"=>$qid]);

?>
<a href='mdbinq.php' >Keep adding Questions</a>
<br>
<br>
<a href='mdbhome.php'>Logout as admin and go to homepage</a>
<br>
<br>
<a href='mdbcategory.php'>Change category</a>
</body>
