<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senior Software Developer at TechCorp | Bossa Jobs</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../public/css/job_detail.css">
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
    <header id="header">
        <div class="container header-container">
            <a href="#" class="logo">
                <i class="fas fa-briefcase"></i>
                Bossa Jobs
            </a>

            <ul class="horizontal-bar">
                <li><a href="../index.php" data-translate="home">Home</a></li>
                <li><a href="../index.php#about" data-translate="about">About</a></li>
                <li><a href="../index.php#jobs" data-translate="jobs">Jobs</a></li>
                <li><a href="../index.php#how-it-works" data-translate="how-it-works">How It Works</a></li>

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

                <li><a href="../auth/login.php"><i class="fas fa-user-plus"></i> <span data-translate="login">Login</span></a></li>
                <li><a href="../auth/register.php"><i class="fas fa-user-plus"></i> <span data-translate="signup">Sign Up</span></a></li>
            </ul>

            <button class="mobile-menu-btn">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </header>
    
    <?php
    include '../config/db.php';
$job_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$job_query = "SELECT j.*, u.name, c.logo, c.website,c.description AS company_description 
              FROM jobs j
              JOIN users u ON j.company_id = u.id
              JOIN company c ON u.id = c.company_id
              WHERE j.id = $job_id";
$job_result = mysqli_query($conn, $job_query);
$job = mysqli_fetch_assoc($job_result);

$similar_query = "SELECT j.id, j.title, u.name, j.location 
                 FROM jobs j
                 JOIN users u ON j.company_id = u.id
                 WHERE j.location = '{$job['location']}' AND j.id != $job_id
                 LIMIT 3";
$similar_result = mysqli_query($conn, $similar_query);
$similar_jobs = mysqli_fetch_all($similar_result, MYSQLI_ASSOC);
?>

<section class="job-details-hero">
    <div class="job-details-container">
        <div class="job-main">
            <div class="job-header">
                <img src="../uploads/images/<?php echo $job['logo'];?>" alt="<?php echo htmlspecialchars($job['name']); ?> Logo" class="job-company-logo">
                <div>
                    <h1 class="job-title"><?php echo htmlspecialchars($job['title']); ?></h1>
                    <h2 class="job-company-name"><?php echo htmlspecialchars($job['name']); ?></h2>
                    <div class="job-meta">
                        <div class="job-meta-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span><?php echo htmlspecialchars($job['location']); ?></span>
                        </div>
                        <div class="job-meta-item">
                            <i class="fas fa-briefcase"></i>
                            <span><?php echo htmlspecialchars($job['type']); ?></span>
                        </div>
                        <div class="job-meta-item">
                            <i class="fas fa-money-bill-wave"></i>
                            <span><?php echo $job['salary']; ?></span>
                        </div>
                        <div class="job-meta-item">
                            <i class="far fa-clock"></i>
                            <span>Deadline: <?php echo date('M d, Y', strtotime($job['deadline'])); ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="job-section">
                <h3 class="job-section-title">Job Description</h3>
                <div class="job-description">
                    <?php echo html_entity_decode($job['description']); ?>
                </div>
            </div>

            <div class="job-section">
                <h3 class="job-section-title">Requirements</h3>
                <div class="job-description">
                    <?php echo html_entity_decode($job['skill']); ?>
                </div>
            </div>

            <div class="apply-actions">
                <a href="../auth/login.php" class="btn btn-primary">Apply Now</a>
                <a href="#" class="btn btn-outline">Save Job</a>
            </div>
        </div>

        <div class="job-sidebar">
            <div class="sidebar-card">
                <h3 class="sidebar-card-title">About the Company</h3>
                <div class="job-description">
                    <?php echo nl2br(htmlspecialchars($job['company_description'])); ?>
                </div>
                <a href="<?php echo htmlspecialchars($job['website']); ?>" target="_blank" class="btn btn-outline" style="margin-top: 20px;">
                    Visit Website
                </a>
            </div>

            <div class="sidebar-card">
                <h3 class="sidebar-card-title">Similar Jobs</h3>
                <?php foreach ($similar_jobs as $similar): ?>
                    <div class="similar-job">
                        <a href="job_details.php?id=<?php echo $similar['id']; ?>" class="similar-job-title"><?php echo htmlspecialchars($similar['title']); ?></a>
                        <div class="similar-job-company"><?php echo htmlspecialchars($similar['location']); ?></div>
                    </div>
                <?php endforeach; ?>
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
<script src="../public/js/scirpt.js"></script>
    <script>
        window.addEventListener('scroll', function() {
            const header = document.getElementById('header');
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });

        const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
        const mobileMenu = document.createElement('div');
        mobileMenu.className = 'mobile-menu';
        
        mobileMenu.innerHTML = `
            <div class="mobile-menu-header">
                <a href="index.html" class="logo">
                    <i class="fas fa-briefcase"></i>
                    Bossa Jobs
                </a>
                <button class="mobile-menu-close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <nav class="mobile-nav">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="index.html#about">About</a></li>
                    <li><a href="index.html#jobs">Jobs</a></li>
                    <li><a href="index.html#how-it-works">How It Works</a></li>
                    <li><button class="mobile-login-btn"><i class="fas fa-user-plus"></i> Login</button></li>
                    <li><button class="mobile-signup-btn"><i class="fas fa-user-plus"></i> Sign Up</button></li>
                </ul>
            </nav>
        `;

        mobileMenuBtn.addEventListener('click', function() {
            document.body.appendChild(mobileMenu);
            document.body.style.overflow = 'hidden';
            setTimeout(() => {
                mobileMenu.style.opacity = '1';
                mobileMenu.style.transform = 'translateX(0)';
            }, 10);
            
            document.querySelector('.mobile-login-btn').addEventListener('click', showPopUp);
            document.querySelector('.mobile-signup-btn').addEventListener('click', showPopUp);
        });

        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('mobile-menu-close') || 
                (mobileMenu.contains(e.target) && e.target.tagName === 'A')) {
                mobileMenu.style.opacity = '0';
                mobileMenu.style.transform = 'translateX(100%)';
                setTimeout(() => {
                    if (document.body.contains(mobileMenu)) {
                        document.body.removeChild(mobileMenu);
                    }
                    document.body.style.overflow = '';
                }, 300);
            }
        });

        function showPopUp() {
            const popup = document.createElement('div');
            popup.className = 'popup-container active';
            popup.innerHTML = `
                <div class="pop-up">
                    <img src="https://cdn.jsdelivr.net/npm/@material-icons/svg@1.0.0/svg/close/baseline.svg" alt="Close" onclick="document.body.removeChild(this.parentNode.parentNode)" width="24" height="24">
                    <div class="pop-up-description">
                        <p>Join our community of professionals and companies in Jimma. Select your role to get started:</p>
                    </div>
                    <div class="pop-up-links">
                        <a href="authentication/candidate_sign_up.php">I'm a Candidate</a>
                        <a href="authentication/company_sign_up.php">I'm an Employer</a>
                    </div>
                </div>
            `;
            document.body.appendChild(popup);
            document.body.style.overflow = 'hidden';
        }

        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
</body>
</html>