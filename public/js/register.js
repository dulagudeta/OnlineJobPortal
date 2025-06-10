const translations = {
    en: {
      title: "Join Our Talent Network",
      subtitle: "Find your dream job or the perfect candidate",
      candidate: "Candidate",
      employer: "Employer",
      first_name: "First Name",
      last_name: "Last Name",
      company_name: "Company Name",
      email: "Email",
      password: "Password",
      confirm_password: "Confirm Password",
      register_candidate: "Register as Candidate",
      register_employer: "Register as Employer"
    },
    am: {
      title: "ወደ ብቁ ባለችሎታችን ኔትዎርክ ይቀላቀሉ",
      subtitle: "የሕልምዎን ሥራ ወይም ትክክለኛውን እጩ ያግኙ",
      candidate: "እጩ",
      employer: "ቀጣሪ",
      first_name: "የመጀመሪያ ስም",
      last_name: "የአባት ስም",
      company_name: "የኩባንያ ስም",
      email: "ኢሜይል",
      password: "የይለፍ ቃል",
      confirm_password: "የይለፍ ቃል ያረጋግጡ",
      register_candidate: "እንደ እጩ ይመዝገቡ",
      register_employer: "እንደ ቀጣሪ ይመዝገቡ"
    },
    om: {
      title: "neetworkii Ogummaa Keenyaatti Hirmaadhaa",
      subtitle: "Hojii abjuu keessaanii yookiin hojjetaa sirrii ta'e argadhaa",
      candidate: "Kadhimamaa",
      employer: "kan qacaru",
      first_name: "Maqaa Duraa",
      last_name: "Maqaa Abbaa",
      company_name: "Maqaa Dhaabbataa",
      email: "Imeelii",
      password: "Jecha Darbii",
      confirm_password: "Jecha Darbii Mirkaneessuu",
      register_candidate: "Akka Kadhimamaatti Galmaa'i",
      register_employer: "Akka kan qacarutti Galmaa'i"
    }
  };

  function togglePassword(inputId, button) {
    const input = document.getElementById(inputId);
    if (input.type === "password") {
      input.type = "text";
      button.textContent = "Hide";
    } else {
      input.type = "password";
      button.textContent = "Show";
    }
  }


  document.querySelectorAll('.language-btn').forEach(button => {
    button.addEventListener('click', function() {
      const lang = this.getAttribute('data-lang');
      changeLanguage(lang);
    });
  });

  function changeLanguage(lang) {

    document.querySelectorAll('.language-btn').forEach(btn => {
      btn.classList.remove('active');
      if (btn.getAttribute('data-lang') === lang) {
        btn.classList.add('active');
      }
    });

    document.querySelectorAll('[data-translate]').forEach(element => {
      const key = element.getAttribute('data-translate');
      if (translations[lang] && translations[lang][key]) {
        element.textContent = translations[lang][key];
      }
    });
    
    currentLang = lang;
  }

  const candidateTab = document.getElementById("candidateTab");
  const employerTab = document.getElementById("employerTab");
  const candidateForm = document.getElementById("candidateForm");
  const employerForm = document.getElementById("employerForm");

  candidateTab.onclick = () => {
    candidateTab.classList.add("active");
    employerTab.classList.remove("active");
    candidateForm.classList.add("active");
    employerForm.classList.remove("active");
  };

  employerTab.onclick = () => {
    employerTab.classList.add("active");
    candidateTab.classList.remove("active");
    employerForm.classList.add("active");
    candidateForm.classList.remove("active");
  };

  let currentLang = 'en';
  changeLanguage(currentLang);