// Import Bootstrap (includes Popper)
import "bootstrap";

import "@fortawesome/fontawesome-free/css/all.min.css";

// Import custom CSS or SCSS
import "../css/app.css"; // Or use '../sass/app.scss' if you're using SCSS

// Font Awesome (icons)
import "@fortawesome/fontawesome-free/css/all.min.css";

// Animate.css (for UI transitions)
import "animate.css";

// Alpine.js (lightweight interactivity)
import Alpine from "alpinejs";
window.Alpine = Alpine;
Alpine.start();

// jQuery (optional, only if needed for legacy Bootstrap plugins)
import $ from "jquery";
window.$ = $;

// Tooltip initialization (Bootstrap)
document.addEventListener("DOMContentLoaded", () => {
    const tooltipTriggerList = [].slice.call(
        document.querySelectorAll('[data-bs-toggle="tooltip"]')
    );
    tooltipTriggerList.forEach((tooltipTriggerEl) => {
        new bootstrap.Tooltip(tooltipTriggerEl);
    });
});

// Toast auto-dismiss (Bootstrap)
document.addEventListener("DOMContentLoaded", () => {
    const toastElList = [].slice.call(document.querySelectorAll(".toast"));
    toastElList.forEach((toastEl) => {
        const toast = new bootstrap.Toast(toastEl);
        toast.show();
    });
});

// Optional: Custom JS scripts
// import './custom'; // Add your own JS logic here

console.log("App.js loaded successfully");
