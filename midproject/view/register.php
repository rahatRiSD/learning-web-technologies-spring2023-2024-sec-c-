<!DOCTYPE html>
<html>
<head>
    <title>Customer Registration - Tourism Management System</title>
    <style>
        body {
            background: url('../Images/registerbackground.jpg');
            background-position: center;
            background-size: cover;
        }
        
        fieldset {
            border: none;
            text-align: center;
            width: 70%;
            margin: auto;
            background-color: rgba(255, 255, 255, 0.7);
            padding: 20px;
            border-radius: 10px;
        }
        
        legend {
            font-size: 1.5em;
            color: SeaGreen;
        }
        
        label {
            color: Green;
            font-weight: bold;
        }
        
        input {
            padding: 5px;
            margin-bottom: 10px;
        }
        
        #error-message {
            color: red;
        }
        
        input[type="submit"] {
            background-color: SeaGreen;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        
        input[type="submit"]:hover {
            background-color: DarkSeaGreen;
        }
        
        .footer {
            color: white;
            background-color: SeaGreen;
            text-align: center;
            padding: 10px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <form method="post" action="../Controller/registrationcheck.php" onsubmit="return validation()">
        <fieldset>
            <legend>Tourism Management System - Customer Registration</legend>
            <label for="email">Email:</label><br> 
            <input type="email" id="email" name="email" value="" /> <br>
            <label for="firstName">First Name:</label><br> 
            <input type="text" id="firstName" name="firstName" value="" /> <br>
            <label for="lastName">Last Name:</label><br> 
            <input type="text" id="lastName" name="lastName" value="" /> <br>
            <label for="contactNumber">Contact Number:</label><br> 
            <input type="tel" id="contactNumber" name="contactNumber" value="" /> <br>
            <label for="dob">Date Of Birth:</label><br> 
            <input type="date" id="dob" name="dob" value="" /> <br>
            <label for="password">Password:</label><br> 
            <input type="password" id="password" name="password" value="" /> <br>
            <label for="confirmPassword">Confirm Password:</label><br> 
            <input type="password" id="confirmPassword" name="confirmPassword" value="" /> <br>
            <p id="error-message"></p>
            <input type="submit" name="submit" value="Submit" /><br><br>
            Already have an account? <a href="login.html">Login</a><br>
            <a href="home_travel.html">Home</a>
        </fieldset>
    </form>
    <div class="footer">
        Call now : +88017xxxxxxx | Email: tourbd@gmail.com | Address: Kuril, KA, 187/0A | Copyright ⓒ 2024
    </div>
    <script src="../asset/registration.js"></script>
</body>
</html>
