<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="/AcVis~proiect/public/images/icon.png" type="image/x-icon">
        <title>Login to SAG Awards</title>
        <link rel="stylesheet" href="/AcVis~proiect/public/css/cssLoginPage.css">
    </head>
    <body>
        <div class="main">
            <h1>Login SAG Awards</h1>
            <h3>Enter your login credentials</h3>
            <form action="/AcVis~proiect/public/login" method="POST">
                <label for="email">
                    Email address:
                </label>
                <input type="text"
                    id="email"
                    name="email"
                    placeholder="Enter your email address" required>
            
                <label for="password">
                    Password:
                </label>
                <input type="password"
                    id="password"
                    name="password"
                    placeholder="Enter your Password" required>
            
                <div class="wrap">
                    <button type="submit">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </body>
</html>