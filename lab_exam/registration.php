<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Provider Registration Form</title>
</head>
<body style="display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0;">
    <form action="register.php" method="POST">
        <fieldset style="text-align: center; width: 30%; padding: 20px;">
            <legend>Email Provider Registration Form</legend>

            <label for="firstName">First Name:</label><br>
            <input type="text" id="firstName" name="firstName" required><br><br>

            <label for="lastName">Last Name:</label><br>
            <input type="text" id="lastName" name="lastName" required><br><br>

            <label for="dob">Date of Birth:</label><br>
            <select id="dob" name="dob" required>
                <option value="">Select...</option>
                <!-- Populate with options using PHP if needed -->
            </select><br><br>

            <label>Gender:</label><br>
            <input type="radio" id="male" name="gender" value="male" required>
            <label for="male">Male</label><br>
            <input type="radio" id="female" name="gender" value="female" required>
            <label for="female">Female</label><br><br>

            <label for="phone">Phone:</label><br>
            <input type="text" id="phone" name="phone" required><br><br>

            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br><br>

            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br><br>

            <label for="confirmPassword">Confirm Password:</label><br>
            <input type="password" id="confirmPassword" name="confirmPassword" required><br><br>

            <input type="submit" value="Register">
        </fieldset>
    </form>
</body>
</html>
