<html>
<head></head>
<body>
<?php
$m= new MongoClient();
$db=$m->quizdatabase;
$col=$db->videoques;
$col2=$db->videoopt;
$cursor=$col->find();


$gridv = $db->getGridFS();



$count=0;
foreach ($cursor as $doc){
	$count++;
}
$url=$_POST['url'];
#$str=base64_encode(file_get_contents($url));
$qid=$count+1;
$q=$_POST['question'];
$anid=(2*$count)+$_POST['cans'];
$in=$col->insert(["qid"=>$qid,"str64"=>$url,"question"=>$q,"ans_id"=>$anid]);

$idv = $gridv->storeFile($url);



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
<a href='mdbvideo.php' >Keep adding Questions</a>
<br>
<br>
<a href='mdbhome.php'>Logout as admin and go to homepage</a>
<br>
<br>
<a href='mdbcategory.php'>Change category</a>
</body>
