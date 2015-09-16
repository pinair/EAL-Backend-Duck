<?php
//if username and password are set...
if(isset($_POST["user"]) && isset($_POST["pass"])){
	//setcookie permits to pass the user var to the main.php page if login succeed
	setcookie("user", $_POST["user"]);
	
	$filehandle = fopen("users.txt", "r"); //r -> read from the file
	/*
	 * if you want to write in a file:
	 * $filehandle = fopen("users", "w");
	 * but BE CAREFUL, if the file already exists (same name), the method will overwrite the old one!
	 * you can also use this:
	 * fwrite($filehandle, "writingwriting");
	 */
	if($filehandle){ //if filehandle exists (!null)
		$line;
		while ($line = fgets($filehandle)){ //it returns every line of the object
			$line = trim($line); //it deletes white spaces
			$comparetext = $_POST["user"]."=".$_POST["pass"];
			if($line == $comparetext){
				//LOGIN SUCCEEDED AREA
				fclose($filehandle); //close the file
				header("Location: main.php");
				exit();
			}
		}
		fclose($filehandle); //close the file
	}
	
	header("Location: index.php");
	exit();
	
}else{
	header("Location: index.php");
	exit();
}
?>