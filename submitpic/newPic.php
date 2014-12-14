<html lang="en">
  <head>
    <title>Newpic</title>
    <link rel="stylesheet" href="style.css" type="text/css" />
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1; user-scalable=0;">

  </head>
  <body>
	
	<p> 
<?php
$urlString =$_POST["newPicUrl"];
$imgString = '/var/www/imgcompare/'.$_GET['newPic'];
echo "new pic at: ".$imgString."<br/>";
echo "new url at: ".$urlString."<br/>";


$file = '/var/www/imgcompare/map.txt';
// Open the file to get existing content
$current = file_get_contents($file);
// Append a new person to the file
$current .= $imgString." ".$urlString."\n";
// Write the contents back to the file
file_put_contents($file, $current);
/*
$command='/var/www/imgcompare/url2db.sh '.
	'"/tmp/'.$_GET['newPic'].'" "'.$_POST["newPicUrl"].'"';
echo "command is ".$command."</br>";
exec($command, $execreturn, $resturnval);

var_dump($execreturn);
var_dump($resturnval);
*/
?>
	</p>
	
  </body>
</html>


