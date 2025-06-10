const translations = {
  en: {
    dashboard: "Dashboard",
    search_jobs: "Search Jobs",
    jobs_applied: "Jobs Applied",
    recent_jobs: "Recent Jobs",
    view_companies: "View Companies",
    profile: "Profile",
    logout: "Logout",
    welcome: "Welcome to Your Dashboard",
    welcome_message:
      "Find your dream job and start your journey towards a brighter future today.",
    search_placeholder: "Search by title, location...",
    search: "Search",
    company: "Company:",
    location: "Location:",
    industry: "Industry:",
    posted_date: "Posted date:",
    applied_date: "Applied date:",
    status: "Status:",
    view_details: "View Details",
    see_more: "See More",
    apply: "Apply",
    withdraw: "Withdraw",
    job_results: "Job Results",
    companies: "Companies You May Find",
    update_profile: "Update Your Profile",
    profile_picture: "Profile Picture:",
    full_name: "Full name:",
    email: "Email:",
    phone: "Phone:",
    field: "Field:",
    country: "Country:",
    address: "Address:",
    experience: "Years of Experience:",
    education: "Highest Education:",
    gender: "Gender:",
    male: "Male",
    female: "Female",

    description: "Professional Summary:",
    resume: "Upload Resume:",
    save_profile: "Save Profile",
  },
  am: {
    dashboard: "ዳሽቦርድ",
    search_jobs: "ስራዎችን ፈልግ",
    jobs_applied: "የተመዘገቡ ስራዎች",
    recent_jobs: "የቅርብ ስራዎች",
    view_companies: "ኩባንያዎችን ይመልከቱ",
    profile: "መገለጫ",
    logout: "ውጣ",
    welcome: "ወደ ዳሽቦርድዎ እንኳን በደህና መጡ",
    welcome_message: "የህልም ስራዎን ይፈልጉ እና ወደ ብሩህ የወደፊት ጉዞ ዛሬ ይጀምሩ።",
    search_placeholder: "በርዕስ፣ በአካባቢ ፈልግ...",
    search: "ፈልግ",
    company: "ኩባንያ:",
    location: "አካባቢ:",
    industry: "ኢንዱስትሪ:",
    posted_date: "የተለጠፈበት ቀን:",
    applied_date: "ያመለከቱበት ቀን:",
    status: "ሁኔታ:",
    view_details: "ዝርዝሮችን ይመልከቱ",
    see_more: "ተጨማሪ ይመልከቱ",
    apply: "ያመልክቱ",
    withdraw: "መሰረዝ",
    job_results: "የስራ ውጤቶች",
    companies: "ሊያገኟቸው የሚችሉ ኩባንያዎች",
    update_profile: "መገለጫዎን ያዘምኑ",
    profile_picture: "የመገለጫ ፎቶ:",
    full_name: "ሙሉ ስም:",
    email: "ኢሜይል:",
    phone: "ስልክ:",
    field: "ሙያ:",
    country: "ሀገር:",
    address: "አድራሻ:",
    experience: "የልምድ ዓመታት:",
    education: "ከፍተኛ ትምህርት:",
    gender: "ጾታ:",
    male: "ወንድ",
    female: "ሴት",

    description: "የሙያ ማጠቃለያ:",
    resume: "ሲቪ ይጫኑ:",
    save_profile: "መገለጫ አስቀምጥ",
  },
  om: {
    dashboard: "Daashboordii",
    search_jobs: "Hojiiwwan Barbaadi",
    jobs_applied: "Hojiiwwan Galmooftan",
    recent_jobs: "Hojiiwwan dhiyoo",
    view_companies: "Dhaabbilee Ilaali",
    profile: "Profile",
    logout: "Ba'i",
    welcome: "Baga nagaan gara Daashboordii keessanitti dhuftan",
    welcome_message:
      "Hojii abjuu keetii barbaaduun imala kee gara egeree ifa ta'etti har'a jalqabi",
    search_placeholder: "Maqaa, iddoo... n barbaaduuf",
    search: "Barbaadi",
    company: "Dhaabbata:",
    location: "Bakka:",
    industry: "Industirii:",
    posted_date: "Guyyaa maxxanffame:",
    applied_date: "Guyyaa galmooftan:",
    status: "Haala:",
    view_details: "bal’inaan ilaali",
    see_more: "Dabalataan ilaali",
    apply: "Galmaa'i",
    withdraw: "Haqi",
    job_results: "Bu'aa Hojii",
    companies: "Dhaabbilee argachuu dandeessan",
    update_profile: "Profile Sirreessi",
    profile_picture: "Suuraa Profile:",
    full_name: "Maqaa Guutuu:",
    email: "Imeelii:",
    phone: "Bilbila:",
    field: "Ogummaa:",
    country: "Biyya:",
    address: "Teessoo:",
    experience: "Waggaa Muuxannoo:",
    education: "Barnoota Ol'aanaa:",
    gender: "Saala:",
    male: "Dhiira",
    female: "Dhalaa",

    description: "Waa'ee Ogummaa Kee:",
    resume: "CV fe'i:",
    save_profile: "Profile Galmeessi",
  },
};

document.querySelectorAll(".language-btn").forEach((button) => {
  button.addEventListener("click", function () {
    const lang = this.getAttribute("data-lang");
    changeLanguage(lang);
  });
});

function changeLanguage(lang) {
  document.querySelectorAll(".language-btn").forEach((btn) => {
    btn.classList.remove("active");
    if (btn.getAttribute("data-lang") === lang) {
      btn.classList.add("active");
    }
  });

  document.querySelectorAll("[data-translate]").forEach((element) => {
    const key = element.getAttribute("data-translate");
    if (translations[lang] && translations[lang][key]) {
      element.textContent = translations[lang][key];
      if (element.placeholder) {
        element.placeholder = translations[lang][key];
      }
    }
  });
}

function setActiveNav(item) {
  document.querySelectorAll(".sidebar a").forEach((link) => {
    link.classList.remove("active");
    if (link.getAttribute("data-translate") === item) {
      link.classList.add("active");
    }
  });
}
document.addEventListener("DOMContentLoaded", function () {
  const menuToggle = document.querySelector(".menu-toggle");
  const sidebar = document.querySelector(".sidebar");
  const overlay = document.querySelector(".overlay");

  menuToggle.addEventListener("click", function () {
    sidebar.classList.toggle("active");
    overlay.classList.toggle("active");
  });

  overlay.addEventListener("click", function () {
    sidebar.classList.remove("active");
    overlay.classList.remove("active");
  });
});
function previewProfilePicture(input) {
  if (input.files && input.files[0]) {
    const reader = new FileReader();
    reader.onload = function (e) {
      document.getElementById("profile-display").src = e.target.result;
    };
    reader.readAsDataURL(input.files[0]);
  }
}

function logout() {
  alert("Logging out...");
}
function showConfirmation() {
  const letter = document.getElementById("cover_letter").value.trim();
  if (letter === "") {
    alert("Please enter a cover letter.");
    return false;
  }
  document.getElementById("confirmation").style.display = "block";
  return true;
}

const applicationForm = document.querySelector(".application-form");
const applicationButton = document.querySelector("#apply");
applicationButton.addEventListener("click", function (event) {
  event.preventDefault();
  applicationForm.style.display = "block";
  applicationButton.style.display = "none";
});
changeLanguage("en");
