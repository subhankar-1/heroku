<?php

header('Refresh: 5; URL=mdbmonitor.php');
?>

<html>
<head><title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
            <div class="row row_style1">
                <div class="col-xs-4 col-xs-offset-3">          
            <table class="table">
  <thead>
    <tr>
      <th scope="col">S.No.</th>
      <th scope="col">UserID</th>
      <th scope="col">Email Id</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
<?php
$m= new MongoClient();
$db=$m->quizdatabase;
$col=$db->userregister;
$coll=$db->users;
$cursor=$col->find();
$i=1;
$us=$db->users;
$cursor2=$coll->find();
foreach($cursor as $doc){
?><tr>
 <th scope="row"><?php echo $i++;?></th>
 <td><?php echo $doc['_id'];?></td>
 <td><?php echo $doc['user name'];?></td>
 <td><?php echo $doc['logindetails'];?></td>
 <td><?php if($doc['logindetails']=='1'){
echo "Online";
}else{
echo "Offline";
}?></td>
<td><?php if($doc['logindetails']==1){?>
<a href="mdblogoutbyadmin.php" >Stop</a>
<?php } ?></td>
</tr>
<?php
}
$i=1;
?>
<tr><td><b>********************************Result*******************************     </b></td></tr>
</tbody>



<thead>
   
    <tr>
      <th scope="col">S.no.</th>
      <th scope="col">User</th>
      <th scope="col">Attempted</th>
      <th scope="col">Score</th>
    </tr>
  </thead>

<?php
 foreach($cursor2 as $docs){
?><tr>
 <th scope="row"><?php echo $i++;?></th>
 <td><?php echo $docs['username'];?></td>
 <td><?php echo $docs['attempted'];?></td>
 <td><?php echo $docs['score'];?></td>
</tr>
<?php }

?>

  </tbody>

</table>
        </div>
             </div>  
        </div>

    </body>
</html>

