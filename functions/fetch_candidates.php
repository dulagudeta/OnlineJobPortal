<?php
function fetch_candidates($conn) : array {
    $candidate = [];
    $sql = "SELECT u.name, u.email, u.id AS candidate_id, c.*
    FROM users u 
    INNER JOIN candidates c ON u.id = c.candidate_id 
    WHERE u.role = 'candidate' 
    ORDER BY u.created_at DESC";

    
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $candidate[] = [
                'id' => $row['candidate_id'],
                'name' => $row['name'],
                'email' => $row['email'],
                'contact' => $row['phone'],
                'address' => $row['address'],
                'field' => $row['field'],
                'gender' => $row['gender'],
                'profile' => $row['profile_picture'],
                'education' => $row['education'],
                'nationality' => $row['country']
            ];
        }
    }

    return $candidate;
}
?>
