<?php
function log_activity($user_id, $activity,$conn){
    $sql = "INSERT INTO activity_logs (user_id, action) VALUES ('$user_id', '$activity')";
    $result = mysqli_query($conn, $sql);
    if($result){
        return true;
    } else {
        return false;
    }
}

?>