<?php
include 'header.php';
include 'search_company.php';
?>
<div>
    <div class="panel-header">
        <h1>Company Detail</h1>
    </div>

    <div class="search-container">
        <h2>Search Company</h2>
        <form method="post" action="" class="tab-content">
            <input type="search" name="keyword" placeholder="Search by Company name, Company website..." required>
            <button type="submit" name="search" class="search-btn"><i class="fas fa-search"></i> Search</button>
        </form>

    </div>

    <div class="table-wrapper">
        <table>
        <tr>
            <th>Company Logo</th>
            <th>Company Name</th>
            <th>Email</th>
            <th>Location</th>
            <th>Website</th>
            <th>Contact Tel</th>
            <th colspan="2">Operation</th>
        </tr>
        <?php
        $empty = 'No companies registered yet.';
        if (isset($_POST['search'])) {
            $keyword = $_POST['keyword'];
            $companies = search_company($conn, $keyword);
            if (empty($companies)) {
                $empty = "No companies found for the keyword: " . htmlspecialchars($keyword);
            }
        } else {
            $companies = fetch_companies($conn);
        }
        if (!empty($companies)) {
            foreach ($companies as $company) {
                echo '
                   <tr>
                        <td><img src="../uploads/images/' . $company['logo'] . '" alt="Company Logo"></td>
                        <td>' . $company['name'] . '</td>
                        <td>' . $company['email'] . '</td>
                        <td>' . $company['location'] . '</td>
                        <td>' . $company['website'] . '</td>
                        <td>' . $company['contact'] . '</td>
                        <td><a href="company_detail.php?company_id=' . $company['id'] . '" data-translate="delete-job" class="view-applicants">See</a></td>
                        <td><a href="?company_id=' . $company['id'] . '&confirm=true" data-translate="delete-job" class="view-applicants" onclick="return confirm(\'Are you sure you want to delete this company?\')">Remove</a></td>
                    </tr>
                   ';
            }
        } else {
            echo "<tr><td colspan='4'>".$empty."</td></tr>";
        }

        ?>
    </table>
    </div>
    <?php
    if(isset($_GET['company_id']) && isset($_GET['confirm']) && $_GET['confirm'] == 'true'){
        delete_company($conn,$company['id']);
        header("Location: " . str_replace("&confirm=true", "", $_SERVER['REQUEST_URI']));
        exit();
    }
    ?>
</div>
<?php include 'footer.php'; ?>