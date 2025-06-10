<?php include 'header.php' ?>
<div id="profile" >
     <div class="panel-header">
         <h1>Update Your Profile</h1>
     </div>

     <div class="form-container">
         <form method="post" action="update_profile.php" enctype="multipart/form-data">
             <h2>Profile Information</h2>
             <?php
                $admin_id = $_SESSION['admin_id'];
                $sql = "SELECT * FROM users WHERE id='$admin_id'";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    $admin = mysqli_fetch_assoc($result);
                } else {
                    echo "Error fetching profile information: " . mysqli_error($conn);
                }
                ?>
             <div style="text-align: center; margin-bottom: 20px;">
                 <img src="../uploads/images/admin.jpeg" alt="Profile Picture" style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover; border: 3px solid rgba(100, 149, 237, 0.3);">
             </div>
             <label for="name">Full name</label>
             <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($admin['name']); ?>">
             <label for="email">Email</label>
             <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($admin['email']); ?>">
             <label for="password">Reset Password</label>
             <input type="password" id="password" name="password" placeholder="Enter new password">
             <input type="submit" value="Update Profile" name="update-profile" class="btn">
         </form>
     </div>
</div>
<?php include 'footer.php'; ?>