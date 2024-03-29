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
    <img src='cover.jpeg' style='min-width: 100%; height: 100px; padding: 0; margin: 0;'>
    <?php
        $path = 'C:/pdf/';
        $id = $_GET['id'];
        $selectQuery = "select filename from pdf_main where id=".$id;
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

        echo $filename;
    ?>
</body>
</html>