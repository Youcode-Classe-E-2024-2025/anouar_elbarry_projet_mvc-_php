document.addEventListener('DOMContentLoaded', function () {
    // Get all buttons with the data-toggle attribute
    const toggleButtons = document.querySelectorAll('[data-toggle="dropdown"]');

    // Add click event listeners to each button
    toggleButtons.forEach(button => {
        const dropdown = button.nextElementSibling; // The dropdown is the next sibling of the button

        button.addEventListener('click', function (event) {
            event.preventDefault(); // Prevent default action (if any)

            // Toggle the 'hidden' class on the dropdown
            dropdown.classList.toggle('hidden');
        });
    });

    // Close the dropdown if clicking outside of it
    document.addEventListener('click', function (event) {
        toggleButtons.forEach(button => {
            const dropdown = button.nextElementSibling;

            // If the click is not on the button or the dropdown itself, hide the dropdown
            if (!button.contains(event.target) && !dropdown.contains(event.target)) {
                dropdown.classList.add('hidden');
            }
        });
    });
});