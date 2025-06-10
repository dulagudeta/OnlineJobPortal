const translations = {
  en: {
    welcome: "Welcome to Your Dashboard",
    company_name: "Abeba Solutions",
    home: "Home",
    company_profile: "Company Profile",
    post_job: "Post New Job",
    logout: "Logout",
    profile_desc: "Update your company information and manage your profile.",
    view_profile: "View Profile",
    post_job_desc: "Create and manage job listings to attract candidates.",
    post_job_btn: "Post Job",
    posted_jobs: "Previously Posted Jobs",
    view_applicants: "View Applicants",
    delete: "Delete",
    job_title: "Job Title:",
    location: "Location:",
    salary: "Salary:",
    employment_type: "Employment Type:",
    full_time: "Full-time",
    part_time: "Part-time",
    freelance: "Freelance",
    required_skills: "Required Skills:",
    job_description: "Job Description:",
    application_deadline: "Application Deadline:",
    edit_profile: "Edit Company Profile",
    contact_email: "Contact Email:",
    phone_number: "Phone Number:",
    company_website: "Company Website:",
    upload_logo: "Upload Logo:",
    company_description: "Company Description:",
    save_changes: "Save Changes",
  },
  am: {
    welcome: "ወደ ዳሽቦርድዎ እንኳን በደህና መጡ",
    company_name: "አበባ ሶሉሽንስ",
    home: "ዋና ገጽ",
    company_profile: "የኩባንያ መገለጫ",
    post_job: "አዲስ ስራ ለመለጠፍ",
    logout: "ውጣ",
    profile_desc: "የድርጅትዎን መረጃ ያዘምኑ እና መገለጫዎን ያስተዳድሩ።",
    view_profile: "መገለጫ ይመልከቱ",
    post_job_desc: "እጩዎችን ለመሳብ የስራ ዝርዝሮችን ይፍጠሩ እና ያስተዳድሩ።",
    post_job_btn: "ስራ ይለጥፉ",
    posted_jobs: "ቀደም ብለው የቀረቡ ስራዎች",
    view_applicants: "እጩዎችን ይመልከቱ",
    delete: "ሰርዝ",
    job_title: "የስራ ርዕስ:",
    location: "አካባቢ:",
    salary: "ደሞዝ:",
    employment_type: "የስራ አይነት:",
    full_time: "ሙሉ ጊዜ",
    part_time: "ከፊል ጊዜ",
    freelance: "ፍሪላንስ",
    required_skills: "የሚያስፈልጉ ችሎታዎች:",
    job_description: "የስራ መግለጫ:",
    application_deadline: "የማመልከቻ_የመጨረሻ ቀን:",
    edit_profile: "የኩባንያ መገለጫን አርትዕ",
    contact_email: "የኢሜል አድራሻ:",
    phone_number: "ስልክ ቁጥር:",
    company_website: "የኩባንያ ድረገጽ:",
    upload_logo: "ሎጎ ይስቀሉ:",
    company_description: "የኩባንያ መግለጫ:",
    save_changes: "ለውጦችን አስቀምጥ",
  },
  om: {
    welcome: "Baga nagaan gara Dashboard keessaniitti dhuftan",
    company_name: "Abeba Solutions",
    home: "fuula jalqabaa",
    company_profile: "Profile Dhaabbataa",
    post_job: "Hojii Haaraa Maxxansuuf",
    logout: "Ba'i",
    profile_desc:
      "Odeeffannoo dhaabbataa keessanii haaromsuu fi profile keessanii to'achuuf.",
    view_profile: "Profile Ilaali",
    post_job_desc: "Kaadhimamaa hawwachuuf tarree hojii uumuu fi to'achuu.",
    post_job_btn: "Hojii maxxansi",
    posted_jobs: "Hojiiwwan Duraan maxxansitan",
    view_applicants: "kaadhimamaa Ilaali",
    delete: "Haquu",
    job_title: "Mata Duree Hojii:",
    location: "Bakka:",
    salary: "Miindaa:",
    employment_type: "Gosa Hojii:",
    full_time: "Yeroo Guutuu",
    part_time: "Yeroo muraasaaf",
    freelance: "Freeelensii",
    required_skills: "Dandeettiwwan Barbaachisoo:",
    job_description: "Ibsa Hojii:",
    application_deadline: "Guyyaa Xumura Galmee:",
    edit_profile: "Profile Dhaabbataa Sirreessi",
    contact_email: "Imeelii Qunnamtii:",
    phone_number: "Lakkoofsa Bilbila:",
    company_website: "Website Dhaabbataa:",
    upload_logo: "Loogoo :",
    company_description: "Ibsa Dhaabbataa:",
    save_changes: "jijjiirama_galmeessi",
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
    }
  });
}

changeLanguage("en");

function showDashboard() {
  document.getElementById("dashboard-content").style.display = "block";
  document.getElementById("form-container").style.display = "none";
  document.getElementById("company-profile-section").style.display = "none";
}

function showJobForm() {
  document.getElementById("dashboard-content").style.display = "none";
  document.getElementById("form-container").style.display = "block";
  document.getElementById("company-profile-section").style.display = "none";
}

function showCompanyProfile() {
  document.getElementById("dashboard-content").style.display = "none";
  document.getElementById("form-container").style.display = "none";
  document.getElementById("company-profile-section").style.display = "block";
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
function logout() {
  alert("Logging out...");
}
document
  .querySelector(".view-applicant")
  .addEventListener("click", function () {
    const jobId = this.getAttribute("data-job-id");
    window.location.href = "view_applicants.php?job_id=" + jobId;
  });
document.querySelector(".remove-job").addEventListener("click", function () {
  window.location.href = "remove-job.php";
});
document.querySelector(".view-profile").addEventListener("click", function () {
  window.location.href = "update_profile.php";
});
document.querySelector(".post-job").addEventListener("click", function () {
  window.location.href = "post_job.php";
});
