<?php 
    include 'connection.php'; 

    session_start();
    if(!isset($_SESSION['USER_DATA']['username']) && empty($_SESSION['USER_DATA']['username'])){
        header('location:login.html'); 
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Viewer</title>
</head>
<body>
    <?php
        $path = 'C:/pdf/';
        $quater = $_GET['quater'];
        $year = $_GET['year'];
        $user = $_SESSION['USER_DATA']['username'];
        $selectQuery = "SELECT filename FROM pdf_main WHERE quater='".$quater."' AND year='".$year."' AND username='".$user."'";
		$squery = mysqli_query($con, $selectQuery);
        $row = mysqli_fetch_assoc($squery);
        $filename = $row["filename"];
        $file = $path.$filename;

        // Header content type 
        header('Content-type: application/pdf'); 
        header('Content-Disposition: inline; filename="' . $filename . '"'); 
        header('Content-Transfer-Encoding: binary'); 
        header('Accept-Ranges: bytes'); 
        
        // Read the file 
        @readfile($file);

        echo $file;
    ?>
</body>