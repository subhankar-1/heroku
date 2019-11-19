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
	header('location: mdb.php');
	exit;
	}
	

	//include 'mdblogoutbyadmin.php';
	//if($_GET['id']==$_POST['name']){header('location: mdb.php');}
	$m=new MongoClient();
	$db=$m->quizdatabase;
	$col1=$db->questions;
	$cursor=$col1->find();
	$col2=$db->answers;
	$n=$_POST['n'];
	echo $_POST['name'];
	
	?><p id="demo"></p>

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
</script>
</h1>

  </div>
</div>
<?php $co=$col1->count();
if($co<$n){
?><br><br><br><div class="container text-center"><a href="mdbadmin.php">ask admin to add <?php echo ($n-$co); ?> questions</a></div>
<?php } else { ?> 
<div class="container">
<form action="mdbresult.php" method="post">

<?php	
	
	$i=1;
	foreach($cursor as $doc){
	if($i>$n)
break;
	$filter = ['ans_id' => $doc['qid']];
	$cursor2=$col2->find($filter);
?>
    <div class= "panel panel-info">
	<h3 class="panel-header"><?php  echo $i.")   ".$doc['question'];  ?></h3>
	<p>Ans:</p><br><?php foreach($cursor2 as $doc2){?>
	<input type="radio" name="quizcheck[<?php echo $doc2['ans_id'];?>]" value="<?php echo $doc2['aid'];?>">
	<h3 class="panel-body"><?php echo $doc2["answer"];?></h3><br>
<?php } ?>
    </div>
    
	<br>
<?php $i++;}?>
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

