<?php

function query($query, $bind=NULL, $strorint=NULL){
    global $db;

    try{
        $result = $db->prepare($query);
        if(isset($bind)){
            $result->bindParam(1, $bind, $strorint);
        }
        $result->execute();
    }catch(Exception $e){
        echo $e->getMessage();
        die();
    }

    return $result;
}

function mysql_prep($value){
    
    global $db;
    $magic_quotes_active = get_magic_quotes_gpc();
    $new_enough_php = function_exists("mysqli_real_escape_string");
    
    if($new_enough_php){
        if($magic_quotes_active){
            $value = stripslashes($value);
        }
        $value = mysqli_real_escape_string($db, $value);
    }else{
        if(!$magic_quotes_active){
            $value = addslashes($value);
        }
    }
    return $value;
}

function confirm_query($result_set){
    global $db;
    if(!$result_set){
        die("Query failed: " . mysqli_error($connection));
    }
}

function generate_remote_temp($id){
    $rem_id = intval($id);
    $results = query('SELECT * FROM remotes WHERE id= ?', $id, PDO::PARAM_INT);
    $ses_row = $results->fetch(PDO::FETCH_ASSOC);
    
    if($ses_row == FALSE){
        echo 'Sorry, no session found with this ID.';
        die();
    }
    
    if($ses_row['user_id'] == 6){

        // for zlatin
        echo "<p>I have scheduled the remote session at ";

        // displays time
        echo date("g", strtotime($ses_row["time"])). date("A", strtotime($ses_row["time"])). " ".$ses_row["zone"]. " ";
        //displays day of the week
        echo "on ". date("l", strtotime($ses_row["date"])) .", ";
        //display date
        echo date("m", strtotime($ses_row["date"]));
        echo "/".date("d", strtotime($ses_row["date"]));
        echo "/".date("y", strtotime($ses_row["date"]));
        echo ". ";

        echo "Please make sure to send me the ID and PWD from the ESG Remote Support tool an hour to thirty minutes earlier prior to the remote session to my e-mail address: ethan@enigmasoftware.com.</p>";

        echo "<p>Bear in mind that the ID and PWD change every time you run the ESGRemoteSupport Tool.</p>";

        //--------------
    }else{
        echo "<p>The remote session is scheduled for ";
        echo date("l", strtotime($ses_row["date"]));
        echo " ".date("j", strtotime($ses_row["date"]));

        if(date("d", strtotime($ses_row["date"]))== 1 
                        || date("d", strtotime($ses_row["date"]))== 21 
                        || date("d", strtotime($ses_row["date"])) == 31){

                echo "st";

        }elseif (date("d", strtotime($ses_row["date"]))== 2 
                        || date("d", strtotime($ses_row["date"]))== 22) {

                echo "nd";
        }elseif (date("d", strtotime($ses_row["date"]))== 3 
                        || date("d", strtotime($ses_row["date"]))== 23) {

                echo "rd";
        }else{
           echo "th"; 
        }

        echo " of ".date("F", strtotime($ses_row["date"]))." ".date("Y",strtotime($ses_row["date"]));
        echo " at ".$ses_row["time"]. " ".$ses_row["zone"];


        echo "<p>We need our remote support tool to be left opened and running at least 30 min before our scheduled time and to be provided with the ID and the Password from it.</p>";

        echo "<p>Note that every time you open the tool, it should change its password.</p>";
    }
}

function resolve_remote($finid, $email){
    $result = query('update remotes set done=1 where id= ?', $finid, PDO::PARAM_INT);
    $rows = $result->rowCount();
	
    if($rows != 0){
        $msg = "<center>Done!!! Remote session for ". $email . " has been set to Resolved!</center>";
        $_SESSION['msg'] = $msg;
		
    }else{
	$msg = "<center>Sorry mate! Something is not right!</center>";
        $_SESSION['msg'] = $msg;
    }
}

function query_remotes_by_user_id($id=0){
    $id = intval($id);

    $query = "SELECT * FROM remotes 
                    WHERE done=0 AND user_id={$id}
                    UNION
                    SELECT * FROM remotes 
                    WHERE done=3 AND user_id={$id}
                    ORDER BY date, bgtime asc limit 10";

    $results = query($query);
    return $results;
}

function query_remotes_done_by_user_id($id=0){
    $result = query('SELECT * FROM remotes WHERE done=1 and user_id= ? ORDER BY date DESC, bgtime DESC LIMIT 5', $id, PDO::PARAM_INT);
    return $result;
}

function query_all_remotes($id=0){
    $result = query('SELECT * FROM remotes WHERE id= ?', $id, PDO::PARAM_INT);
    return $result;
}

function update_res_remotes($id=0){
    
    global $res_date;
    global $res_time;
    global $res_zone;
    global $res_bgtime;
    global $res_problem;

    $query = "UPDATE remotes
            SET date='{$res_date}',
            time='{$res_time}',
            zone='{$res_zone}',
            bgtime='{$res_bgtime}',
            done=3,
            problem='{$res_problem}'
            WHERE id='{$id}'";

    $upd = query($query);
    return $upd;
}

function get_user_for_report_by_id($id=0){
    $query = "SELECT * FROM report WHERE user_id= ?";
    $result = query($query, $id, PDO::PARAM_INT);
    return $result;
}

function get_user_for_report_by_id_and_date($id=0){
    $currdate = date("Y-m-d");
	$id = intval($id);
    $query = "SELECT * FROM report WHERE user_id={$id} AND date='{$currdate}'";
    $result = query($query);
	
    return $result;
}

function upd_reports($userid=0){
    $today = date("Y-m-d");
    $currtime = date("H:i:s", time());
				
    $query = "INSERT INTO report (user_id, vmails, calls, remotes, sl, mails, date, time) 
				VALUES ($userid, 0, 0, 0, 0, 0, '$today', '$currtime')";
                            
    query($query);
}
?>

