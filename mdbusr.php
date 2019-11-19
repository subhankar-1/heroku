<html>
<head></head>
<body>
<?php
session_start();
$m= new MongoClient();
$db=$m->quizdatabase;
$col=$db->userregister;


$n=$_POST['name'];
$p=$_POST['pwd'];
$flag = 0;
$cursor=$col->find([ 'user name' => $n]);
if($col->findOne([ 'user name' => $n])){
	foreach($cursor as $doc){
		if($doc['password']==$p)
{

$col->update(
            array("user name" => $n,"password" =>$p),
            array('$set' => array("logindetails" => '1')),
            array("upsert" => true)
);

$_SESSION['user name']=$doc['user name'];
?>
<div class="container text-center"  ><h1>choose category</h1></div>
<br>
<br><hr><hr><hr>
<br>
	<div class="container">
    		<div class="row">
			<div class="col-sm-3">
			<form action="mdblogin.php" method="post"><h3> Text  MCQ category</h3>
			 <input type="text" name="name" value="<?php echo $_POST['name'] ?>" placeholder="login name">
			 <input type="password" name="pwd" value="<?php echo $_POST['pwd'] ?>" placeholder="password">
			<br><p>enter number of questions</p>
			<input type="number" name="n" value=2 placeholder="no. of questions">
			<br><button type="submit" class="btn btn-default">Start MCQ text Quiz</button>
			</form></div>
		<form action="mdbtqpcl.php" method="post">
			<br><br><hr><h3> Text clueless category</h3>
			 <input type="text" name="name" value="<?php echo $_POST['name'] ?>" placeholder="login name">
			<input type="password" name="pwd" value="<?php echo $_POST['pwd'] ?>" placeholder="password">
			<p>enter number of questions</p>
			<input type="number" name="n" value=2 placeholder="no. of questions">
			<br><button type="submit" class="btn btn-default">Start clueless text Quiz</button>
		</form>
			<div class="col-sm-3">
			<form action="mdbimgqp.php" method="post"><hr><hr>
			 <br><input type="text" name="name" value="<?php echo $_POST['name'] ?>" placeholder="login name"><input type="password" name="pwd" value="<?php echo $_POST['pwd'] ?>" placeholder="password"><h3> Image MCQ category</h3>
			<p>enter number of questions</p>
			<input type="number" name="n" value=2 placeholder="no. of questions"><br>			
			<button type="submit" class="btn btn-default">Start image MCQ Quiz</button></form>
		<form action="mdbimgqpcl.php" method="post">
			<br><br><hr><h3> Image clueless category</h3>
			 <input type="text" name="name" value="<?php echo $_POST['name'] ?>" placeholder="login name">
			<input type="password" name="pwd" value="<?php echo $_POST['pwd'] ?>" placeholder="password">
			<p>enter number of questions</p>
			<input type="number" name="n" value=2 placeholder="no. of questions">
			<br><button type="submit" class="btn btn-default">Start clueless image Quiz</button>
		</form>
			</div><br><br><br><hr><hr><div class="col-sm-3">
			<form action="mdbvideoqp.php" method="post">
			 <input type="text" name="name" value="<?php echo $_POST['name'] ?>" placeholder="login name"><input type="password" name="pwd" value="<?php echo $_POST['pwd'] ?>" placeholder="password"><h3> Video MCQ category</h3>
<p>enter number of questions</p>
			<input type="number" name="n" value=2 placeholder="no. of questions">			
<br><button type="submit" class="btn btn-default">Start MCQ video Quiz</button>
			</form>
</div><br><br><br><form action="mdbvideoqpcl.php" method="post">
			<br><br><hr><h3>Video clueless category</h3>
			 <input type="text" name="name" value="<?php echo $_POST['name'] ?>" placeholder="login name"><input type="password" name="pwd" value="<?php echo $_POST['pwd'] ?>" placeholder="password">
			<p>enter number of questions</p>
			<input type="number" name="n" value=2 placeholder="no. of questions">
			<br><button type="submit" class="btn btn-default">Start clueless Video Quiz</button>
		</form><hr><hr><div class="col-sm-3">
			<form action="mdbaudioqp.php" method="post">
			 <input type="text" name="name" value="<?php echo $_POST['name'] ?>" placeholder="login name"><input type="password" name="pwd" value="<?php echo $_POST['pwd'] ?>" placeholder="password"><h3> Audio MCQ category</h3>
			<p>enter number of questions</p>
			<input type="number" name="n" value=2 placeholder="no. of questions"><br><button type="submit" class="btn btn-default">Start audio MCQ Quiz</button>
			</form></div>
	<form action="mdbaudioqpcl.php" method="post">
			<br><br><hr><h3> Audio clueless category</h3>
			 <input type="text" name="name" value="<?php echo $_POST['name'] ?>" placeholder="login name"><input type="password" name="pwd" value="<?php echo $_POST['pwd'] ?>" placeholder="password">
			<p>enter number of questions</p>
			<input type="number" name="n" value=2 placeholder="no. of questions">
			<br><button type="submit" class="btn btn-default">Start clueless audio Quiz</button>
		</form>
</div>
</div>
			<?php
			$flag=1;
		}
}
if($flag!=1)
echo "please insert correct password";
}
else{

echo $n."  is not registered";
}
?>
</body>
</html>
