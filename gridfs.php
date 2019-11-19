<html>
<head></head>
<body>


<?php
$m=new MongoClient();
$db=$m->gridput;
$grid = $db->getGridFS();
$id = $grid->storeFile("movie5.mp4");
$file=$grid->findOne(['filename'=>'movie5.mp4']);

#$grid->findOne()->getBytes();

#imagepng(imagecreatefromstring($file->getBytes()),"gfs2");
file_put_contents("gfs2",$file->getBytes());
?>

 <audio controls>
  
  <source src="aud.mp3" type="audio/mpeg">
</audio> 


</body>
</html>
