<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title data-translate="about_page_title">About Us | JobPortal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/about.css">
    <link rel="stylesheet" href="../public/css/style.css">
    <style>
        .language-selector {
            position: absolute;
            top: 20px;
            right: 20px;
            z-index: 100;
        }

        .language-btn {
            background: rgba(25, 55, 100, 0.7);
            color: white;
            border: 1px solid rgba(100, 149, 237, 0.3);
            border-radius: 6px;
            padding: 6px 12px;
            margin-left: 5px;
            cursor: pointer;
            font-size: 0.8rem;
            transition: all 0.2s ease;
        }

        .language-btn:hover {
            background: rgba(65, 105, 225, 0.5);
        }

        .language-btn.active {
            background: rgba(65, 105, 225, 0.7);
            font-weight: bold;
        }
    </style>
</head>

<body>
    <header id="header">
        <div class="container header-container">
            <a href="#" class="logo">
                <i class="fas fa-briefcase"></i>
                JobPortal
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
                        <li><a href="#" data-lang="om"><i class="fas fa-globe language-check"></i> Afaan Oromoo</a></li>
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

    <section class="about-hero">
        <div class="container">
            <h1 data-translate="about_heading">About JobPortal</h1>
            <p data-translate="about_description">Connecting talented professionals with their dream jobs. Our mission is to make job searching and hiring seamless, efficient, and effective.</p>
        </div>
    </section>


    <section class="section">
        <div class="container">
            <div class="our-story">
                <div class="story-content">
                    <h3 data-translate="our_story">Our Story</h3>
                    <p data-translate="story_paragraph1">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor, nisl eget ultricies tincidunt, nisl nisl aliquam nisl, eget ultricies nisl nisl eget nisl. Sed euismod, nisl eget ultricies tincidunt, nisl nisl aliquam nisl, eget ultricies nisl nisl eget nisl. Sed euismod, nisl eget ultricies tincidunt, nisl nisl aliquam nisl, eget ultricies nisl nisl eget nisl. Sed euismod, nisl eget ultricies tincidunt, nisl nisl aliquam nisl, eget ultricies nisl nisl eget nisl.
                    </p>
                    <p data-translate="story_paragraph2">
                        Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi.
                    </p>
                </div>
                <div class="story-image">
                    <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Our team working together">
                </div>
            </div>
        </div>
    </section>

    <section class="section mission-values">
        <div class="container">
            <div class="section-title">
                <h2 data-translate="mission_values_heading">Our Mission & Values</h2>
                <p data-translate="mission_values_subheading">These core principles guide everything we do at JobPortal</p>
            </div>
            <div class="values-grid">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-bullseye"></i>
                    </div>
                    <h3 data-translate="mission_title">Our Mission</h3>
                    <p data-translate="mission_text">
                        To empower individuals in their career journeys and enable companies to find exceptional talent through innovative technology and personalized service.
                    </p>
                </div>
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 data-translate="people_first_title">People First</h3>
                    <p data-translate="people_first_text">
                        We believe careers change lives. Every interaction is an opportunity to make a positive impact on someone's professional journey.
                    </p>
                </div>
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h3 data-translate="innovation_title">Innovation</h3>
                    <p data-translate="innovation_text">
                        We continuously evolve our platform to incorporate the latest technologies that make job searching and hiring more efficient.
                    </p>
                </div>
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h3 data-translate="integrity_title">Integrity</h3>
                    <p data-translate="integrity_text">
                        We maintain transparency and honesty in all our dealings, building trust with both job seekers and employers.
                    </p>
                </div>
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-globe"></i>
                    </div>
                    <h3 data-translate="inclusivity_title">Inclusivity</h3>
                    <p data-translate="inclusivity_text">
                        We're committed to creating opportunities for all, regardless of background, and promoting diversity in the workplace.
                    </p>
                </div>
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3 data-translate="excellence_title">Excellence</h3>
                    <p data-translate="excellence_text">
                        We strive for the highest standards in everything we do, from our technology to our customer service.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="cta">
            <h2 data-translate="cta_heading">Ready to Transform Your Career or Hiring?</h2>
            <p data-translate="cta_subheading">Join thousands of professionals and companies who've found success with JobPortal</p>
            <div style="display: flex; gap: 15px; justify-content: center;">
                <a href="../auth/login.php" class="btn btn-primary" style="background: white; color: var(--primary);" data-translate="post_job">Post a Job</a>
                <a href="../index.php" class="btn btn-outline" style="border-color: white; color: white;" data-translate="browse_jobs">Browse Jobs</a>
            </div>
        </div>
    </div>

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
        const translations = {
            en: {
                about_page_title: "About Us | JobPortal",
                brand_name: "JobPortal Jobs",
                home: "Home",
                about: "About",
                jobs: "Jobs",
                "how-it-works": "How It Works",
                login: "Login",
                signup: "Sign Up",
                about_heading: "About JobPortal",
                about_description: "Connecting talented professionals with their dream jobs since 2015. Our mission is to make job searching and hiring seamless, efficient, and effective.",
                our_story: "Our Story",
                story_paragraph1: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor, nisl eget ultricies tincidunt, nisl nisl aliquam nisl, eget ultricies nisl nisl eget nisl. Sed euismod, nisl eget ultricies tincidunt, nisl nisl aliquam nisl, eget ultricies nisl nisl eget nisl. Sed euismod, nisl eget ultricies tincidunt, nisl nisl aliquam nisl, eget ultricies nisl nisl eget nisl. Sed euismod, nisl eget ultricies tincidunt, nisl nisl aliquam nisl, eget ultricies nisl nisl eget nisl.",
                story_paragraph2: "Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi.",
                mission_values_heading: "Our Mission & Values",
                mission_values_subheading: "These core principles guide everything we do at JobPortal",
                mission_title: "Our Mission",
                mission_text: "To empower individuals in their career journeys and enable companies to find exceptional talent through innovative technology and personalized service.",
                people_first_title: "People First",
                people_first_text: "We believe careers change lives. Every interaction is an opportunity to make a positive impact on someone's professional journey.",
                innovation_title: "Innovation",
                innovation_text: "We continuously evolve our platform to incorporate the latest technologies that make job searching and hiring more efficient.",
                integrity_title: "Integrity",
                integrity_text: "We maintain transparency and honesty in all our dealings, building trust with both job seekers and employers.",
                inclusivity_title: "Inclusivity",
                inclusivity_text: "We're committed to creating opportunities for all, regardless of background, and promoting diversity in the workplace.",
                excellence_title: "Excellence",
                excellence_text: "We strive for the highest standards in everything we do, from our technology to our customer service.",
                team_heading: "Meet Our Leadership Team",
                team_subheading: "The talented individuals driving our vision forward",
                ceo_title: "CEO & Founder",
                cto_title: "CTO",
                vp_product_title: "VP of Product",
                vp_marketing_title: "VP of Marketing",
                testimonials_heading: "What People Say About Us",
                testimonials_subheading: "Hear from job seekers and employers who've used our platform",
                testimonial1_text: "JobPortal completely transformed our hiring process. We found three perfect candidates for hard-to-fill positions in just two weeks. The quality of applicants was exceptional compared to other platforms we've used.",
                testimonial1_position: "HR Director, TechSolutions Inc.",
                testimonial2_text: "After months of searching elsewhere, I landed my dream job through JobPortal in just three weeks! The personalized job recommendations and easy application process made all the difference.",
                testimonial2_position: "Senior Software Engineer",
                testimonial3_text: "The analytics tools provided by JobPortal gave us incredible insights into our hiring funnel. We reduced our time-to-hire by 40% while improving candidate quality. Game changer for our growing startup.",
                testimonial3_position: "Co-Founder, GreenTech Innovations",
                cta_heading: "Ready to Transform Your Career or Hiring?",
                cta_subheading: "Join thousands of professionals and companies who've found success with JobPortal",
                post_job: "Post a Job",
                browse_jobs: "Browse Jobs",
                footer_description: "Connecting talent with opportunity in Jimma City. Our mission is to make career growth accessible to everyone in the region.",
                for_candidates: "For Candidates",
                for_employers: "For Employers",
                contact_us: "Contact Us",
                resume_builder: "Resume Builder",
                job_alerts: "Job Alerts",
                browse_candidates: "Browse Candidates",
                location: "Jimma, Ethiopia",
                phone: "+251 912 345 678",
                email: "info@JobPortaljobs.com",
                all_rights: "All Rights Reserved"
            },
            am: {
                about_page_title: "ስለ እኛ | JobPortal",
                brand_name: "JobPortal Jobs",
                home: "ዋና ገጽ",
                about: "ስለ እኛ",
                jobs: "ስራዎች",
                "how-it-works": "እንዴት እንደሚሰራ",
                login: "ግባ",
                signup: "ተመዝገብ",
                about_heading: "ስለ JobPortal",
                about_description: "በርዕሰ ብቁ ባለሙያዎችን ከህልም ስራቸው ጋር ከ2015 ጀምሮ በማገናኘት ላይ። የእኛ ተልእኮ የስራ ፍለጋ እና ቅጥር ያልተለያየ፣ ውጤታማ እና ውጤታማ ማድረግ ነው።",
                our_story: "የእኛ ታሪክ",
                story_paragraph1: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor, nisl eget ultricies tincidunt, nisl nisl aliquam nisl, eget ultricies nisl nisl eget nisl. Sed euismod, nisl eget ultricies tincidunt, nisl nisl aliquam nisl, eget ultricies nisl nisl eget nisl. Sed euismod, nisl eget ultricies tincidunt, nisl nisl aliquam nisl, eget ultricies nisl nisl eget nisl. Sed euismod, nisl eget ultricies tincidunt, nisl nisl aliquam nisl, eget ultricies nisl nisl eget nisl.",
                story_paragraph2: "Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi.",
                mission_values_heading: "የእኛ ተልእኮ እና እሴቶች",
                mission_values_subheading: "እነዚህ መሠረታዊ መርሆዎች በቦሳጆብስ የምናደርገውን ሁሉ ይመራሉ",
                mission_title: "የእኛ ተልእኮ",
                mission_text: "ግለሰቦች በሙያ ጉዞዎቻቸው ውስጥ እንዲበረታቱ እና ኩባንያዎች በፈጠራ ቴክኖሎጂ እና በተገላቢጦሽ አገልግሎት ከላይ ብቁ ባለሙያዎችን እንዲያገኙ ለማድረግ።",
                people_first_title: "ሰዎች በመጀመሪያ",
                people_first_text: "ሙያዎች ህይወትን እንደሚቀይሩ እናምናለን። እያንዳንዱ ግንኙነት በማንኛውም ሰው ሙያዊ ጉዞ ላይ አዎንታዊ ተጽዕኖ ለማሳደር እድል ነው።",
                innovation_title: "ፈጠራ",
                innovation_text: "የስራ ፍለጋ እና ቅጥር የበለጠ ውጤታማ ለማድረግ �ብሪ ቴክኖሎጂዎችን ለማካተት መድረካችንን በተከታታይ እናዳብራለን።",
                integrity_title: "ንጽህና",
                integrity_text: "በሁሉም ግንኙነቶቻችን ግልጽነት እና ሙህሩምነት እንጠብቃለን፣ ከሁለቱም የስራ ፈላጊዎች እና ሰራተኞች ጋር የማመንነት ግንኙነት እንገነባለን።",
                inclusivity_title: "አካታችነት",
                inclusivity_text: "ለሁሉም የተዘረጋ እድሎችን ለመፍጠር እና በስራ ቦታው ልዩነትን ለማሳደግ ቁርጠኛ ነን።",
                excellence_title: "ልዕለነት",
                excellence_text: "ከቴክኖሎጂችን እስከ የደንበኞች አገልግሎት ድረስ በምናደርገው ነገር ሁሉ ከፍተኛ ደረጃዎችን ለማሳካት እንጥራለን።",
                team_heading: "የመሪነት ቡድናችንን ይገናኙ",
                team_subheading: "ራዕያችንን ወደፊት የሚያንቀሳቅሱ ብቁ ሰዎች",
                ceo_title: "ዋና ሥራ አስፈጻሚ እና መስራች",
                cto_title: "ዋና ቴክኖሎጂ አስተዳዳሪ",
                vp_product_title: "የምርት ምክትል ፕሬዝዳንት",
                vp_marketing_title: "የግብይት ምክትል ፕሬዝዳንት",
                testimonials_heading: "ሰዎች ስለኛችን ምን ይላሉ",
                testimonials_subheading: "መድረካችንን ከተጠቀሙት የስራ ፈላጊዎች እና ሰራተኞች ይስማሙ",
                testimonial1_text: "ቦሳጆብስ የቅጥር ሂደታችንን ሙሉ በሙሉ ቀይሯል። ለማግኘት የሚያስቸግሩ ስራዎች ሶስት ትክክለኛ ተፈላጊዎችን በሁለት ሳምንታት ውስጥ አገኘን። የማመልከቻዎቹ ጥራት ከተጠቀምናቸው ሌሎች መድረኮች ጋር ሲነፃፀር ከላይ ነበር።",
                testimonial1_position: "የHR ዳይሬክተር፣ ቴክሶሉሽንስ ኢንክ",
                testimonial2_text: "ከብዙ ወራት በሌላ ቦታ ከፈለግኩ በኋላ፣ የህልሜን ስራ በቦሳጆብስ በሶስት ሳምንታት ውስጥ አገኘሁ! የተገላቢጦሽ የስራ ምክሮች እና ቀላል የማመልከቻ ሂደት ሁሉንም ልዩነት አድርጓል።",
                testimonial2_position: "ከፍተኛ የሶፍትዌር ምህንድስና",
                testimonial3_text: "በቦሳጆብስ የተሰጡን የትንታኔ መሳሪያዎች ስለ የቅጥር መድረካችን አስደናቂ ግንዛቤ ሰጥተናል። የቅጥር ጊዜችንን በ40% ቀንሰናል በተመሳሳይ ጊዜ የተፈላጊዎችን ጥራት በማሻሻል ላይ። ለሚያድገው አዲስ መንገዳችን የጨዋታ ለውጥ ነው።",
                testimonial3_position: "ምክትል መስራች፣ ግሪንቴክ ኢኖቬሽንስ",
                cta_heading: "ሙያዎን ወይም የቅጥር ሂደትዎን ለመቀየር ዝግጁ ኖት?",
                cta_subheading: "በቦሳጆብስ የተሳካላቸውን በሺዎች የሚቆጠሩ ባለሙያዎች እና ኩባንያዎች ይቀላቀሉ",
                post_job: "ስራ ለመለጠፍ",
                browse_jobs: "ስራዎችን ይመልከቱ",
                footer_description: "በጅማ ከተማ ብቁ ሰዎችን ከእድል ጋር በማገናኘት ላይ። የእኛ ተልእኮ የሙያ እድገት ለክልሉ ሁሉም ሰው ተደራሽ ማድረግ ነው።",
                for_candidates: "ለተፈላጊዎች",
                for_employers: "ለሰራተኞች",
                contact_us: "አግኙን",
                resume_builder: "ሲቪ ገንቢ",
                job_alerts: "የስራ ማሳወቂያዎች",
                browse_candidates: "ተፈላጊዎችን ይመልከቱ",
                location: "ጅማ፣ ኢትዮጵያ",
                phone: "+251 912 345 678",
                email: "info@JobPortaljobs.com",
                all_rights: "ሁሉም መብቶች የተጠበቁ ናቸው"
            },
            om: {
                about_page_title: "Waa'ee Keenya | JobPortal",
                brand_name: "JobPortal Jobs",
                home: "Mana",
                about: "Waa'ee",
                jobs: "Hojiiwwan",
                "how-it-works": "Akkamitti Tajaajila",
                login: "Seeni",
                signup: "Galmaa'i",
                about_heading: "Waa'ee JobPortal",
                about_description: "Ogeessota qophii qaban qabeenya hojii abjuu isaanii waliin 2015 irraa walitti qabsiisuun. Kaayyoo keenya hojii barbaachuu fi hiriyoota hojii argachuu mijataa, gahaa fi gahaa ta'uu isaati.",
                our_story: "Seenaa Keenya",
                story_paragraph1: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor, nisl eget ultricies tincidunt, nisl nisl aliquam nisl, eget ultricies nisl nisl eget nisl. Sed euismod, nisl eget ultricies tincidunt, nisl nisl aliquam nisl, eget ultricies nisl nisl eget nisl. Sed euismod, nisl eget ultricies tincidunt, nisl nisl aliquam nisl, eget ultricies nisl nisl eget nisl. Sed euismod, nisl eget ultricies tincidunt, nisl nisl aliquam nisl, eget ultricies nisl nisl eget nisl.",
                story_paragraph2: "Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi.",
                mission_values_heading: "Kaayyoo fi Qoosaa Keenya",
                mission_values_subheading: "Kun qoosaa keenya waan hundaa keessatti nu gargaara",
                mission_title: "Kaayyoo Keenya",
                mission_text: "Namoota qabeenya hojii isaanii keessatti gargaaruuf fi kampaanootaaf qabeenya hojii guddaa qaban argachuuf teknooloojii jijjiiramaa fi tajaajila itti aanuun gargaaruuf.",
                people_first_title: "Namoota Dura",
                people_first_text: "Qabeenya hojii jireenya jijjiira. Walqunnamtii hundi namoota qabeenya hojii isaanii keessatti gargaaruuf carraa ta'a.",
                innovation_title: "Jijjiirama",
                innovation_text: "Qajeelcha keenya hojii barbaachuu fi hojii qabu mijataa fi gahaa ta'uuf teknooloojii haaraa dabaluun jijjiiramaa jirra.",
                integrity_title: "Dhugaa",
                integrity_text: "Walqunnamtii keenya hundaa keessatti ifa ta'uu fi dhugaa dhaabbachuun, namoota hojii barbaaduu fi hojii qaban waliin amanamummaa uumuun jirra.",
                inclusivity_title: "Walqixa",
                inclusivity_text: "Namoota hundaa carraa kennuuf fi hojii irratti walqixummaa dhiyeessuuf kanneen qophaa'e.",
                excellence_title: "Guddina",
                excellence_text: "Waan hundaa keessatti guddina guddaa ta'uu eegaluun, kanneen akka teknooloojii keenyaa fi tajaajila keenyaa irraa ka'eera.",
                team_heading: "Gareen Hoggantoota Keenya Waliin Walqunnamuu",
                team_subheading: "Namoota qophaa'e kaayyoo keenya gargaaruuf",
                ceo_title: "Pireezidaantii fi Duudhaa",
                cteo_title: "Pireezidaantii Teknooloojii",
                vp_product_title: "Pireezidaantii Oomisha",
                vp_marketing_title: "Pireezidaantii Gabaasaa",
                testimonials_heading: "Namootni Waa'ee Keenya Maal Jedhu?",
                testimonials_subheading: "Namoota hojii barbaaduu fi hojii qaban qajeelcha keenya fayyadatan irraa dhaggeeffadhaa",
                testimonial1_text: "JobPortal sirna hiree keenya jijjiira. Hojiiwwan hiree argachuu dadhabaa hiree sadii ta'an guyyaa torba lama keessatti argine. Qulqullinni hiree kanneen qajeelcha biroo irra caalaa ture.",
                testimonial1_position: "Pireezidaantii HR, Teknooloojii Solushiniz",
                testimonial2_text: "Ji'a baay'ee bakka biroo irraa barbaadee booda, hojii abjuu koo JobPortal irraa guyyaa torba sadiin argadhe! Qajeelcha hiree fi sirna hiree mijataan adda baafate.",
                testimonial2_position: "Ogeessa Sooftiweerii Ol'aanaa",
                testimonial3_text: "Qajeelcha JobPortal qabeenya hiree keenya keessatti gargaarsa guddaa kenne. Yeroo hiree keenya 40% hir'isinee, qulqullina hiree dabaluun jirra. Jijjiirama guddaa guddina keenyaaf.",
                testimonial3_position: "Duudhaa, GreenTek Innooveeshiniz",
                cta_heading: "Qabeenya Hojii Keessan Jijjiirachuu Dandeessuu?",
                cta_subheading: "Miriyoonota namootaa fi kampaanootaa JobPortal irraa milkaa'aniin walitti makamuu",
                post_job: "Hojii Galmeessi",
                browse_jobs: "Hojiiwwan Ilaali",
                footer_description: "Jimma Magaalaa keessatti qabeenya hojiiwwanii fi carraa waliin walqabsiisuun. Kaayyoo keenya guddina qabeenya hojiiwwanii naannoo keessatti namoota hundaa gahaa ta'uu isaati.",
                for_candidates: "Hojii Barbaadootaaf",
                for_employers: "Hojii Qabsooftaaf",
                contact_us: "Nu Qunnamuu",
                resume_builder: "CV Ijaaru",
                job_alerts: "Beellama Hojii",
                browse_candidates: "Hojii Barbaadoota Ilaali",
                location: "Jimmaa, Itoophiyaa",
                phone: "+251 912 345 678",
                email: "info@JobPortaljobs.com",
                all_rights: "Mirga Hundaa Kan Eegamu"
            }
        };

        function changeLanguage(lang) {
            document.querySelectorAll('[data-translate]').forEach(element => {
                const key = element.getAttribute('data-translate');
                if (translations[lang] && translations[lang][key]) {
                    if (element.tagName === 'INPUT' && element.placeholder) {
                        element.placeholder = translations[lang][key];
                    } else {
                        element.textContent = translations[lang][key];
                    }
                }
            });
            if (translations[lang] && translations[lang]['about_page_title']) {
                document.title = translations[lang]['about_page_title'];
            }
            localStorage.setItem('selectedLanguage', lang);
        }
        const savedLanguage = localStorage.getItem('selectedLanguage') || 'en';
        changeLanguage(savedLanguage);

        document.querySelector(`.language-btn[data-lang="${savedLanguage}"]`).classList.add('active');
        document.querySelector(`.dropdown-menu a[data-lang="${savedLanguage}"] .language-check`).classList.add('fa-check');
        document.querySelector(`.dropdown-menu a[data-lang="${savedLanguage}"] .language-check`).classList.remove('fa-globe');
        document.querySelector('.current-language').textContent =
            document.querySelector(`.dropdown-menu a[data-lang="${savedLanguage}"]`).textContent.trim();

        const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
        const navLinks = document.querySelector('.horizontal-bar');

        mobileMenuBtn.addEventListener('click', () => {
            navLinks.style.display = navLinks.style.display === 'flex' ? 'none' : 'flex';
        });

        window.addEventListener('resize', () => {
            if (window.innerWidth > 768) {
                navLinks.style.display = 'flex';
            } else {
                navLinks.style.display = 'none';
            }
        });

        const testimonials = document.querySelectorAll('.testimonial');
        const dots = document.querySelectorAll('.testimonial-dot');
        let currentTestimonial = 0;

        function showTestimonial(index) {
            testimonials.forEach(testimonial => testimonial.classList.remove('active'));
            dots.forEach(dot => dot.classList.remove('active'));

            testimonials[index].classList.add('active');
            dots[index].classList.add('active');
            currentTestimonial = index;
        }

        dots.forEach(dot => {
            dot.addEventListener('click', () => {
                showTestimonial(parseInt(dot.getAttribute('data-index')));
            });
        });

        setInterval(() => {
            currentTestimonial = (currentTestimonial + 1) % testimonials.length;
            showTestimonial(currentTestimonial);
        }, 5000);

    </script>
</body>

</html>