<html lang="en">
  <head>
    <title>submit a pic</title>
    <link rel="stylesheet" href="style.css" type="text/css" />
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1; user-scalable=0;">

  </head>
  <body>

<?php
$fileName = $_FILES["file"]["name"];


#the command to get the url from the script to debug replace 2>/dev/null with 2>&1
$command='/var/www/imgcompare/img2URL.sh '.$_FILES["file"]["tmp_name"]. " /var/www/imgcompare 2>&1";


echo "Runnign command :</br>".$command."</br>";
exec($command, $execreturn, $resturnval);
echo "returned :".$resturnval."</br></br>";

$found = "";
foreach($execreturn as $line) {
    #if it has an http then its a the url
    if (strpos($line, 'http') !== FALSE){
    $found= $line;
    echo 'Found url: '.$line."</br>";
    }else{
    echo 'Line :'.$line.' found url: '.$found."</br>";
    }
}


# If something is found the redirect else save image

if ($found !=="")
	{
	echo "Using URL: ".$found;

	echo "<script type=\"text/javascript\">
	location.replace(\"".$found."\");
	</script>";
	
	}else{

	echo "<br/><br/><br/>New Image!"."<br/>";

	$moveWorked=move_uploaded_file($_FILES["file"]["tmp_name"],
	      "/var/www/imgcompare/" . $fileName);
	echo "move_uploaded_file ".$_FILES["file"]["tmp_name"]." "."/var/www/imgcompare/" . $fileName."<br/>";
	echo "Move ";
	echo $moveWorked?"worked":"did not work";
	echo "<br/><br/>";
	
	
	echo '<form action="newPic.php?newPic='.$fileName.'" method="post">
	enter new url: <input type="text" name="newPicUrl"><br>
	<input type="submit">
	</form>';

	}

?>
  </body>
</html>
