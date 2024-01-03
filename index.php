<?php
    include 'connection.php';
    session_start();
    if(!isset($_SESSION['USER_DATA']['username']) && empty($_SESSION['USER_DATA']['username'])){
        header('location:login.html'); 

    $user = $_SESSION['USER_DATA']['username'];
} 
?>


<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Financial Services</title>
    <link rel='stylesheet' href='style.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css'>
</head>
<body>
    <img src='cover.jpeg' style='min-width: 100%; height: 100px; padding: 0; margin: 0;'>
    <div class='navbar'>
        <ul>
            <li><a class='active' href='#'>Home</a></li>
            <li><a href='#'>Finance Cert. <i class='fa-solid fa-angle-down'></i></a>
                
                <div class='submenu'>
                    <ul>
                    <li class='hover-me'><a href='#'>2020-21<i class='fa fa-angle-right'></i></a>
                            <div class='subsubmenu'>
                                <ul>
                                    <li><a href='userpdf.php?quater=Q1&year=2020-21' target="_blank">Quater 1</a></li>
                                    <li><a href='userpdf.php?quater=Q2&year=2020-21' target="_blank">Quater 2</a></li>
                                    <li><a href='userpdf.php?quater=Q3&year=2020-21' target="_blank">Quater 3</a></li>
                                    <li><a href='userpdf.php?quater=Q4&year=2020-21' target="_blank">Quater 4</a></li>
                                </ul>
                            </div>
                    </li>
                    <li class='hover-me'><a href='#'>2021-22<i class='fa fa-angle-right'></i></a>
                            <div class='subsubmenu'>
                                <ul>
                                    <li><a href='userpdf.php?quater=Q1&year=2021-22' target="_blank">Quater 1</a></li>
                                    <li><a href='userpdf.php?quater=Q2&year=2021-22' target="_blank">Quater 2</a></li>
                                    <li><a href='userpdf.php?quater=Q3&year=2021-22' target="_blank">Quater 3</a></li>
                                    <li><a href='userpdf.php?quater=Q4&year=2021-22' target="_blank">Quater 4</a></li>
                                </ul>
                            </div>
                    </li>
                    <li class='hover-me'><a href='#'>2022-23<i class='fa fa-angle-right'></i></a>
                            <div class='subsubmenu'>
                                <ul>
                                    <li><a href='userpdf.php?quater=Q1&year=2022-23' target="_blank">Quater 1</a></li>
                                    <li><a href='userpdf.php?quater=Q2&year=2022-23' target="_blank">Quater 2</a></li>
                                    <li><a href='userpdf.php?quater=Q3&year=2022-23' target="_blank">Quater 3</a></li>
                                    <li><a href='userpdf.php?quater=Q4&year=2022-23' target="_blank">Quater 4</a></li>
                                </ul>
                            </div>
                    </li>
                    </ul>
                </div>
            </li>
            <li><a href='#'>About Us</a></li>
            <li><a href='#'>Investor Relations</a></li>
            <li><a href='#'>Contact Us</a></li>
        </ul>
    </div>
    <div class='container'>
        <table>
            <h3>PAN ID: <?php
                echo $_SESSION['USER_DATA']['username'];
                echo "<br><br><button><a style='text-decoration:none' href='login.html'>Logout</a></button>";
            ?></h3>
        </table>
        <div id="renderPDF">

        </div>
    </div>
</body>
</html>

        