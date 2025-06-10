<?php
session_start();
include_once '../config/db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Job Portal</title>
    <link rel="stylesheet" href="../public/css/login.css">
</head>

<body>
    <div class="language-selector">
        <button class="language-btn active" data-lang="en">English</button>
        <button class="language-btn" data-lang="om">Afaan Oromoo</button>
        <button class="language-btn" data-lang="am">አማርኛ</button>
    </div>

    <div class="login-card">
        <div class="card-header">
            <h1 data-translate="welcome">Welcome Back</h1>
            <p data-translate="login_message">Login to access your account</p>
        </div>

        <div class="form-content">
            <?php
            if (isset($_POST['login'])) {
                $email = $_POST['email'];
                $password = $_POST['password'];
                $error = array();

                if (empty($email) || empty($password)) {
                    array_push($error, "Email and Password are required!");
                } else {
                    $query = "SELECT * FROM users WHERE email='$email'";
                    $result = mysqli_query($conn, $query);
                    if (mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        $role = $row['role'];
                        if ($role == 'company') {
                            if (password_verify($password, $row['password'])) {
                                $sql = "SELECT * FROM company WHERE company_id='$row[id]'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) == 0) {
                                    $query = "INSERT INTO company(company_id) VALUES('$row[id]')";
                                    mysqli_query($conn, $query);
                                    $_SESSION['company_id'] = $row['id'];
                                    echo "<script>
                                    alert('Login Successful!');
                                    window.location.href = '../company/dashboard.php';
                                    </script>";
                                }else {
                                    $_SESSION['company_id'] = $row['id'];
                                    echo "<script>
                                    alert('Login Successful!');
                                    window.location.href = '../company/dashboard.php';
                                    </script>";
                                }

                            } else {
                                array_push($error, "Invalid Password!");
                            }
                        } elseif ($role == 'candidate') {
                            if (password_verify($password, $row['password'])) {
                                $sql = "SELECT * FROM candidates WHERE candidate_id='$row[id]'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) == 0) {
                                    $query = "INSERT INTO candidates(candidate_id) VALUES('$row[id]')";
                                    mysqli_query($conn, $query);
                                    $_SESSION['candidate_id'] = $row['id'];
                                    echo "<script>
                                    alert('Login Successful!');
                                    window.location.href = '../candidate/dashboard.php';
                                    </script>";
                                }else {
                                    $_SESSION['candidate_id'] = $row['id'];
                                    echo "<script>
                                    alert('Login Successful!');
                                    window.location.href = '../candidate/dashboard.php';
                                    </script>";
                                }
                            } else {
                                array_push($error, "Invalid Password!");
                            }
                        } elseif ($role == 'admin') {
                            if ($password == $row['password']) {
                                $_SESSION['admin_id'] = $row['id'];
                                echo "<script>
                                alert('Login Successful!');
                                window.location.href = '../admin/dashboard.php';
                                </script>";
                            } else {
                                array_push($error, "Invalid Password!");
                            }
                        }
                    } else {
                        array_push($error, "Email not found!");
                    }
                }

                if (count($error) > 0) {
                    foreach ($error as $err) {
                        echo "<div class='php-alerts'>$err</div>";
                    }
                }
            }

            ?>
            <form action="login.php" method="POST" id="loginForm">
                <div class="php-alerts" id="error-message"></div>
                <div class="form-group">
                    <label data-translate="email">Email Address</label>
                    <input type="email" required data-translate-placeholder="email_placeholder" placeholder="Enter your email" name="email" id="loginEmail">
                </div>
                <div class="form-group toggle-password">
                    <label data-translate="password">Password</label>
                    <input type="password" id="loginPassword" required data-translate-placeholder="password_placeholder" placeholder="Enter your password" name="password">
                    <button type="button" class="toggle-password-btn" data-translate="show" onclick="togglePassword('loginPassword')">Show</button>
                    <a href="#" class="forgot-password" data-translate="forgot_password">Forgot password?</a>
                </div>
                <button type="submit" class="submit-btn" data-translate="login_button" name="login">Login</button>
                <div class="signup-link">
                    <span data-translate="no_account">Don't have an account?</span> <a href="../auth/register.php" data-translate="signup_link">Sign up</a>
                </div>
            </form>
        </div>
    </div>
    <script src="../public/js/login.js"></script>
</body>

</html>