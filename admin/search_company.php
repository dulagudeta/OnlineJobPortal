<?php
function search_company($conn, $keyword): array
{
    $searched_companies = [];
    $sql = "SELECT u.*, c.* FROM users u 
            INNER JOIN company c ON u.id = c.company_id 
            WHERE u.name LIKE '%$keyword%' 
               OR u.email LIKE '%$keyword%' 
               OR c.website LIKE '%$keyword%'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $searched_companies[] = [
                'id' => $row['id'],
                'name' => $row['name'],
                'email' => $row['email'],
                'website' => $row['website'],
                'logo' => $row['logo'],
                'contact' => $row['contact'],
                'location' => $row['location'],
                'created_at' => $row['created_at'],
                'industry' => $row['industry'],
            ];
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    return $searched_companies;
}
