<?php 
function fetch_jobs($conn,$role){
    if($role=='admin'){
        $job_list = [];
    $sql = "SELECT 
                j.id AS job_id,
                j.title,
                j.location,
                j.description,
                j.salary,
                j.type,
                j.skill,
                j.deadline,
                j.created_at,
                u.name AS company_name,
                u.email AS company_email,
                c.logo AS company_logo
            FROM jobs j
            INNER JOIN users u ON j.company_id = u.id
            INNER JOIN company c ON u.id = c.company_id
            ORDER BY j.created_at DESC";
    }else{
    $job_list = [];
    $sql = "SELECT 
                j.id AS job_id,
                j.title,
                j.location,
                j.description,
                j.salary,
                j.type,
                j.skill,
                j.deadline,
                j.created_at,
                u.name AS company_name,
                u.email AS company_email,
                c.logo AS company_logo
            FROM jobs j
            INNER JOIN users u ON j.company_id = u.id
            INNER JOIN company c ON u.id = c.company_id
            ORDER BY j.created_at DESC WHERE j.status='approved'";
    }
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $job_list[] = [
                'id' => $row['job_id'],
                'title' => $row['title'],
                'location' => $row['location'],
                'description' => $row['description'],
                'salary' => $row['salary'],
                'type' => $row['type'],
                'skill' => $row['skill'],
                'deadline' => $row['deadline'],
                'name' => $row['company_name'],
                'email' => $row['company_email'],
                'logo' => $row['company_logo'],
                'created_at' => $row['created_at'],
            ];
        }
    }
    return $job_list;
}

?>