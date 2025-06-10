<?php
include "../config/db.php";
if (isset($_SESSION['company_id'])) {
    unset($_SESSION['company_id']);
    session_destroy();
    echo "<script>
    alert('Logout successful!'); 
    window.location.href = '../index.php';
    </script>";
} elseif (isset($_SESSION['candidate_id'])) {
    unset($_SESSION['candidate_id']);
    session_destroy();
    echo "<script>
    alert('Logout successful!');
    window.location.href = '../index.php';
    </script>";
} else {
    echo "<script>
    window.location.href = '../index.php';
    </script>";
}
?>