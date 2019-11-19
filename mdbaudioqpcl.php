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
<div class="container">
  <div class="text-center text-primary">
	
	<h1>Welcome
	<?php 
	session_start();
	if(!isset($_SESSION['user name'])){
	header('location:mdb.php');
	exit;
	}
	
	
	$m=new MongoClient();
	$db=$m->quizdatabase;
	$col1=$db->audioques;
	$cursor=$col1->find();
	$col2=$db->audioopt;
	$n=$_POST['n'];
	echo $_POST['name'];?><p id="demo"></p>

<script>
// Set the date we're counting down to
var countDownDate = new Date().getTime()+(1000*60*30);

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text
  if (distance < 0) {
    header('location: mdbresult.php');
  }
}, 1000);
</script></h1></div>
</div>
	<?php $co=$col1->count();
if($co<$n){
?><br><br><br><div class="container text-center"><a href="mdbadmin.php">ask admin to add <?php echo ($n-$co); ?> questions</a></div>
	

  

<?php } else { ?>
<div class="container">
<form action="mdbresultaudiocl.php" method="post">

<?php	
	$j=1;
	$i=0;
	foreach($cursor as $doc){
if($j>$n)
break;
	$filter = ['ans_id' => $doc['qid']];
	$cursor2=$col2->find($filter);
?>
    <div class= "panel panel-info">

	<h3 class="panel-header"><?php 
#fetch and start video
	#imagepng(imagecreatefromstring(base64_decode($doc['str64'])),"mdbvarimg".$i.".png");

$gridv = $db->getGridFS();
$file=$gridv->findOne(['filename'=>$doc['str64']]);

file_put_contents("mdbvaraudio".$i,$file->getBytes());



echo ($i+1).")  "; ?>
	 <audio controls>
 	 <source src="mdbvaraudio<?php echo $i ?>" type="audio/mpeg">
	 </audio> 


	


	<?php
	
	echo $doc['question'];  ?></h3>
	<?php #foreach($cursor2 as $doc2){ ?>
	<p>Ans:</p><input type="text" name="quizcheck[<?php echo $doc['qid'];?>]" >
	
<?php #} ?>
    </div>
    
	<br>
<?php $i++; $j++; }?>
<h6>Your login name is:</h6>
<input type='text' name="name" value="<?php echo $_POST['name']; ?>" placeholder="student login name">
<input type="password" name="pwd" value="<?php echo $_POST['pwd'] ?>" placeholder="password">
<br>
<br>
<br>

<input type="submit" name="submit" value="Submit" class="btn btn-success m-auto d-block ">
</form>
	
<div>
<a href="mdbhome.php" class="text-center btn btn-primary m-auto d-block">Log Out</a>
</div>

 
</div>



</div>
<?php } ?>
</body>
</html>

