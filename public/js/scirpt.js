document.addEventListener('DOMContentLoaded', function() {
    initHeaderScroll();
    initMobileMenu();
    initLanguageSelector();
    initSmoothScrolling();
    initAnimations();
});

function initHeaderScroll() {
    const header = document.getElementById('header');
    window.addEventListener('scroll', function() {
        header.classList.toggle('scrolled', window.scrollY > 50);
    });
}

function initMobileMenu() {
    const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
    const mobileMenu = document.createElement('div');
    mobileMenu.className = 'mobile-menu';
    
    mobileMenu.innerHTML = `
        <div class="mobile-menu-header">
            <a href="#" class="logo">
                <i class="fas fa-briefcase"></i>
                Bossa Jobs
            </a>
            <button class="mobile-menu-close">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <nav class="mobile-nav">
            <ul>
                <li><a href="#" data-translate="home">Home</a></li>
                <li><a href="#about" data-translate="about">About</a></li>
                <li><a href="#jobs" data-translate="jobs">Jobs</a></li>
                <li><a href="#how-it-works" data-translate="how-it-works">How It Works</a></li>
                <li><a href="auth/login.php" class="mobile-login-btn"><i class="fas fa-user-plus"></i> <span data-translate="login">Login</span></a></li>
                <li><a hreff ="auth/register.php" class="mobile-signup-btn"><i class="fas fa-user-plus"></i> <span data-translate="signup">Sign Up</span></a></li>
                <li class="mobile-language-dropdown">
                    <a href="#" class="dropdown-toggle">
                        <div>
                            <i class="fas fa-globe"></i>
                            <span class="current-language">English</span>
                        </div>
                        <i class="fas fa-chevron-down dropdown-arrow"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#" data-lang="en"><i class="fas fa-check language-check"></i> English</a></li>
                        <li><a href="#" data-lang="or"><i class="fas fa-globe language-check"></i> Afaan Oromoo</a></li>
                        <li><a href="#" data-lang="am"><i class="fas fa-globe language-check"></i> �ማርኛ</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    `;

    function closeMenu() {
        mobileMenu.classList.remove('active');
        setTimeout(() => {
            if (document.body.contains(mobileMenu)) {
                document.body.removeChild(mobileMenu);
            }
            document.body.style.overflow = '';
        }, 300);
    }

    mobileMenuBtn.addEventListener('click', function() {
        if (document.body.contains(mobileMenu)) {
            return;
        }
        
        document.body.appendChild(mobileMenu);
        document.body.style.overflow = 'hidden';
        setTimeout(() => mobileMenu.classList.add('active'), 10);
        
        const loginBtn = mobileMenu.querySelector('.mobile-login-btn');
        const signupBtn = mobileMenu.querySelector('.mobile-signup-btn');
        
        if (loginBtn) loginBtn.addEventListener('click', showPopUp);
        if (signupBtn) signupBtn.addEventListener('click', showPopUp);
        
        const mobileToggle = mobileMenu.querySelector('.mobile-language-dropdown .dropdown-toggle');
        const mobileMenuList = mobileMenu.querySelector('.mobile-language-dropdown .dropdown-menu');
        
        if (mobileToggle) {
            mobileToggle.addEventListener('click', function(e) {
                e.preventDefault();
                mobileMenuList.classList.toggle('show');
                this.querySelector('.dropdown-arrow').classList.toggle('active');
            });
        }
    });
    mobileMenu.addEventListener('click', function(e) {
        if (e.target.closest('.mobile-menu-close')) {
            closeMenu();
        }
    });
    mobileMenu.addEventListener('click', function(e) {
        if (e.target.tagName === 'A' && !e.target.classList.contains('dropdown-toggle')) {
            closeMenu();
        }
    });
    document.addEventListener('click', function(e) {
        if (!mobileMenuBtn.contains(e.target) && !mobileMenu.contains(e.target) && document.body.contains(mobileMenu)) {
            closeMenu();
        }
    });
}

function initLanguageSelector() {
    const languageDropdown = document.querySelector('.language-dropdown-nav');
    const languageMenu = languageDropdown.querySelector('.dropdown-menu');
    const currentLanguage = languageDropdown.querySelector('.current-language');
    
    const savedLanguage = localStorage.getItem('selectedLanguage') || 'en';
    changeLanguage(savedLanguage);
    
    languageDropdown.addEventListener('mouseenter', () => {
        languageMenu.style.opacity = '1';
        languageMenu.style.visibility = 'visible';
    });
    
    languageDropdown.addEventListener('mouseleave', () => {
        languageMenu.style.opacity = '0';
        languageMenu.style.visibility = 'hidden';
    });
    
    document.addEventListener('click', function(e) {
        if (e.target.closest('.language-dropdown-nav .dropdown-menu a') || 
           (document.querySelector('.mobile-language-dropdown') && e.target.closest('.mobile-language-dropdown .dropdown-menu a'))){
            e.preventDefault();
            const lang = e.target.closest('a').getAttribute('data-lang');
            changeLanguage(lang);
        }
    });
}

