<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | CareerConnect</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.js"></script>
    <link rel="stylesheet" href="../public/css/about.css">
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
    <section class="contact-hero">
        <div class="container">
            <h1>Contact Us</h1>
            <p>Have questions or feedback? We'd love to hear from you! Reach out to our team anytime.</p>
        </div>
    </section>

    <div class="container">
        <div class="contact-content">
            <!-- Contact Form -->
            <div class="contact-form">
                <h2>Send Us a Message</h2>
                <form id="contactForm">
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <select id="subject" name="subject" required>
                            <option value="" disabled selected>Select a subject</option>
                            <option value="general">General Inquiry</option>
                            <option value="technical">Technical Support</option>
                            <option value="employer">Employer Services</option>
                            <option value="feedback">Feedback/Suggestions</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message">Your Message</label>
                        <textarea id="message" name="message" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary submit-btn">Send Message</button>
                </form>
            </div>
            <div class="contact-info">
                <div class="info-card">
                    <h3>Get in Touch</h3>
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="info-text">
                            <h4>Our Office</h4>
                            <p>123 Career Street, San Francisco, CA 94107</p>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div class="info-text">
                            <h4>Call Us</h4>
                            <p><a href="tel:+11234567890">+1 (123) 456-7890</a></p>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="info-text">
                            <h4>Email Us</h4>
                            <p><a href="mailto:info@careerconnect.com">info@careerconnect.com</a></p>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="info-text">
                            <h4>Working Hours</h4>
                            <p>Monday - Friday: 9am - 6pm PST</p>
                            <p>Saturday: 10am - 4pm PST</p>
                        </div>
                    </div>
                </div>

                <!-- Map -->
                <div id="map"></div>

                <div class="info-card">
                    <h3>Follow Us</h3>
                    <div style="display: flex; gap: 15px;">
                        <a href="#" style="color: var(--primary); font-size: 24px;"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" style="color: var(--primary); font-size: 24px;"><i class="fab fa-twitter"></i></a>
                        <a href="#" style="color: var(--primary); font-size: 24px;"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" style="color: var(--primary); font-size: 24px;"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!-- FAQ Section -->
        <section class="faq-section">
            <h2>Frequently Asked Questions</h2>
            <div class="faq-item">
                <div class="faq-question">
                    <span>How do I create an account on CareerConnect?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Creating an account is simple! Click on the "Register" button at the top right corner of any page. You can sign up using your email address or through your LinkedIn profile for quicker registration.</p>
                </div>
            </div>
            <div class="faq-item">
                <div class="faq-question">
                    <span>What should I do if I forgot my password?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>On the login page, click on "Forgot Password" and enter your registered email address. You'll receive a link to reset your password. If you don't see the email, please check your spam folder.</p>
                </div>
            </div>
            <div class="faq-item">
                <div class="faq-question">
                    <span>How can employers post jobs on CareerConnect?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Employers need to create a company account first. After verification, you can post jobs through your employer dashboard. We offer different posting packages to suit your hiring needs.</p>
                </div>
            </div>
            <div class="faq-item">
                <div class="faq-question">
                    <span>Is there a mobile app available?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>Yes! CareerConnect is available on both iOS and Android. You can download it from the App Store or Google Play Store. Our mobile app offers all the features of the web version with added convenience.</p>
                </div>
            </div>
            <div class="faq-item">
                <div class="faq-question">
                    <span>How do I delete my account?</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>You can delete your account from the "Account Settings" page. Please note that this action is permanent and cannot be undone. All your data will be removed from our systems in accordance with our privacy policy.</p>
                </div>
            </div>
        </section>
    </div>

    <footer>
        <div class="container">
            <div>
                <h1>Bossa Jobs</h1>
                <p style="color: #666; margin: 20px 0; line-height: 1.7;">Connecting talent with opportunity in Jimma City. Our mission is to make career growth accessible to everyone in the region.</p>
                <div class="icon-linked">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            
            <div>
                <h1>For Candidates</h1>
                <ul>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> Browse Jobs</a></li>
                   
                    <li><a href="#"><i class="fas fa-chevron-right"></i> Resume Builder</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> Job Alerts</a></li>
                   
                </ul>
            </div>
            
            <div>
                <h1>For Employers</h1>
                <ul>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> Post a Job</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> Browse Candidates</a></li>
       
            </div>
            
            <div>
                <h1>Contact Us</h1>
                <ul>
                    <li><a href="#"><i class="fas fa-map-marker-alt"></i> Jimma, Ethiopia</a></li>
                    <li><a href="tel:+251912345678"><i class="fas fa-phone-alt"></i> +251 912 345 678</a></li>
                    <li><a href="mailto:info@bossajobs.com"><i class="fas fa-envelope"></i> info@bossajobs.com</a></li>
                  
                </ul>
            </div>
        </div>
        
        <div class="copyright">
            <p>&copy; 2024 Bossa Jobs. All Rights Reserved.</p>
        </div>
    </footer>

    <script>
        const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
        const navLinks = document.querySelector('.nav-links');
        const authButtons = document.querySelector('.auth-buttons');

        mobileMenuBtn.addEventListener('click', () => {
            navLinks.style.display = navLinks.style.display === 'flex' ? 'none' : 'flex';
            authButtons.style.display = authButtons.style.display === 'flex' ? 'none' : 'flex';
        });
        window.addEventListener('resize', () => {
            if (window.innerWidth > 768) {
                navLinks.style.display = 'flex';
                authButtons.style.display = 'flex';
            } else {
                navLinks.style.display = 'none';
                authButtons.style.display = 'none';
            }
        });

        mapboxgl.accessToken = 'pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw';
        const map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [-122.4194, 37.7749], 
            zoom: 12
        });

        new mapboxgl.Marker()
            .setLngLat([-122.4194, 37.7749])
            .addTo(map);

        const faqItems = document.querySelectorAll('.faq-item');
        
        faqItems.forEach(item => {
            const question = item.querySelector('.faq-question');
            
            question.addEventListener('click', () => {
                faqItems.forEach(otherItem => {
                    if (otherItem !== item) {
                        otherItem.classList.remove('active');
                    }
                });
                
                item.classList.toggle('active');
            });
        });
        

        const contactForm = document.getElementById('contactForm');
        
        contactForm.addEventListener('submit', (e) => {
            e.preventDefault();
            
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const subject = document.getElementById('subject').value;
            const message = document.getElementById('message').value;
            
            
            console.log('Form submitted:', { name, email, subject, message });
            
    
            alert(`Thank you, ${name}! Your message has been sent. We'll get back to you soon.`);
            
        
            contactForm.reset();
        });
    </script>
</body>
</html>