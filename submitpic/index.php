<html lang="en">
  <head>
    <title>submpic</title>
    <link rel="stylesheet" href="style.css" type="text/css" />
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1; user-scalable=0;">

  </head>
  <body>
	
	<form action="upload_file.php" method="post" enctype="multipart/form-data">
<!-- this input will be hidden to show the button below-->

<span class="button btn-file">
    Select an Image <input type="file" name="file">
</span>
<!--input type="file" name="file" id="file"--><br>
<input class="button" type="submit" name="submit" value="Submit">
	
  </body>
</html>
