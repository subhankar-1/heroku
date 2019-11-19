<?php
	$m=new MongoClient();
	$db=$m->quizdatabase;
	$col1=$db->questions;
	$cursor=$col1->find();
	$col2=$db->answers;
	foreach($cursor as $doc){
	$filter = ['ans_id' => $doc['qid']];
	$cursor2=$col2->find($filter);
	 foreach($cursor2 as $doc2){
		echo $doc2["aid"];
	}
       }
?>
