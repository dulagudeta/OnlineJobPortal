function showTab(tabId) {
  document.querySelectorAll(".tab-content").forEach((tab) => {
    tab.classList.remove("active");
  });

  document.getElementById(tabId).classList.add("active");

  document.querySelectorAll(".sidebar a").forEach((link) => {
    link.classList.remove("active");
  });

  const sidebarLinks = document.querySelectorAll(".sidebar a");
  for (let i = 0; i < sidebarLinks.length; i++) {
    if (sidebarLinks[i].getAttribute("onclick")?.includes(tabId)) {
      sidebarLinks[i].classList.add("active");
      break;
    }
  }
}

function confirmDelete(id) {
  if (confirm("Are you sure you want to delete this item?")) {
    alert("Item with ID " + id + " will be deleted.");
    // In a real application, you would redirect to a delete script
    // window.location.href = "delete.php?id=" + id;
  }
}

document.addEventListener("DOMContentLoaded", function () {
  showTab("dashboard");
});
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
  if (confirm("Are you sure you want to logout?")) {
    alert("You have been logged out.");

    window.location.href = "../auth/logout.php";
  }
}
