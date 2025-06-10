<?php 
function delete_job($conn,$id,$session_id){
    $sql = "DELETE FROM jobs WHERE id = $id";
    $result = mysqli_query($conn,$sql);
    if($result){
       $query="SELECT role FROM users WHERE id = $session_id";
       $result = mysqli_query($conn,$query);
       if($result){
        $row = mysqli_fetch_assoc($result);
        $role = $row['role'];   
       }
       if($role == "admin"){
        header("location:../admin/manage_jobs.php");
       }elseif($role == "company"){
        header("location:../company/dashboard.php");
       }else{
        echo "<script>alert('You are not authorized to delete this job');</script>";
       }
    }else{
        die(mysqli_error($conn));
    } 
}
function delete_user($conn,$id){
    $sql = "DELETE FROM users WHERE id = $id";
    $result = mysqli_query($conn,$sql);
    if($result){
        header("location:../admin/manage_candidate.php");
    }
}
function delete_company($conn,$id){
    $sql = "DELETE FROM companies WHERE id = $id";
    $result = mysqli_query($conn,$sql);
    if($result){
        header("location:../admin/manage_company.php");
    }
}
?>