function changeLanguage(lang) {
    const languageNames = {
        'en': 'English',
        'or': 'Afaan Oromoo',
        'am': 'አማርኛ'
    };
    
    document.querySelectorAll('.current-language').forEach(el => {
        el.textContent = languageNames[lang];
    });
    
    localStorage.setItem('selectedLanguage', lang);
    
    document.querySelectorAll('[data-lang]').forEach(item => {
        const icon = item.querySelector('i');
        icon.className = item.getAttribute('data-lang') === lang ? 
            'fas fa-check language-check' : 'fas fa-globe language-check';
    });
    
    const translations = {
        'en': {
            'home': 'Home',
            'about': 'About',
            'jobs': 'Jobs',
            'how-it-works': 'How It Works',
            'login': 'Login',
            'signup': 'Sign Up',
            'hero-title': 'Find Your Dream Job Here',
            'hero-text': 'Connecting talented professionals with top employers. Start your career journey today with us',
            'find-jobs': 'Find Jobs',
            'post-job': 'Post a Job',
            'learn-more': 'Learn More',
            'latest-jobs': 'Latest Job Openings',
            'featured-companies': 'Featured Companies',
            'industry-categories': 'Industry Categories',
            'for-job-seekers': 'For Job Seekers',
            'for-employers': 'For Employers',
            'create-profile': 'Create Your Profile',
            'upload-resume': 'Upload Your Resume',
            'get-matched': 'Get Matched',
            'apply-interview': 'Apply & Interview',
            'create-company-profile': 'Create Company Profile',
            'post-job-openings': 'Post Job Openings',
            'review-candidates': 'Review Candidates',
            'hire-top-talent': 'Hire Top Talent',
            'browse-jobs': 'Browse Jobs',
            'job-alerts': 'Job Alerts',
            'browse-candidates': 'Browse Candidates',
            'contact-us': 'Contact Us',
            'for-candidates' : 'For candidates',
            "jimma-job-platform" : 'Job platform'
        },
        'or': {
            'home': 'Fuula Jalqabaa',
            'about': 'Waa\'ee',
            'jobs': 'Hojiiwwan',
            'how-it-works': 'Akka itti hojjetu',
            'login': 'Seensa',
            'signup': 'Galmaa\'i',
            'hero-title': 'Hojii hawwii Keessanii as keessatti Argadhaa',
            'hero-text': 'Ogeessota dandeettii qaban hojjechiistota olaanoo waliin wal qunnamsiisuu. Imala hojii keessanii har\'a nu wajjin eegalaa.',
            'find-jobs': 'Hojii Barbaadi',
            'post-job': 'Hojii Maxxansi',
            'learn-more': 'Dabalataan ilaali',
            'latest-jobs': 'Hojiiwwan Haaraa as Keessatti',
            'featured-companies': 'Dhabbatawwan filataman',
            'industry-categories': 'Gareewwan Hojii',
            'for-job-seekers': 'Hojii Barbaadootaaf',
            'for-employers': 'Hojjechiistotaaf',
            'create-profile': 'profile Keessan Uumuu',
            'upload-resume': 'CV Keessan Baaftuu',
            'get-matched': 'Walitti Qabsiisaa',
            'apply-interview': 'Applii Gaafadhu & Gaaffii',
            'create-company-profile': 'profile dhaabbataa Uumuu',
            'post-job-openings': 'Hojiiwwan Baanaa maxxansi',
            'review-candidates': 'Kadhimaamtooti gulaali',
            'hire-top-talent': 'Ogeessa Ol\'aanaa Qacaraa',
            'browse-jobs': 'Hojiiwwan Ilaaluu',
            'career-resources': 'Qabeenyaa Hojii',
            'job-alerts': 'yaadachisa Hojii',
            'browse-candidates': 'Kaadhimamtoota ilaali',
            "for-candidates": 'Kaadhimamtootaf',
            'contact-us': 'Nu qunnamaa',
            "jimma-job-platform" : 'Pilaatformii Hojii'
        },
        'am': {
            'home': 'መግቢያ',
            'about': 'ስለ እኛ',
            'jobs': 'ስራዎች',
            'how-it-works': 'እንዴት እንደሚሰራ',
            'login': 'ይግቡ',
            'signup': 'ይመዝገቡ',
            'hero-title': 'የህልምዎን ስራ እዚህ ያግኙ',
            'hero-text': 'ብቁ ባለሙያዎችን ከዋና አሰሪዎች ጋር ማገናኘት። የሥራ ጉዞዎን ዛሬ ከእኛ ጋር ይጀምሩ ፣',
            'find-jobs': 'ስራዎችን ይፈልጉ',
            'post-job': 'ስራ ይለጥፉ',
            'learn-more': 'ተጨማሪ ይመልከቱ',
            'latest-jobs': 'የቅርብ ጊዜ የስራ እድሎች',
            'featured-companies': 'ተለይተው የቀረቡ-ኩባንያዎች',
            'industry-categories': 'የኢንዱስትሪ ምድቦች',
            'for-job-seekers': 'ለስራ ፈላጊዎች',
            'for-employers': 'ለቀጣሪዎች',
            'create-profile': 'መገለጫዎን ይፍጠሩ',
            'upload-resume': 'ሪዙሜዎን ይስቀሉ',
            'get-matched': 'ይጣጣሙ',
            'apply-interview': 'ያመልክቱ እና ቃለ መጠይቅ',
            'create-company-profile': 'የኩባንያ መገለጫ ይፍጠሩ',
            'post-job-openings': 'የስራ እድሎችን ይለጥፉ',
            'review-candidates': 'አመልካቾችን ይገምግሙ',
            'hire-top-talent': 'ብቁ ሠራተኞችን ይቅጠሩ',
            'browse-jobs': 'ስራዎችን ይፈልጉ',
            "for-candidates": 'ለእጩዎች',
            'job-alerts': 'የስራ ማስታወቂያዎች',
            'browse-candidates': 'አመልካቾችን ይፈልጉ',
            'contact-us': 'ያግኙን',
            "jimma-job-platform": 'የስራ መድረክ'
        }
    
    };

    document.querySelectorAll('[data-translate]').forEach(element => {
        const key = element.getAttribute('data-translate');
        if (translations[lang] && translations[lang][key]) {
            element.textContent = translations[lang][key];
        }
    });

    

    const notification = document.createElement('div');
    notification.className = 'language-notification';
    notification.innerHTML = `<p>Language changed to ${languageNames[lang] || 'English'}</p>`;
    document.body.appendChild(notification);
    
    setTimeout(() => notification.classList.add('show'), 10);
    setTimeout(() => {
        notification.classList.remove('show');
        setTimeout(() => {
            if (document.body.contains(notification)) document.body.removeChild(notification);
        }, 300);
    }, 3000);
}

