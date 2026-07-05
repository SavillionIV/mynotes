// Mobile menu
const menuBtn = document.getElementById("menuBtn");
const nav = document.getElementById("nav");

menuBtn.addEventListener("click", () => {
  nav.classList.toggle("open");
});

// Seasonal theme switcher
const hero = document.getElementById("hero");
const seasonLabel = document.getElementById("seasonLabel");
const summerBtn = document.getElementById("summerBtn");
const winterBtn = document.getElementById("winterBtn");

summerBtn.addEventListener("click", () => {
  hero.classList.remove("winter");
  hero.classList.add("summer");
  seasonLabel.textContent = "Summer Services";
  summerBtn.classList.add("active");
  winterBtn.classList.remove("active");
});

winterBtn.addEventListener("click", () => {
  hero.classList.remove("summer");
  hero.classList.add("winter");
  seasonLabel.textContent = "Winter / Christmas Services";
  winterBtn.classList.add("active");
  summerBtn.classList.remove("active");
});
