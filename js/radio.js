document.addEventListener("DOMContentLoaded", function () {
    const radioWrapper = document.querySelector(".radio-wrapper");
  
    if (!radioWrapper) return;
  
    // Zet HIER direct de class hidden in het DOM
    radioWrapper.classList.add("hidden");
  
    const observer = new IntersectionObserver(
      entries => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            radioWrapper.classList.remove("hidden");
            radioWrapper.classList.add("animate");
            observer.unobserve(radioWrapper);
          }
        });
      },
      {
        threshold: 0.3,
      }
    );
  
    observer.observe(radioWrapper);
  });
  