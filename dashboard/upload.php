<?php
$ds          = DIRECTORY_SEPARATOR;  //1
 
$storeFolder = 'uploads';   //2
$file = fopen("log.txt","a");
if (!empty($_FILES)) {
     
	fwrite($file,date("l jS \of F Y h:i:s A"));
	fwrite($file," Heres the count: ".count($_FILES)."\r\n");
	fwrite($file, "\tName:".$_FILES['userfile']['name']."\r\n");
	fwrite($file, "\tsize:".$_FILES['userfile']['size']."\r\n");
	fwrite($file, "\te_code:".$_FILES['userfile']['error']."\r\n");
    $tempFile = $_FILES['file']['tmp_name'];          //3             
      
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4
     
    $targetFile =  $targetPath. $_FILES['file']['name'];  //5
 
    move_uploaded_file($tempFile,$targetFile); //6
    fclose($file);
     
}
?>  