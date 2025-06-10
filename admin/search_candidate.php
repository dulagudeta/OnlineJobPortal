<?php
function search_candidate($conn, $keyword): array
{
    $searched_candidates = [];
    $sql = "SELECT u.*, c.* FROM users u 
            INNER JOIN candidates c ON u.id = c.candidate_id 
            WHERE u.name LIKE '%$keyword%' 
               OR u.email LIKE '%$keyword%'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $searched_candidates[] = [
                'id' => $row['id'],
                'profile'=> $row['profile_picture'],
                'name' => $row['name'],
                'email' => $row['email'],
                'resume' => $row['resume'],
                'contact' => $row['phone'],
                'nationality' => $row['country'],
                'address' => $row['address'],
                'created_at' => $row['created_at'],
                'education' => $row['education'],
                'gender' => $row['gender'],
            ];
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    return $searched_candidates;
}

?>