<?php

function fetch_jobs($conn, $company_id)
{
    $job_list = array();
    $sql = "SELECT * FROM jobs WHERE company_id='$company_id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $job_list[] = array(
                'id' => $row['id'],
                'title' => $row['title'],
                'location' => $row['location'],
                'description' => $row['description'],
                'salary' => $row['salary'],
                'type' => $row['type'],
                'skill' => $row['skill'],
                'deadline' => $row['deadline']
            );
        }
    }
    return $job_list;
}
?>