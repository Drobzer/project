<?php
    include 'includes/header.php';
?>
			
    <div class="right">
        <h1><center>Schedule a session</center></h1>

        <?php

            if(isset($_POST['submit'])){

                $errors=array();
                
                //validations
                $required_fields = array('email', 'date', 'time', 'zone', 'bgtime', 'problem');
                foreach($required_fields as $fieldname){
                    if(!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]) && $_POST[$fieldname]== NULL)){
                            $errors[] = $fieldname; 
                    }
                }

                if(empty($errors)){
                    $email = $_POST["email"];
                    $date = $_POST["date"];
                    $time = $_POST["time"];
                    $zone = $_POST["zone"];
                    $bgtime = $_POST["bgtime"];
                    $problem = $_POST["problem"];
                    $userid = $_SESSION['userid'];

                    $query = "insert into remotes (
                                    user_id, email, date, time, zone, bgtime, problem
                              ) values(
                                    '$userid', '{$email}', '$date', '$time', '{$zone}', '$bgtime', '{$problem}'
                              )";

                    //mysqli_query($link, $query);
                    $result = query($query) or die('Invalid query!');
                    $rows = $result->rowCount();
                    
                    if($rows != 0){
                        header("refresh:2;url=view.php");
                        echo "Saved! Redirecting...";
                        exit;
                    }else{
                        echo "<p>ERROR! Not saved!</p>";
                        echo "Please fill all fields! "."Go <a href=\"schedule.php\">Back</a>";

                        if(!empty($errors)){
                            foreach ($errors as $error){
                            echo $error."<br />";
                            }
                        }
                    }
                }
            }else{

            ?>
            <div class="scheduletable">
                <form method="post">
                    <table>
                        <tr>
                        <td><label>Email:</label></td>
                        <td><input type="email" name="email" value="" id="email" required/> 
                        </td>
                        </tr>
                        <tr>
                        <td><label>Date:</label></td>
                                <td><input type="date" name="date" value="" id="date" required
                                <?php //pattern="\d{2}-\d{2}-\d{2}" title="MM-DD-YY" ?> />                
                        </td>
                        </tr>
                        <tr>
                        <td><label>Time:</label></td>
                                <td><input type="time" name="time" value="" id="time" required/>                
                        </td>
                        </tr>
                        <tr>
                        <td><label>Time zone:</label></td>
                                <td><input type="text" name="zone" value="" id="zone" required/>                
                        </td>
                        </tr>
                        <tr>
                        <td><label>BG Time:</label></td>
                                <td><input type="time" name="bgtime" value="" id="bgtime" />                
                        </td>
                        </tr>
                        <tr>
                        <td><label>Problem:</label></td>
                                <td><textarea cols="40" rows="5" name="problem" value="" id="problem" required></textarea>

                        </td>
                        </tr>
                        <tr>
                        <td colspan="2" ><center><input type="submit" name="submit" value="Save" /></center></td>
                        </tr>

                    </table>
                </form>
            </div>
    <?php
    }
    ?>


    </div>
</div>
        
<?php
    include 'includes/footer.php';
?>  