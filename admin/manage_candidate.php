<?php include 'header.php';
include 'search_candidate.php';
?>
<div id="candidates" >
     <div class="panel-header">
         <h1>Candidates Detail</h1>
     </div>

     <div class="search-container">
         <h2>Search Candidate</h2>
         <form method="post" action="">
             <input type="search" name="keyword" placeholder="Search by name, email..." required>
             <button type="submit" name="search" class="search-btn"><i class="fas fa-search"></i> Search</button>
         </form>
     </div>

     <div class="table-wrapper">
        <table>
         <tr>
             <th>Profile Picture</th>
             <th>Name</th>
             <th>Email</th>
             <th>Nationality</th>
             <th>Address</th>
             <th>Gender</th>
             <th>Education Level</th>
             <th colspan="2">Operation</th>
         </tr>
         <?php
         $empty='No candidates registered yet.';
         if(isset($_POST['search'])) {
             $keyword = $_POST['keyword'];
             $candidates = search_candidate($conn, $keyword);
             if (empty($candidates)) {
                 $empty = "No candidates found for the keyword: " . htmlspecialchars($keyword);
             }
         } else {
            $candidates = fetch_candidates($conn);
            }
            if (!empty($candidates)) {
                foreach ($candidates as $candidate) {
                    echo '<tr>
            <td><img src="../uploads/images/' . htmlspecialchars($candidate['profile']) . '" alt="Profile Picture" style="width:50px;height:50px;"></td>
            <td>' . htmlspecialchars($candidate['name']) . '</td>
            <td>' . htmlspecialchars($candidate['email']) . '</td>
            <td>' . htmlspecialchars($candidate['nationality']) . '</td>
            <td>' . htmlspecialchars($candidate['address']) . '</td>
            <td>' . htmlspecialchars($candidate['gender']) . '</td>
            <td>' . htmlspecialchars($candidate['education']) . '</td>
            <td><a href="candidate_detail.php?candidate_id=' . $candidate['id'] . '" data-translate="delete-job" class="view-applicants">See</a></td>
            <td><a href="?candidate_id=' . $candidate['id'] . '&confirm=true" data-translate="delete-job" class="view-applicants" onclick="return confirm(\'Are you sure you want to delete this candidate?\')">Remove</a></td>
            
        </tr>';
                }
            } else {
                echo "<tr><td colspan='9'>".$empty."</td></tr>";
            }            ?>

     </table>

     </div>
     <?php
     if(isset($_GET['candidate_id']) && isset($_GET['confirm']) && $_GET['confirm'] == 'true'){
        delete_user($conn,$candidate['id']);
        header("Location: " . str_replace("&confirm=true", "", $_SERVER['REQUEST_URI']));
        exit();
    }
     ?>
 </div>
 <?php include 'footer.php'; ?>