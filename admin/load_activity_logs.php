<?php 

function load_activities($conn) :array{
    $activities=[];
    $sql = "SELECT * FROM activity_logs ORDER BY logged_at DESC LIMIT 10;
";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            $query = "SELECT name FROM users WHERE id = '".$row['user_id']."'";
            $result2 = mysqli_query($conn, $query);
            $row2 = mysqli_fetch_assoc($result2);
            $activities[] = [
                'id'=>$row['id'],
                'activity'=>$row['action'],
                'user'=>$row2['name'],
                'time'=>$row['logged_at'],
            ];
        }
    }
    return $activities;
}

?>