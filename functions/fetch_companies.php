<?php
function fetch_companies($conn) {
    $company_list = [];
    $sql = "SELECT 
                u.id AS user_id,
                u.name AS company_name,
                u.email AS company_email,
                c.logo AS company_logo,
                c.contact AS company_contact,
                c.description AS company_description,
                c.website AS company_website,
                c.location AS company_location,
                c.created_at AS company_created_at
            FROM users u
            INNER JOIN company c ON u.id = c.company_id
            WHERE u.role = 'company'
            ORDER BY c.created_at DESC";

    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $company_list[] = [
                'id' => $row['user_id'],
                'name' => $row['company_name'],
                'email' => $row['company_email'],
                'logo' => $row['company_logo'],
                'description' => $row['company_description'],
                'website' => $row['company_website'],
                'location' => $row['company_location'],
                'contact'=>$row['company_contact'],
                'created_at' => $row['company_created_at'],
            ];
        }
    }
    return $company_list;
}
?>