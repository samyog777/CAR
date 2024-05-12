function navigate(url) {
    window.location.href = url;
}

function addItem() {
    var input = document.querySelector("#itemInput");
    var item = input.value.trim();
    if (item !== "") {
        // Create a new list item
        var listItem = document.createElement("li");
        listItem.textContent = item;

        // Append the new list item to the list
        document.getElementById("itemList").appendChild(listItem);

        // Clear the input field
        input.value = "";
    }
}
// Get the current path of the URL
const currentPath = window.location.pathname;

// Function to handle navigation
function navigate(url) {
    // Implement your navigation logic here
    // For demonstration purposes, I'm just redirecting to the specified URL
    window.location.href = url;
}

// Check if the current path matches the navigation items and change background color
if (currentPath.includes('index.php')) {
    document.getElementById('nav1').style.backgroundColor = '#030459';
} else if (currentPath.includes('Add.php')) {
    document.getElementById('nav2').style.backgroundColor = '#030459';
} else if (currentPath.includes('profile.php')) {
    document.getElementById('nav3').style.backgroundColor = '#030459';
}
