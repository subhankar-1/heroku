<html>
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<?php
	session_start();
	if(!isset($_SESSION['user name'])){
	header('location:mdb.php');
	exit;
	}
	$m=new MongoClient();
	$db2=$m->quizdatabase;
	$coll2=$db2->audioques;
	$colll=$db2->userregister;
	$cursor3=$coll2->find();
	$col=$db2->audioopt;	
	$p=$_POST['pwd'];
	if(isset($_POST['submit'])){
		if(!empty($_POST['quizcheck'])){
			$se=$_POST['quizcheck'];
			$count=count($_POST['quizcheck']);
			$count2=count($_POST['quizcheck']);
			for($k=1;$k<=$count2;$k++){
				if($se[$k]=="")
				$count--;}
	?><div class="container text-center"  ><h1>Result of quiz</h1></div><br>
	<br><div class="container  ">
		<div class=" panel panel-info ">
			<h3 class=" panel panel-header "><?php echo $_POST['name']."  you have attempted  ".$count ." qusetions <br>"; ?></h3>
		</div>
	  </div><?php
			$i=1;
			$result=0;
			#$selected = array_fill(1, 4, 0);
			
			$selected =$_POST['quizcheck'];
			
			#print_r($selected);
			
			foreach($cursor3 as $docs4){
				#echo $docs4['ans_id'];
				if(isset($selected[$i])){
$cursor=$col->findOne(['aid'=> $docs4['ans_id']]);
				#$checked = $docs4['ans_id']==$selected[$i];
				if($cursor['answer']==$selected[$i])
				$result++;}
			$i++;
				}?>
	<br>
	<br>
	<div class="container ">
		<div class=" panel panel-info ">
			<h3 class=" panel panel-header "><?php echo $_POST['name']."your quiz is over and  your total score is ".$result; ?></h3>
		</div>
	  </div>
		<?php }

	else {?> <div class="container text-center ">
		<div class=" panel panel-info ">
			<h4 class=" panel panel-header "><?php echo "please select an option"; ?></h4>
		
		</div>
	  </div>
	<?php } }$us=$db2->users;
		$un=$_POST['name'];
		#echo "$un";
		$in=$us->insert(["username"=>$un,"attempted"=>$count,"score"=>$result]);
		$colll->update(
            array("user name" => $un,"password"=>$p),
            array('$set' => array("logindetails" => '0')),
            array("upsert" => true)
);
	?>

<br>
<br>
<br><div class="container text-center"  ><a href="mdbhome.php">logout and Go to homepage</a></div>


</body>
</html>
