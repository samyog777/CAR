<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="../CSS/resetPassword.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php include 'NavBar.php'; ?>
    <div class="reset-password-container">
        <h1>Reset Password</h1>
        <form action="reset_password_process.php" method="POST" class="reset-password-form">
            <div class="form-group">
                <label for="old_password">Old Password:</label>
                <div class="pass">
                    <input type="password" id="old_password" name="old_password" required>
                    <span class="toggleIcon" onclick="togglePassword('old_password')"><i class="fa-solid fa-eye"></i></span>
                </div>
            </div>
            <div class="form-group">
                <label for="new_password">New Password:</label>
                <div class="pass">
                    <input type="password" id="new_password" name="new_password" required>
                    <span class="toggleIcon" onclick="togglePassword('new_password')"><i class="fa-solid fa-eye"></i></span>
                </div>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <div class="pass">
                    <input type="password" id="confirm_password" name="confirm_password" required>
                    <span class="toggleIcon" onclick="togglePassword('confirm_password')"><i class="fa-solid fa-eye"></i></span>
                </div>
            </div>
            <div class="BTNS">
                <button class="cancel" onclick="navigate('profile.php')">Cancel</button>
                    <input class="btn" type="submit" value="Reset Password">
                </div>
        </form>
        <?php
        if (isset($_GET['error'])) {
            echo "<p class='error-message'>Password didn't match. Please try again.</p>";
        }
        ?>
    </div>
    <script>
        function togglePassword(inputId) {
            var passwordField = document.getElementById(inputId);
            var toggleIcon = document.querySelector("#" + inputId + " + .toggleIcon i");

            if (passwordField.type === "password") {
                passwordField.type = "text";
                toggleIcon.classList.remove("fa-eye");
                toggleIcon.classList.add("fa-eye-slash");
            } else {
                passwordField.type = "password";
                toggleIcon.classList.remove("fa-eye-slash");
                toggleIcon.classList.add("fa-eye");
            }
        }
    </script>
    <script src="../JS/script.js"></script>
</body>

</html>
