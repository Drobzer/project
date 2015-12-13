<?php
	include 'includes/header.php';
?>
            <div class="right">
               
				<h2>Settings</h2>
			
		<h3>Background Color</h3>
        <h4>Standard Colors</h4>
        <a href="?color=red"><div id="red" onmouseover="previewred()" onmouseout="restore(<?php if(isset($_COOKIE['cpen_bkgcolor'])){echo "'".$_COOKIE['cpen_bkgcolor']."'";}else{ echo "'". "#E6E9EB"."'";}?>)">
            
            </div></a>
        
        <a href="?color=black"><div id="black" onmouseover="previewblack()" onmouseout="restore(<?php if(isset($_COOKIE['cpen_bkgcolor'])){echo "'".$_COOKIE['cpen_bkgcolor']."'";}else{ echo "'". "#E6E9EB"."'";}?>)">
            
            </div></a>
        
        <a href="?color=green"><div id="green" onmouseover="previewgreen()" onmouseout="restore(<?php if(isset($_COOKIE['cpen_bkgcolor'])){echo "'".$_COOKIE['cpen_bkgcolor']."'";}else{ echo "'". "#E6E9EB"."'";}?>)">
            
            </div></a>
        
        <a href="?color=orange"><div id="orange" onmouseover="previeworange()" onmouseout="restore(<?php if(isset($_COOKIE['cpen_bkgcolor'])){echo "'".$_COOKIE['cpen_bkgcolor']."'";}else{ echo "'". "#E6E9EB"."'";}?>)">
            
            </div></a>
        
        <a href="?color=blue"><div id="blue" onmouseover="previewblue()" onmouseout="restore(<?php if(isset($_COOKIE['cpen_bkgcolor'])){echo "'".$_COOKIE['cpen_bkgcolor']."'";}else{ echo "'". "#E6E9EB"."'";}?>)">
            
            </div></a>
        
		<a href="?color=yellow"><div id="yellow" onmouseover="previewyellow()" onmouseout="restore(<?php if(isset($_COOKIE['cpen_bkgcolor'])){echo "'".$_COOKIE['cpen_bkgcolor']."'";}else{ echo "'". "#E6E9EB"."'";}?>)">
            
            </div></a>
        
		<br /><br /><br /><br />
		<h4>More Colors</h4>
		
		<a href="?color2=3399ff"><div id="custom1" onmouseover="previewcustom1()" onmouseout="restore(<?php if(isset($_COOKIE['cpen_bkgcolor'])){echo "'".$_COOKIE['cpen_bkgcolor']."'";}else{ echo "'". "#E6E9EB"."'";}?>)">
            
            </div></a>
			
		<a href="?color2=829bae"><div id="custom2" onmouseover="previewcustom2()" onmouseout="restore(<?php if(isset($_COOKIE['cpen_bkgcolor'])){echo "'".$_COOKIE['cpen_bkgcolor']."'";}else{ echo "'". "#E6E9EB"."'";}?>)">
            
            </div></a>
		
		<a href="?color2=eafeef"><div id="custom3" onmouseover="previewcustom3()" onmouseout="restore(<?php if(isset($_COOKIE['cpen_bkgcolor'])){echo "'".$_COOKIE['cpen_bkgcolor']."'";}else{ echo "'". "#E6E9EB"."'";}?>)">
            
            </div></a>		
			
		<a href="?color2=9faeb8"><div id="custom4" onmouseover="previewcustom4()" onmouseout="restore(<?php if(isset($_COOKIE['cpen_bkgcolor'])){echo "'".$_COOKIE['cpen_bkgcolor']."'";}else{ echo "'". "#E6E9EB"."'";}?>)">
            
            </div></a>		
		
		<a href="?color2=a1efb4"><div id="custom5" onmouseover="previewcustom5()" onmouseout="restore(<?php if(isset($_COOKIE['cpen_bkgcolor'])){echo "'".$_COOKIE['cpen_bkgcolor']."'";}else{ echo "'". "#E6E9EB"."'";}?>)">
            
            </div></a>	
		
		<a href="?color2=eeeeee"><div id="custom6" onmouseover="previewcustom6()" onmouseout="restore(<?php if(isset($_COOKIE['cpen_bkgcolor'])){echo "'".$_COOKIE['cpen_bkgcolor']."'";}else{ echo "'". "#E6E9EB"."'";}?>)">
            
            </div></a>		
				
			
			</div>
		
		<?php
			if(isset($_GET['color'])){
				setcookie('cpen_bkgcolor', $_GET['color'],time() + (10 * 365 * 24 * 60 * 60) , "/");
				header("refresh:1, home.php");
				exit;
			}
			
			if(isset($_GET['color2'])){
				setcookie('cpen_bkgcolor', '#'.$_GET['color2'],time() + (10 * 365 * 24 * 60 * 60) , "/");
				header("refresh:1, home.php");
				exit;
			}
		?>
    </div>
       <?php
	   /*
	   foreach($_SERVER as $value => $data){
		   echo $value . ": " . $data. "<br />";
	   }
	   */
	   ?>
	   
<?php
	include 'includes/footer.php';
?>    