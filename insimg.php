<html>
<head></head>
<body>

<?php 
$m=new MongoClient();
$db=$m->imgdb;
$col=$db->img;

#$im = new Imagick('test.png');

$col->insert(["username"=>"subhankar","pic"=> new MongoBinData(file_get_contents("test.png"), MongoBinData::GENERIC)]);


$data = 'iVBORw0KGgoAAAANSUhEUgAAABwAAAASCAMAAAB/2U7WAAAABl'
       . 'BMVEUAAAD///+l2Z/dAAAASUlEQVR4XqWQUQoAIAxC2/0vXZDr'
       . 'EX4IJTRkb7lobNUStXsB0jIXIAMSsQnWlsV+wULF4Avk9fLq2r'
       . '8a5HSE35Q3eO2XP1A1wQkZSgETvDtKdQAAAABJRU5ErkJggg==';
#$data = base64_decode($data);
$cursor=$col->findOne();
#echo (base64_encode(file_get_contents("test.png")));
foreach($cursor as $doc){
	#$im = imagecreatefromPNG ('img.png'); 
	#imagePNG($im);
	
	#imagepng("sub2.png");
	#$imgBuff = $im->getimageblob();
	
	#$i=imagepng(imagecreatefromstring(base64_decode($data)),"img5.png");
	#imagepng(imagecreatefromstring($myQuestion->cover->getData()));
}
#header('Content-Type: image/png');
imagepng(imagecreatefromstring(base64_decode(base64_encode(file_get_contents("sub2.png")))),"img6.png");

?>


<img src="img6.png" height="100" weidth="100"/>
</body>
</html>
