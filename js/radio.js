document.addEventListener("DOMContentLoaded", function () {
  const radioWrapper = document.querySelector(".radio-wrapper");
  if (!radioWrapper) return;

  const observer = new IntersectionObserver(
    entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          radioWrapper.classList.add("animate");
          observer.unobserve(radioWrapper);
        }
      });
    },
    {
      threshold: 0.3,
      rootMargin: "0px 0px -50px 0px" // ⬅️ belangrijk
    }
  );

  observer.observe(radioWrapper);
});
