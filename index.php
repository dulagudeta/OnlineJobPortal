<?php
include 'config/db.php';
include 'functions/fetch_jobs.php';
include 'functions/fetch_companies.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Portal - Find Your Dream Job Here</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/job_detail.css">
</head>

<body>
    <header id="header">
        <div class="container header-container">
            <a href="#" class="logo">
                <i class="fas fa-briefcase"></i>
                Job portal
            </a>

            <ul class="horizontal-bar">
                <li><a href="index.php" data-translate="home">Home</a></li>
                <li><a href="#about" data-translate="about">About</a></li>
                <li><a href="#jobs" data-translate="jobs">Jobs</a></li>
                <li><a href="#how-it-works" data-translate="how-it-works">How It Works</a></li>

                <li class="dropdown language-dropdown-nav">
                    <a href="#" class="dropdown-toggle">
                        <i class="fas fa-globe"></i>
                        <span class="current-language">English</span>
                        <i class="fas fa-chevron-down dropdown-arrow"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#" data-lang="en"><i class="fas fa-check language-check"></i> English</a></li>
                        <li><a href="#" data-lang="or"><i class="fas fa-globe language-check"></i> Afaan Oromoo</a></li>
                        <li><a href="#" data-lang="am"><i class="fas fa-globe language-check"></i> አማርኛ</a></li>
                    </ul>
                </li>

                <li><button class="login"><i class="fas fa-user-plus"></i> <span data-translate="login">Login</span></button></li>
                <li><button class="register"><i class="fas fa-user-plus"></i> <span data-translate="signup">Sign Up</span></button></li>
            </ul>

            <button class="mobile-menu-btn">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </header>

    <section class="section-1">
        <img src="https://images.unsplash.com/photo-1521791055366-0d553872125f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2000&q=80" alt="Professional workspace" class="section-1-bg">
        <div class="container">
            <div class="section-1-content">
                <h1 data-translate="hero-title">Find Your Dream Job in here</h1>
                <p data-translate="hero-text">Connecting talented professionals with top employers in Jimma City. Start your career journey today with Bossa Jobs.</p>
                <div class="hero-buttons">
                    <a href="auth/login.php" class="btn btn-primary" data-translate="find-jobs">Find Jobs</a>
                    <a href="auth/login.php" class="btn btn-outline" data-translate="post-job">Post a Job</a>
                </div>
            </div>
        </div>
    </section>

    <section class="section-2" id="about">
        <div class="container">
            <div class="description-part">
                <h1 data-translate="jimma-job-platform">Job Platform</h1>
                <p data-translate="platform-description1">Job Portal is dedicated to connecting job seekers with employers in Jimma City and surrounding areas. Our platform makes it easy to find the perfect match for your skills and experience.</p>
                <p data-translate="platform-description2">With our deep understanding of the local job market and partnerships with Jimma's top employers, we're your trusted partner for career growth in the region.</p>
                <a href="utility/about.php" class="btn btn-primary" data-translate="learn-more">Learn More</a>
            </div>
            <div class="img-part">
                <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="Jimma city landscape">
            </div>
        </div>
    </section>


    <section class="section-3" id="jobs">
        <div class="container">
            <div class="left-panel-container">
                <div class="left-panel">
                    <h1 data-translate="featured-companies">Featured Companies</h1>
                    <?php
                    $companies = fetch_companies($conn);
                    if (!empty($companies)) {
                        foreach ($companies as $company) {
                            echo '
                                <div class="company">
                                    <img src="uploads/images/' . $company['logo'] . '" alt="' . $company['name'] . '">
                                    <h4>' . $company['name'] . '</h4>
                                </div>
                                ';
                        }
                    }
                    ?>
                </div>
                <div class="left-panel" id="Industry">
                    <h1 data-translate="industry-categories">Industry Categories</h1>
                    <div class="Industry">
                        <p>Technology</p>
                    </div>
                    <div class="Industry">
                        <p>Finance</p>
                    </div>
                    <div class="Industry">
                        <p>Healthcare</p>
                    </div>
                    <div class="Industry">
                        <p>Education</p>
                    </div>
                    <div class="Industry">
                        <p>Manufacturing</p>
                    </div>
                    <div class="Industry">
                        <p>Retail</p>
                    </div>
                    <div class="Industry">
                        <p>Hospitality</p>
                    </div>
                    <div class="Industry">
                        <p>Engineering</p>
                    </div>
                </div>
            </div>
            <div class="right-panel">
                <h1 data-translate="latest-jobs">Latest Job Openings</h1>

                <?php
                $jobsPerPage = 3; 
                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $offset = ($page - 1) * $jobsPerPage;

                $totalJobsQuery = "SELECT COUNT(*) as total FROM jobs";
                $totalJobsResult = mysqli_query($conn, $totalJobsQuery);
                $totalJobsRow = mysqli_fetch_assoc($totalJobsResult);
                $totalJobs = $totalJobsRow['total'];

                $totalPages = ceil($totalJobs / $jobsPerPage);

                $jobsQuery = "SELECT j.*, u.name, c.logo, c.website,c.description AS company_description 
              FROM jobs j
              JOIN users u ON j.company_id = u.id
              JOIN company c ON u.id = c.company_id
              ORDER BY created_at DESC LIMIT $offset, $jobsPerPage";
                $jobsResult = mysqli_query($conn, $jobsQuery);
                $jobs = mysqli_fetch_all($jobsResult, MYSQLI_ASSOC);

                if (!empty($jobs)) {
                    foreach ($jobs as $job) {
                        echo '
                <div class="jobs">
                    <div class="company-name">
                        <img src="uploads/images/' . $job['logo'] . '" alt="' . $job['name'] . '">
                        <h1>' . $job['name'] . '</h1>
                    </div>
                    <div class="jobs-description">
                        <h2>' . $job['title'] . '</h2>
                        <p><i class="fas fa-map-marker-alt"></i> ' . $job['location'] . '</p>
                        <p>' . substr($job['description'], 0, 200) . '...</p>
                        <div>
                            <p><i class="far fa-calendar-alt"></i> Posted: ' . $job['created_at'] . '</p>
                            <p><i class="far fa-clock"></i> Deadline: ' . $job['deadline'] . '</p>
                        </div>
                    </div>
                    <div class="apply-link">
                        <a href="auth/login.php" class="details-btn" data-translate="apply-now">Apply Now</a>
                        <a href="utility/job_detail.php?id='.$job['id'].'" class="details-btn" data-translate="job-detail">See more</a>
                    </div>
                </div>
                ';
                    }
                } else {
                    echo "<p data-translate='no-jobs'>No jobs posted yet. Check back soon!</p>";
                }
                ?>
                <div class="counters">
                    <ul>
                        <?php
                        if ($page > 1) {
                            echo '<li><a href="?page=' . ($page - 1) . '"><i class="fas fa-angle-left"></i></a></li>';
                        } else {
                            echo '<li class="disabled"><a href="#"><i class="fas fa-angle-left"></i></a></li>';
                        }

                        for ($i = 1; $i <= $totalPages; $i++) {
                            $active = ($i == $page) ? 'class="active"' : '';
                            echo '<li><a ' . $active . ' href="?page=' . $i . '">' . $i . '</a></li>';
                        }

                        if ($page < $totalPages) {
                            echo '<li><a href="?page=' . ($page + 1) . '"><i class="fas fa-angle-right"></i></a></li>';
                        } else {
                            echo '<li class="disabled"><a href="#"><i class="fas fa-angle-right"></i></a></li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>


    <section class="section-4" id="how-it-works">
        <div class="container">
            <div class="section-title">
                <h2 data-translate="how-it-works">How It Works</h2>
                <p data-translate="simple-steps">Simple steps to find your dream job or the perfect candidate in Jimma</p>
            </div>

            <div class="steps-container">
                <div class="steps-box">
                    <h3 data-translate="for-job-seekers">For Job Seekers</h3>

                    <div class="steps-list">
                        <div class="step-item">
                            <div class="step-number">1</div>
                            <div class="step-content">
                                <h4 data-translate="create-profile">Create Your Profile</h4>
                                <p data-translate="create-profile-desc">Sign up and build your professional profile in minutes, highlighting your skills and experience.</p>
                            </div>
                        </div>

                        <div class="step-item">
                            <div class="step-number">2</div>
                            <div class="step-content">
                                <h4 data-translate="upload-resume">Upload Your Resume</h4>
                                <p data-translate="upload-resume-desc">Add your resume and let our system match you with relevant opportunities in Jimma.</p>
                            </div>
                        </div>

                        <div class="step-item">
                            <div class="step-number">3</div>
                            <div class="step-content">
                                <h4 data-translate="get-matched">Get Matched</h4>
                                <p data-translate="get-matched-desc">Receive personalized job recommendations based on your profile and preferences.</p>
                            </div>
                        </div>

                        <div class="step-item">
                            <div class="step-number">4</div>
                            <div class="step-content">
                                <h4 data-translate="apply-interview">Apply & Interview</h4>
                                <p data-translate="apply-interview-desc">Apply with one click and prepare for interviews with our career resources.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="steps-box">
                    <h3 data-translate="for-employers">For Employers</h3>

                    <div class="steps-list">
                        <div class="step-item">
                            <div class="step-number">1</div>
                            <div class="step-content">
                                <h4 data-translate="create-company-profile">Create Company Profile</h4>
                                <p data-translate="create-company-profile-desc">Set up your company profile and showcase your culture, values, and benefits.</p>
                            </div>
                        </div>

                        <div class="step-item">
                            <div class="step-number">2</div>
                            <div class="step-content">
                                <h4 data-translate="post-job-openings">Post Job Openings</h4>
                                <p data-translate="post-job-openings-desc">List your job requirements and desired qualifications with our easy job posting tool.</p>
                            </div>
                        </div>

                        <div class="step-item">
                            <div class="step-number">3</div>
                            <div class="step-content">
                                <h4 data-translate="review-candidates">Review Candidates</h4>
                                <p data-translate="review-candidates-desc">Get matched with qualified candidates and review their profiles and portfolios.</p>
                            </div>
                        </div>

                        <div class="step-item">
                            <div class="step-number">4</div>
                            <div class="step-content">
                                <h4 data-translate="hire-top-talent">Hire Top Talent</h4>
                                <p data-translate="hire-top-talent-desc">Connect with candidates through our platform and make hiring decisions faster.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

   <footer>
        <div class="container">
            <div>
                <h1>Job Portal</h1>
                <p style="color: rgba(255,255,255,0.7); margin: 20px 0; line-height: 1.7;" data-translate="footer-description">Connecting talent with opportunity in Jimma City. Our mission is to make career growth accessible to everyone in the region.</p>
                <div class="icon-linked">
                    <a href="#"><img src="https://cdn.jsdelivr.net/npm/simple-icons@v5/icons/facebook.svg" alt="Facebook"></a>
                    <a href="#"><img src="https://cdn.jsdelivr.net/npm/simple-icons@v5/icons/twitter.svg" alt="Twitter"></a>
                    <a href="#"><img src="https://cdn.jsdelivr.net/npm/simple-icons@v5/icons/linkedin.svg" alt="LinkedIn"></a>
                    <a href="#"><img src="https://cdn.jsdelivr.net/npm/simple-icons@v5/icons/instagram.svg" alt="Instagram"></a>
                </div>
            </div>

            <div>
                <h1 data-translate="for-candidates">For Candidates</h1>
                <ul>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> <span data-translate="browse-jobs">Browse Jobs</span></a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> <span data-translate="job-alerts">Job Alerts</span></a></li>
                </ul>
            </div>

            <div>
                <h1 data-translate="for-employers">For Employers</h1>
                <ul>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> <span data-translate="post-job">Post a Job</span></a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> <span data-translate="browse-candidates">Browse Candidates</span></a></li>

                </ul>
            </div>

            <div>
                <h1 data-translate="contact-us">Contact Us</h1>
                <ul>
                    <li><a href="#"><i class="fas fa-map-marker-alt"></i> <span>Jimma, Ethiopia</span></a></li>
                    <li><a href="tel:+251912345678"><i class="fas fa-phone-alt"></i> <span>+251 912 345 678</span></a></li>
                    <li><a href="mailto:info@bossajobs.com"><i class="fas fa-envelope"></i> <span>info@bossajobs.com</span></a></li>
                </ul>
            </div>
        </div>

        <div class="copyright">
            <p data-translate="copyright">&copy; 2025 Job Portal. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="public/js/scirpt.js"></script>
</body>

</html>