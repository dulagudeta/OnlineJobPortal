<?php include "header.php" ?>

<div class="container">
    <div class="profile-card">
        <div class="header">
            <?php
            $candidate_id = $_GET['candidate_id'];
            $sql = "SELECT u.name,u.email,u.id AS candidate_id,c.*
        FROM users u
        INNER JOIN candidates c ON u.id=c.candidate_id
        WHERE u.id=$candidate_id";
            $result = mysqli_query($conn, $sql);
            $candidate = mysqli_fetch_assoc($result);
            if (!$candidate) {
                echo "Candidate not found";
                exit;
            }
            ?>
            <img src="../uploads/images/<?php echo $candidate['profile_picture'] ?>" alt="Candidate Photo" class="profile-pic" />
            <div>
                <h2><?php echo $candidate['name']; ?></h2>
                <p><?php echo $candidate['field']; ?></p>
                <span class="location">,<i class="icon"></i><?php echo $candidate['country']; ?>,<i class="icon"></i><?php echo $candidate['address']; ?></span>
            </div>
        </div>
        <h3>Contact Information</h3>
        <p><strong>Email:</strong> <?php echo $candidate['email']; ?></p>
        <p><strong>Phone:</strong> <?php echo $candidate['phone']; ?></p>
        <h1>About</h1>
        <p><?php echo $candidate['summary'] ?></p>
    </div>
    <div class="section actions">
        <a href="../uploads/resumes/<?php echo htmlspecialchars($candidate['resume']); ?>" class="view-applicants" target="_blank">See Resume</a>
    </div>
</div>
<?php include "footer.php"; ?>