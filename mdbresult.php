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
	$m=new MongoClient();
	$db2=$m->quizdatabase;
	$coll2=$db2->questions;
	$col=$db2->userregister;
	$cursor3=$coll2->find();
	$p=$_POST['pwd'];
	if(!isset($_SESSION['user name'])){
	header('location:mdb.php');
	exit;
	}
	
	if(isset($_POST['submit'])){
		if(!empty($_POST['quizcheck'])){
			$count=count($_POST['quizcheck']);
	?><div class="container text-center"  ><h1>Result of quiz</h1></div>
<br>
<br>
<br><br>
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
				$checked = $docs4['ans_id']==$selected[$i];
				if($checked)
				$result++;}
			$i++;
				}?>
	<br>
	<br>
	<div class="container">
		<div class=" panel panel-info ">
			<h3 class=" panel panel-header "><?php echo $_POST['name']." your quiz is over and your total score is ".$result; ?></h3>
		</div>
	  </div>
		<?php }

	else {?> <div class="container ">
		<div class=" panel panel-info ">
			<h3 class=" panel panel-header "><?php echo "please select an option"; ?></h3>
		
		</div>
	  </div>
	<?php } }$us=$db2->users;
		$un=$_POST['name'];
		#echo "$un";
		$in=$us->insert(["username"=>$un,"attempted"=>$count,"score"=>$result]);
		$col->update(
            array("user name" => $un,"password"=>$p),
            array('$set' => array("logindetails" => '0')),
            array("upsert" => true)
);
	?>

<br>
<br>
<br>
	<br><div class="container text-center ">
<a href="mdbhome.php">logout and Go to homepage</a></div>
</body>
</html>
