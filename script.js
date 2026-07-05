/* =========================
   SEARCH FEATURE
   Filters items on the page as the user types
========================= */

// Grab the search input from the page
const searchInput = document.getElementById("searchInput");

// Grab all searchable items
const filterItems = document.querySelectorAll(".filter-item");

// Check that the search input exists before using it
if (searchInput) {
    // "input" runs every time the user types
    searchInput.addEventListener("input", function () {
        // Convert the typed text to lowercase for easier matching
        const searchText = searchInput.value.toLowerCase();

        // Loop through every searchable item
        filterItems.forEach(function (item) {
            // Get the text inside the item and convert it to lowercase
            const itemText = item.textContent.toLowerCase();

            // If the text matches, show the item
            if (itemText.includes(searchText)) {
                item.classList.remove("hidden");
            } else {
                // If it does not match, hide the item
                item.classList.add("hidden");
            }
        });
    });
}

/* =========================
   CONTACT FORM VALIDATION
   Checks that the user filled out the form correctly
========================= */

// Grab form elements from the page
const contactForm = document.getElementById("contactForm");
const nameInput = document.getElementById("name");
const emailInput = document.getElementById("email");
const messageInput = document.getElementById("message");
const formMessage = document.getElementById("formMessage");

// Function to test if an email looks valid
function isValidEmail(email) {
    // This is a simple pattern for checking email format
    return email.includes("@") && email.includes(".");
}

// Only run this if the form exists
if (contactForm) {
    contactForm.addEventListener("submit", function (event) {
        // Stops the form from actually submitting
        // Useful while we are testing with JavaScript only
        event.preventDefault();

        // Remove old error styles
        nameInput.classList.remove("error");
        emailInput.classList.remove("error");
        messageInput.classList.remove("error");

        // Clear old message
        formMessage.textContent = "";

        // Remove extra spaces from input values
        const nameValue = nameInput.value.trim();
        const emailValue = emailInput.value.trim();
        const messageValue = messageInput.value.trim();

        // Keeps track of whether the form is valid
        let isFormValid = true;

        // Validate name
        if (nameValue === "") {
            nameInput.classList.add("error");
            isFormValid = false;
        }

        // Validate email
        if (emailValue === "" || !isValidEmail(emailValue)) {
            emailInput.classList.add("error");
            isFormValid = false;
        }

        // Validate message
        if (messageValue === "") {
            messageInput.classList.add("error");
            isFormValid = false;
        }

        // If all fields are valid
        if (isFormValid) {
            formMessage.textContent = "Form submitted successfully! This is where PHP can be connected next.";
            formMessage.style.color = "lightgreen";

            // Reset the form after successful submission
            contactForm.reset();
        } else {
            // If there are errors
            formMessage.textContent = "Please fill out all fields correctly.";
            formMessage.style.color = "tomato";
        }
    });
}