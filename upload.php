<html>
<style>
	   body {
	   	background-image: url("upload.png");
		background-repeat: no-repeat;
  		background-attachment: fixed;
 	 	background-size: cover;
	   }
	   </style>
<body>
<?php
$statusMsg = '';

//file upload path
$targetDir = "C:\\xampp\htdocs\\test-local\\";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])) {
    //allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        //upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            $statusMsg = "The file ".$fileName. " has been uploaded.";
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}

//display status message
echo $statusMsg;
?>

<section class = "block-of-text">
        <a href="mainPage.php"><input type = "submit" name = "reset" value = "Back"/></a>
      </section>
</body>
</html>