function initSmoothScrolling() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;
            
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                const mobileMenu = document.querySelector('.mobile-menu');
                if (mobileMenu && mobileMenu.classList.contains('active')) {
                    mobileMenu.classList.remove('active');
                    setTimeout(() => {
                        if (document.body.contains(mobileMenu)) document.body.removeChild(mobileMenu);
                        document.body.style.overflow = '';
                    }, 300);
                }
                
                window.scrollTo({
                    top: targetElement.offsetTop - 80,
                    behavior: 'smooth'
                });
            }
        });
    });
}

document.querySelector('.register').addEventListener('click',function(){
    window.location.href = 'auth/register.php';
});

document.querySelector('.login').addEventListener('click',function(){
    window.location.href = 'auth/login.php';
})

function initAnimations() {
    const animatedElements = document.querySelectorAll('.steps-box, .jobs, .company, .Industry');
    animatedElements.forEach(element => element.classList.add('animate-on-scroll'));

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) entry.target.classList.add('animated');
        });
    }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });

    animatedElements.forEach(element => observer.observe(element));

    const heroContent = document.querySelector('.section-1-content');
    if (heroContent) {
        setTimeout(() => {
            heroContent.style.opacity = '1';
            heroContent.style.transform = 'translateY(0)';
        }, 300);
    }
}
document.querySelector()
document.querySelectorAll('.Industry').forEach(industry => {
    industry.addEventListener('click', function() {
        console.log(`Filtering by industry: ${this.textContent.trim()}`);
    });
});

document.querySelectorAll('.details-btn').forEach(button => {
    button.addEventListener('click', function(e) {
        if (this.getAttribute('href') === '#') e.preventDefault();
    });
});

document.querySelectorAll('.counters li a').forEach(link => {
    link.addEventListener('click', function(e) {
        if (this.getAttribute('href') === '#') {
            e.preventDefault();
            document.querySelector('.counters li a.active')?.classList.remove('active');
            this.classList.add('active');
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const savedLanguage = localStorage.getItem('selectedLanguage') || 'en';
    changeLanguage(savedLanguage);
});