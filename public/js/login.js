const translations = {
    en: {
      welcome: "Welcome Back",
      login_message: "Login to access your account",
      email: "Email Address",
      email_placeholder: "Enter your email",
      password: "Password",
      password_placeholder: "Enter your password",
      show: "Show",
      hide: "Hide",
      forgot_password: "Forgot password?",
      login_button: "Login",
      no_account: "Don't have an account?",
      signup_link: "Sign up"
    },
    am: {
      welcome: "እንኳን ደህና መጡ",
      login_message: "ወደ አካውንትዎ ይግቡ",
      email: "ኢሜይል አድራሻ",
      email_placeholder: "ኢሜይልዎን ያስገቡ",
      password: "የይለፍ ቃል",
      password_placeholder: "የይለፍ ቃልዎን ያስገቡ",
      show: "አሳይ",
      hide: "ደብቅ",
      forgot_password: "የይለፍ ቃል ረሱ??",
      login_button: "ግባ",
      no_account: "አካውንት የሎትም?",
      signup_link: "ይመዝገቡ"
    },
    om: {
      welcome: "Baga Nagaan Dhuftan",
      login_message: "Akkaawuntii keessan argachuuf seenaa",
      email: "Imeelii",
      email_placeholder: "Imeelii keessan galchaa",
      password: "Jecha Darbii",
      password_placeholder: "Jecha darbii keessan galchaa",
      show: "Agarsiisi",
      hide: "Dhoksi",
      forgot_password: "Jecha darbii dagattanii?",
      login_button: "Seenaa",
      no_account: "Akkaawuntii hin qabdanii?",
      signup_link: "Galmaa'aa"
    }
  };

  // Language switching functionality
  document.querySelectorAll('.language-btn').forEach(button => {
    button.addEventListener('click', function() {
      const lang = this.getAttribute('data-lang');
      changeLanguage(lang);
    });
  });

  function changeLanguage(lang) {
    // Update active language button
    document.querySelectorAll('.language-btn').forEach(btn => {
      btn.classList.remove('active');
      if (btn.getAttribute('data-lang') === lang) {
        btn.classList.add('active');
      }
    });

    // Update all translatable elements
    document.querySelectorAll('[data-translate]').forEach(element => {
      const key = element.getAttribute('data-translate');
      if (translations[lang] && translations[lang][key]) {
        element.textContent = translations[lang][key];
      }
    });

    // Update placeholder texts
    document.querySelectorAll('[data-translate-placeholder]').forEach(element => {
      const key = element.getAttribute('data-translate-placeholder');
      if (translations[lang] && translations[lang][key]) {
        element.setAttribute('placeholder', translations[lang][key]);
      }
    });
    
    currentLang = lang;
  }

  function togglePassword(id) {
    const input = document.getElementById(id);
    const btn = input.nextElementSibling;
    if (input.type === "password") {
      input.type = "text";
      btn.textContent = translations[currentLang]?.hide || "Hide";
      btn.style.color = "#4682b4";
    } else {
      input.type = "password";
      btn.textContent = translations[currentLang]?.show || "Show";
      btn.style.color = "rgba(255, 255, 255, 0.7)";
    }
  }

  // Add animation to form inputs when page loads
  document.addEventListener('DOMContentLoaded', () => {
    const inputs = document.querySelectorAll('input');
    inputs.forEach((input, index) => {
      input.style.opacity = '0';
      input.style.transform = 'translateY(20px)';
      input.style.transition = `all 0.5s ease ${index * 0.1}s`;
      setTimeout(() => {
        input.style.opacity = '1';
        input.style.transform = 'translateY(0)';
      }, 100);
    });
    
    // Initialize with English
    changeLanguage('en');
  });