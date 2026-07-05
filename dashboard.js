document.addEventListener("DOMContentLoaded", function () {
    const reminderForm = document.getElementById("reminderForm");
    const reminderText = document.getElementById("reminderText");

    if (reminderForm) {
        reminderForm.addEventListener("submit", function (event) {
            if (reminderText.value.trim() === "") {
                event.preventDefault();
                alert("Please enter a reminder.");
            }
        });
    }

    const sidebarCards = document.querySelectorAll(".sidebar-card");
    sidebarCards.forEach(card => {
        card.addEventListener("click", function () {
            card.classList.toggle("active-card");
        });
    });
});