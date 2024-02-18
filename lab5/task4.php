<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>

<form action="" method="get" enctype="">
    <fieldset style="width: 400px; padding: 20px;">
        <legend>PROFILE PICTURE</legend>
        Name: &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; <input type="text"  name="name" ><hr>
        Email:&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;   &nbsp; <input type="email"  name="name" ><hr>
        User Name: &nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;<input type="text"  name="name" ><hr>
        Password:&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;  &nbsp; <input type="password"  name="name" ><hr>
        Confirm Password: &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  &nbsp;<input type="password"  name="name" ><hr>
        <fieldset style="width: 200px; padding: 10px;">
            <legend>Gender</legend>
    
            <input type="radio"  name="gender" value="male" required>
            Male
            <input type="radio"  name="gender" value="female" required>
            Female
            <input type="radio"  name="gender" value="Other" required>
            Other
        </fieldset>
        <hr>
        <fieldset style="width: 250px; padding: 10px;">
            <legend>Date of Birth</legend>
            <input type="number"  name="day" style="width: 30px;" required min="1" max="31">&nbsp;/
                        <input type="number"  name="month" style="width: 30px;" required min="1" max="12">&nbsp;/
                        <input type="number"  name="year" style="width: 40px;" required min="1900" max="9999">(<i>dd/mm/yy</i>)
    
           
        </fieldset>
        <hr>
    
    


        
        
        
        <input type="submit" value="Submit"> <input type="reset" value="reset">
    </fieldset>
    
</form>

</body>
</html>
