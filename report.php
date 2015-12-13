<?php
    include 'includes/header.php';
?>
    <div class="right">
        <div id="content">
            
        <?php
            
            $result = get_user_for_report_by_id_and_date($_SESSION['userid']);
			
			$report = $result->fetch(PDO::FETCH_ASSOC);
			
            //$check = $result->fetch(PDO::FETCH_ASSOC);
			
            if(!isset($report) || $report == FALSE){
                //enter all 0
                $userid = $_SESSION['userid'];
                $currtime = date("H:i:s", time());
				
                $query = "INSERT INTO report (id, user_id, vmails, calls, remotes, sl, mails, date, time) 
                                          VALUES (NULL, ?, 0, 0, 0, 0, 0, '{$_SESSION["currentdate"]}', '$currtime')";

								
                query($query, $userid, PDO::PARAM_INT);
				
            }
        ?>
            
            <form class="report">
		<table>
                    <tr>
			<td>Voice mails:</td>
                        <td><input type="radio" name="vmails" value="0" 
                            <?php 
                            if($report["vmails"] == 0){
                                echo "checked";
                            }
                            ?> 
                        /> No
                        &nbsp;
			</td>
                        <td><input type="radio" name="vmails" value="1" 
                            <?php 
                                if($report["vmails"] == 1){
                                    echo "checked";
                                }
                            ?>
                        /> Yes
                        </td>
                    </tr>
                    <tr>
			<td>Calls:</td>
                        <td colspan="2" >
                            <input type="number" name="calls" value="<?php echo $report["calls"]; ?>" id="calls"/>
                        </td>
                    </tr>
                    <tr>
			<td>Remotes:</td>
                        <td colspan="2" >
                            <input type="number" name="remotes" value="<?php echo $report["remotes"]; ?>" id="remotes" />
                        </td>
                    </tr>
                    <tr>
			<td>Support logs:</td>
                        <td>
                            <input type="radio" name="sl" value="0" 
                            <?php 
                                if($report["sl"] == 0){
                                echo "checked";
                            }
                            ?>  
                            /> No
                            &nbsp;
                        </td>
                        <td>
                            <input type="radio" name="sl" value="1" 
                            <?php 
                                if($report["sl"] == 1){
                                echo "checked";
                            }
                            ?>   
                            /> Yes
                        </td>
                    </tr>
                    <tr>
			<td>Mails:</td>
                        <td>
                            <input type="radio" name="mails" value="0" 
                            <?php 
                                if($report["mails"] == 0){
                                echo "checked";
                                }
                            ?>   
                            /> No
                            &nbsp;
                        </td>
                        <td>
                            <input type="radio" name="mails" value="1" 
                            <?php 
                                if($report["mails"] == 1){
                                echo "checked";
                                }
                            ?>   
                            /> Yes
                        </td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="submit" value="Generate" /></td>
                        <td colspan="2" ><input type="submit" name="clear" value="Clear" /></td>
                    </tr>
                </table>
            </form>
        
        <div id="reptemp">
            
            <?php
            
            $temp = "<table><tr><td>Report:<br />
                    I did tickets";
            
            if($report["vmails"] !=0){
                if($report["calls"] + $report["remotes"] + $report["sl"] + $report["mails"] != 0){
                    $temp .= ", voice mails";
                }else{
                    $temp .= " and voice mails";
                }
            } 
            
            if($report["calls"] !=0){
                if($report["remotes"] + $report["sl"] + $report["mails"] != 0){
                    if($report["calls"] > 1){
                        $temp .= ", ". $report["calls"]." calls";
                    }else{
                        $temp .= ", ". $report["calls"]." call";
                    }
                }else{
                    if($report["calls"] > 1){
                        $temp .= " and ". $report["calls"]." calls";
                    }else{
                        $temp .= " and ". $report["calls"]." call";
                    }
                }
            }
            
            if($report["remotes"] != 0){
                if($report["sl"] + $report["mails"] != 0){
                    if($report["remotes"] > 1){
                        $temp .= ", ". $report["remotes"]." remotes";
                    }else{
                        $temp .= ", ". $report["remotes"]." remote";
                    }
                }else{
                    if($report["remotes"] > 1){
                        $temp .= " and ". $report["remotes"]." remotes";
                    }else{
                        $temp .= " and ". $report["remotes"]." remote";
                    }
                }
            }
            
            if($report["sl"] != 0){
                if($report["mails"] != 0){
                    $temp .= ", support logs";
                }else{
                    $temp .= " and support logs";
                }
            }
            
            if($report["mails"] !=0){
                $temp .= " and mailboxes"; 
            }
            
            $temp .= ".</td></tr></table>";
            
            echo $temp;
           
            // Update Report
            if(isset($_GET["submit"])){
				$ctime = date("H:i:s", time());
                $query = "UPDATE report SET vmails = '{$_GET["vmails"]}', calls = '{$_GET["calls"]}', remotes = '{$_GET["remotes"]}', 
                sl = '{$_GET["sl"]}', mails = '{$_GET["mails"]}', time = '{$ctime}' WHERE user_id = {$_SESSION['userid']} AND date='{$_SESSION["currentdate"]}'";
                
				$upd = query($query);
                $rows = $upd->rowCount();
                if($rows != 0){
                    
                    echo "<script type=\"text/JavaScript\">
                        <!--
                        setTimeout(\"location.href = 'report.php';\",3);
                        -->
                        </script>";
                    exit; 
                }else{
                    echo "Sorry! Somtething is wrong... (0 rows updated).";
                }
            }
            
            if(isset($_GET["clear"])){
                
            
                $query = "update report set vmails = '0', calls = '0', remotes = '0', 
                sl = '0', mails = '0' where user_id = {$_SESSION['userid']}";
                
                $upd = query($query);
                $rows = $upd->rowCount();
                if($rows != 0){
                    
                    echo "<script type=\"text/JavaScript\">
                        <!--
                        setTimeout(\"location.href = 'report.php';\",3);
                        -->
                        </script>";
                    exit;
                
                }else{
                    echo "Sorry! Somtething is wrong... (0 rows updated, report not cleared).";
                }
            }
              
            ?>
			
	</div>
	</div>
				
    </div>
</div>
        
<?php
    include 'includes/footer.php';
?>    