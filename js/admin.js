function editUserInfo() {
    // Display the edit modal
    document.getElementById("editModal").style.display = "block";
}

function saveChanges() {
    // Get the new values from the input fields
    var newName = document.getElementById("newName").value;
    var newEmail = document.getElementById("newEmail").value;
    var newPhone = document.getElementById("newPhone").value;

    // Update the user information in the table
    document.getElementById("userName").innerText = newName;
    document.getElementById("userEmail").innerText = newEmail;
    document.getElementById("userPhone").innerText = newPhone;

    // Close the edit modal
    document.getElementById("editModal").style.display = "none";
}

function deleteUser() {
    // Confirm the action with the user
    var confirmDelete = confirm("Bạn có chắc muốn xóa người dùng này?");

    // If the user confirms, delete the row
    if (confirmDelete) {
        var table = document.querySelector('table');
        var row = document.querySelector('tr');
        table.removeChild(row);
    }
    
}