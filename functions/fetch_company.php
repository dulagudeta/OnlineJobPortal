<?php
function fetch_company($conn) :array {
    $company_list = [];

    $sql = "SELECT 
                u.id AS user_id,
                u.name AS company_name,
                u.email AS company_email,
                c.logo AS company_logo,
                c.contact,
                c.location,
                c.industry,
                c.website,
                c.description,
                c.created_at AS company_created_at,
                c.updated_at AS company_updated_at,
                u.created_at AS user_created_at
            FROM users u
            INNER JOIN company c ON u.id = c.company_id
            WHERE u.role = 'company'
            ORDER BY u.created_at DESC";

    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $company_list[] = [
                'user_id' => $row['user_id'],
                'name' => $row['company_name'],
                'email' => $row['company_email'],
                'logo' => $row['company_logo'],
                'contact' => $row['contact'],
                'location' => $row['location'],
                'website' => $row['website'],
                'description' => $row['description'],
                'industry' => $row['industry'],
                'company_created_at' => $row['company_created_at'],
                'user_created_at' => $row['user_created_at'],
                'company_updated_at' => $row['company_updated_at'],
            ];
        }
    }
    return $company_list;
}

?>