<?php
include "../config/db.php";
include "../functions/activity_log.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Job Portal Registration</title>
    <link rel="stylesheet" href="../public/css/register.css">
</head>

<body>
    <div class="language-selector">
        <button class="language-btn active" data-lang="en">English</button>
        <button class="language-btn" data-lang="om">Afaan Oromoo</button>
        <button class="language-btn" data-lang="am">አማርኛ</button>
    </div>
    <div class="registration-card">
        <div class="card-header">
            <div class="logo">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </div>
            <h1 data-translate="title">Join Our Talent Network</h1>
            <p data-translate="subtitle">Find your dream job or the perfect candidate</p>
        </div>

        <div class="form-tabs">
            <button class="tab-btn active" id="candidateTab" data-translate="candidate">Candidate</button>
            <button class="tab-btn" id="employerTab" data-translate="employer">Employer</button>
        </div>

        <div class="form-content">
            <?php

            function sanitize($conn, $data)
            {
                return mysqli_real_escape_string($conn, trim($data));
            }

            if (isset($_POST['post-candidate'])) {
                $firstName = sanitize($conn, $_POST['firstName']);
                $lastName = sanitize($conn, $_POST['lastName']);
                $name = $firstName . ' ' . $lastName;
                $email = sanitize($conn, $_POST['email']);
                $passwordRaw = $_POST['password'];
                $confirmPassword = $_POST['confirmPassword'];
                $errors = [];

                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errors[] = "Email is not valid";
                }

                if (strlen($passwordRaw) < 8) {
                    $errors[] = "Password must be at least 8 characters";
                }

                if ($passwordRaw !== $confirmPassword) {
                    $errors[] = "Passwords do not match";
                }

                $query = "SELECT * FROM users WHERE email='$email'";
                $result = mysqli_query($conn, $query);
                if (mysqli_num_rows($result) > 0) {
                    $errors[] = "Email already exists!";
                }

                if (!empty($errors)) {
                    foreach ($errors as $err) {
                        echo "<div class='php-alerts'>$err</div>";
                    }
                } else {
                    $password = password_hash($passwordRaw, PASSWORD_DEFAULT);
                    $query = "INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$password', 'candidate')";
                    $result = mysqli_query($conn, $query);
                    if ($result) {
                        $user_id = mysqli_insert_id($conn);
                        $activity = "New candidate registered";
                        log_activity($user_id, $activity, $conn);
                        echo "<script>
                        alert('Registration successful!');
                        window.location.href = 'login.php';
                        </script>";
                    } else {
                        echo "<script>alert('Registration failed!');</script>";
                    }
                }
            } elseif (isset($_POST['post-employer'])) {
                $companyName = sanitize($conn, $_POST['companyName']);
                $email = sanitize($conn, $_POST['email']);
                $passwordRaw = $_POST['password'];
                $confirmPassword = $_POST['confirmPassword'];
                $errors = [];

                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errors[] = "Email is not valid";
                }

                if (strlen($passwordRaw) < 8) {
                    $errors[] = "Password must be at least 8 characters";
                }

                if ($passwordRaw !== $confirmPassword) {
                    $errors[] = "Passwords do not match";
                }

                $query = "SELECT * FROM users WHERE email='$email'";
                $result = mysqli_query($conn, $query);
                if (mysqli_num_rows($result) > 0) {
                    $errors[] = "Email already exists!";
                }

                if (!empty($errors)) {
                    foreach ($errors as $err) {
                        echo "<div class='php-alerts'>$err</div>";
                    }
                } else {
                    $password = password_hash($passwordRaw, PASSWORD_DEFAULT);
                    $query = "INSERT INTO users (name, email, password, role) VALUES ('$companyName', '$email', '$password', 'company')";
                    $result = mysqli_query($conn, $query);
                    if ($result) {
                        $user_id = mysqli_insert_id($conn);
                        $activity = "New company registered";
                        log_activity($user_id, $activity, $conn);
                        echo "<script>
                        alert('Registration successful!');
                        window.location.href = 'login.php';
                        </script>";
                    } else {
                        echo "<script>alert('Registration failed!');</script>";
                    }
                }
            }
            ?>

            <div id="candidateForm" class="form-container active">
                <form id="candidateFormEl" method="post" autocomplete="on">
                    <div class="php-alerts" id="error-message"></div>
                    <div class="form-grid">
                        <div class="form-group">
                            <label data-translate="first_name">First Name</label>
                            <input type="text" name="firstName" required>
                        </div>
                        <div class="form-group">
                            <label data-translate="last_name">Last Name</label>
                            <input type="text" name="lastName" required>
                        </div>
                        <div class="form-group full-width">
                            <label data-translate="email">Email</label>
                            <input type="email" name="email" required>
                        </div>
                        <div class="form-group full-width">
                            <label data-translate="password">Password</label>
                            <div class="password-container">
                                <input type="password" name="password" id="candidatePassword" required>
                                <button type="button" class="toggle-password" onclick="togglePassword('candidatePassword', this)">Show</button>
                            </div>
                        </div>
                        <div class="form-group full-width">
                            <label data-translate="confirm_password">Confirm Password</label>
                            <div class="password-container">
                                <input type="password" name="confirmPassword" id="candidateConfirmPassword" required>
                                <button type="button" class="toggle-password" onclick="togglePassword('candidateConfirmPassword', this)">Show</button>
                            </div>
                        </div>
                    </div>
                    <button class="submit-btn" type="submit" data-translate="register_candidate" name="post-candidate">Register as Candidate</button>
                    <div class="login-link">
                        <span data-translate="login">Aready have an account?</span> <a href="../auth/login.php" data-translate="signup_link">Login</a>
                    </div>
                </form>
            </div>
            <div id="employerForm" class="form-container">
                <form id="employerFormEl" method="post" autocomplete="on">
                    <div class="php-alerts" id="error-message"></div>
                    <div class="form-grid">
                        <div class="form-group full-width">
                            <label data-translate="company_name">Company Name</label>
                            <input type="text" name="companyName" required>
                        </div>
                        <div class="form-group full-width">
                            <label data-translate="email">Email</label>
                            <input type="email" name="email" required>
                        </div>
                        <div class="form-group full-width">
                            <label data-translate="password">Password</label>
                            <div class="password-container">
                                <input type="password" name="password" id="employerPassword" required>
                                <button type="button" class="toggle-password" onclick="togglePassword('employerPassword', this)">Show</button>
                            </div>
                        </div>
                        <div class="form-group full-width">
                            <label data-translate="confirm_password">Confirm Password</label>
                            <div class="password-container">
                                <input type="password" name="confirmPassword" id="employerConfirmPassword" required>
                                <button type="button" class="toggle-password" onclick="togglePassword('employerConfirmPassword', this)">Show</button>
                            </div>
                        </div>
                    </div>
                    <button class="submit-btn" type="submit" data-translate="register_employer" name="post-employer">Register as Employer</button>
                    <div class="login-link">
                        <span data-translate="login">Aready have an account?</span> <a href="../auth/login.php" data-translate="signup_link">Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="../public/js/register.js"></script>
</body>

</html>