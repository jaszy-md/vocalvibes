document.addEventListener("DOMContentLoaded", function () {
    const overlay = document.getElementById("exercise-overlay");
    const content = document.getElementById("exercise-content");
  
    if (!overlay || !content) return;
  
    overlay.addEventListener("click", () => {
      overlay.classList.add("fade-out");
  
      setTimeout(() => {
        overlay.classList.add("hidden");
      }, 500);
  
      content.classList.remove("hidden");
    });
  });
  