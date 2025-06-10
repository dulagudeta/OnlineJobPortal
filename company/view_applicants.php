<?php
include 'header.php';
if(isset($_GET['job_id'])){
    $job_id = $_GET['job_id'];
}

$sql = "SELECT 
            u.name,
            u.email, 
            a.cover_letter,
            a.application_date,
            c.*
        FROM 
            users u
        INNER JOIN 
            applicants a ON u.id = a.candidate_id
        INNER JOIN
            candidates c ON c.id = a.candidate_id
        WHERE
            a.job_id = '$job_id'";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Database error: " . mysqli_error($conn));
}
?>

<div class="container">
    <h1>Candidates Management</h1>
    
    <div class="search-section">
        <h2>Search Candidates</h2>
        <form method="GET" class="search-form">
            <input type="text" name="search" placeholder="Search by name, email, or skills..." 
                   value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
            <button type="submit" class="btn btn-detail">Search</button>
        </form>
    </div>
    
    <div class="table-responsive">
        <table class="candidate-list">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Nationality</th>
                    <th>Address</th>
                    <th>Gender</th>
                    <th>Education</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $counter = 1;
                
                while ($applicant = mysqli_fetch_assoc($result)) {
                    echo '<tr>
                            <td>'.$counter.'</td>
                            <td><img src="'.(!empty($applicant['profile_picture']) ? '../uploads/images/'.$applicant['profile_picture'] : 'https://randomuser.me/api/portraits/'.($applicant['gender'] == 'Female' ? 'women' : 'men').'/'.$counter.'.jpg').'" alt="Profile" class="profile-pic"></td>
                            <td>'.htmlspecialchars($applicant['name']).'</td>
                            <td>'.htmlspecialchars($applicant['email']).'</td>
                            <td>'.htmlspecialchars($applicant['country']).'</td>
                            <td>'.htmlspecialchars($applicant['address'].', '.$applicant['address']).'</td>
                            <td>'.$applicant['gender'].'</td>
                            <td>'.htmlspecialchars($applicant['education']).'</td>
                            <td>
                                <button class="btn btn-detail" onclick="toggleDetail('.$counter.')">Details</button>
                            </td>
                          </tr>';
                    echo '<tr id="detail-'.$counter.'" class="detail-panel">
                            <td colspan="9">
                                <div class="detail-grid">
                                    <div class="detail-photo">
                                        <img src="'.(!empty($applicant['profile_picture']) ? '../uploads/images/'.$applicant['profile_picture'] : 'https://randomuser.me/api/portraits/'.($applicant['gender'] == 'Female' ? 'women' : 'men').'/'.$counter.'.jpg').'" alt="Profile Photo">
                                    </div>
                                    
                                    <div class="detail-item">
                                        <span class="detail-label">Full Name:</span>
                                        '.htmlspecialchars($applicant['name']).'
                                    </div>
                                    
                                    <div class="detail-item">
                                        <span class="detail-label">Email:</span>
                                        '.htmlspecialchars($applicant['email']).'
                                    </div>
                                    
                                    <div class="detail-item">
                                        <span class="detail-label">Phone:</span>
                                        '.htmlspecialchars($applicant['phone']).'
                                    </div>
                                    
                                    <div class="detail-item">
                                        <span class="detail-label">Country:</span>
                                        '.htmlspecialchars($applicant['country']).'
                                    </div>
                                    
                                    <div class="detail-item">
                                        <span class="detail-label">Address:</span>
                                        '.htmlspecialchars($applicant['address'].', '.$applicant['address']).'
                                    </div>
                                    
                                    <div class="detail-item">
                                        <span class="detail-label">Field:</span>
                                        '.htmlspecialchars($applicant['field']).'
                                    </div>
                                    
                                    <div class="detail-item">
                                        <span class="detail-label">Experience:</span>
                                        '.htmlspecialchars($applicant['experience']).' years
                                    </div>
                                    
                                    <div class="detail-item">
                                        <span class="detail-label">Education:</span>
                                        '.htmlspecialchars($applicant['education'].' in '.$applicant['field']).'
                                    </div>
                                    
                                    <div class="detail-item">
                                        <span class="detail-label">Gender:</span>
                                        '.$applicant['gender'].'
                                    </div>';

                    
                    echo '<div class="detail-item">
                            <span class="detail-label">Resume:</span>';
                    if (!empty($applicant['resume'])) {
                        echo '<a href="../uploads/resumes/'.$applicant['resume'].'" class="resume-link" target="_blank">Download Resume</a>';
                    } else {
                        echo 'Not available';
                    }
                    echo '</div>';
                    
                    echo '<div class="summary">
                            <span class="detail-label">Professional Summary:</span>
                            <p>'.(!empty($applicant['summary']) ? nl2br(htmlspecialchars($applicant['summary'])) : 'No summary provided').'</p>
                          </div>
                          <div class="summary">
                            <span class="detail-label">Cover letter:</span>
                            <p>'.(!empty($applicant['cover_letter']) ? nl2br(htmlspecialchars($applicant['cover_letter'])) : 'No cover_letter provided').'</p>
                          </div>
                        </div>
                      </td>
                    </tr>';
                    
                    $counter++;
                }
                
                if ($counter == 1) {
                    echo '<tr><td colspan="9" style="text-align:center;">No applicants found</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    function toggleDetail(id) {
        const detailPanel = document.getElementById(`detail-${id}`);
        const allPanels = document.querySelectorAll('.detail-panel');
    
        allPanels.forEach(panel => {
            if (panel.id !== `detail-${id}`) {
                panel.style.display = 'none';
            }
        });
        
        if (detailPanel.style.display === 'table-row') {
            detailPanel.style.display = 'none';
        } else {
            detailPanel.style.display = 'table-row';
            
            detailPanel.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        }
    }
</script>

<?php
include 'footer.php';
?>