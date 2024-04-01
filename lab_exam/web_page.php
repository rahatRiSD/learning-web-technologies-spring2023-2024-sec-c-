<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Personal Website</title>
    
</head>
<body style="display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0;">
    <header>
        <h1>Welcome to My Personal Website</h1>
    </header>
    <nav>
        <ul>
            <li><a href="#about">About Me</a></li>
            <li><a href="#portfolio">Portfolio</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="#photos">Photo Album</a></li>
        </ul>
    </nav>
    <main>
        <section id="about">
            <h2>About Me</h2>
            <p>
                Full Name: RAHAT RIHAN<br>
                Email: rahatrihan083@gmail.com<br>
                Phone Number: 01837105765<br>
                Student of AIUB, 10th Semester<br>
                Hobby: Watching Movies, Playing Cricket<br>
                Age: 24<br>
            </p>
        </section>
        <section id="portfolio">
            <h2>Project Portfolio</h2>
            <table>
                <tr>
                    <th>Project</th>
                    <th>Description</th>
                    <th>Year</th>
                </tr>
                <tr>
                    <td>Tourism Management System in Bangladesh</td>
                    <td>A web-based application to manage tourism activities, including hotel booking, tour packages, travel guides, and customer feedback.</td>
                    <td>2023</td>
                </tr>
                
            </table>
        </section>
        <section id="contact">
            <h2>Contact Me</h2>
            <form action="contact.php" method="POST">
                <fieldset>
                    <legend>Contact Form</legend>
                    <label for="name">Name:</label><br>
                    <input type="text" id="name" name="name" required><br><br>

                    <label for="email">Email:</label><br>
                    <input type="email" id="email" name="email" required><br><br>

                    <label for="message">Message:</label><br>
                    <textarea id="message" name="message" required></textarea><br><br>

                    <input type="submit" value="Submit">
                </fieldset>
            </form>
        </section>
        <section id="photos">
            <h2>Photo Album</h2>
            
        </section>
    </main>
    <footer>
        <p>&copy; 2024 My Personal Website. All rights reserved.</p>
    </footer>
</body>
</html>
