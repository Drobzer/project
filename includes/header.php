<?php
    session_start();
    include_once 'includes/connect.php';
    include_once 'includes/functions.php';
    date_default_timezone_set('America/Detroit');
	
    if(!isset($_SESSION['login']) && $_SESSION['login'] != TRUE){
		header("Location: loginreg.php");
        exit;
	}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>CP</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="style/style2.css" media="all" rel="stylesheet" type="text/css">
		<link href="style/boxes.css" media="all" rel="stylesheet" type="text/css">	
    </head>
    <body onload="apply_settings(<?php if(isset($_COOKIE['cpen_bkgcolor'])){echo "'".$_COOKIE['cpen_bkgcolor']."'";}?>); startTime();">
       
        <div class="head">
			
            <div class="logout">
				<h3>Welcome <?php echo ucfirst($_SESSION['user']); ?></h3>
				<p><a href="logout.php">Logout</a></p>
			</div>
			
			<div class="info-left">
			
			<?php
				
				if($_SESSION['adm'] ==1){
					echo "Your IP: ".$_SERVER['REMOTE_ADDR'] . "<br />"; 
					echo "Server IP: ".$_SERVER['SERVER_ADDR'] . "<br />"; 
					echo "Your session key: ";
						for($i=10; $i<=35; $i++){ 
							echo $_SERVER['HTTP_COOKIE'][$i]; 
						}
						echo "<br />"; 
				}
				echo "</div><div class=\"info-right\">";
				echo $_SESSION['currentdate'];
				echo "<br />";
				echo "Current Time: <div id=\"clock\"></div>";
				
			?>
				
			</div>
			
        </div>
        
        <div class="nav">
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="schedule.php">Schedule a Remote</a></li>
                <li><a href="view.php">View Remotes</a></li>
                <li><a href="report.php">Report</a></li>
				<li><a href="mystats.php">My stats</a></li>
				<li><a href="showallrem.php">Show All remotes</a></li>
				<li><a href="problemsdb.php">ADD to Problems DB</a></li>
				<li><a href="search.php">Search Problems DB</a></li>
					
					<?php
						if($_SESSION['adm'] ==1){
							echo "<li><a href=\"users.php\">Users DB</a></li>";
						}
					?>
			</ul>
        </div>
		
		<div class="content">
			