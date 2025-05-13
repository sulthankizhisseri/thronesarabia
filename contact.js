document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("contact-form").addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent form from reloading the page

        // Collect form data
        let formData = new FormData(this);

        // Send AJAX request
        fetch("contact.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.text()) // Get response as text
        .then(data => {
            let messageBox = document.getElementById("form-messages");
            messageBox.innerHTML = data;
            messageBox.classList.add("alert", "alert-info"); // Bootstrap styling
        })
        .catch(error => {
            let messageBox = document.getElementById("form-messages");
            messageBox.innerHTML = "Error sending message.";
            messageBox.classList.add("alert", "alert-danger");
        });

        // Clear form after submission
        this.reset();
    });
});