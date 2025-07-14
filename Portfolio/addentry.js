// Function to handle the Clear button confirmation
function handleClearClick(event) {
    const confirmClear = confirm("Are you sure you want to clear the post?");
    if (!confirmClear) {
        event.preventDefault(); // stop the default clear/reset
    }
}

// Function to validate fields before submitting the form
function handlePostClick(event) {
    const title = document.getElementById("title").value;
    const text = document.getElementById("text").value;

    if (title === "" || text === "") {
        event.preventDefault(); // prevent form submission
        alert("Both Title and Post fields are required.");
    }
}

// Attach event listeners
const clearButton = document.querySelector('button[type="reset"]');
const postButton = document.querySelector('button[type="submit"]');

clearButton.addEventListener("click", handleClearClick);
postButton.addEventListener("click", handlePostClick);