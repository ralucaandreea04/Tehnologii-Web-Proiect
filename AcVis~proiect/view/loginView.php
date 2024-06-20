<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="icon.png" type="image/x-icon">
        <title>Login to SAG Awards</title>
       <style>
        body {
    font-family: Bookman Old Style;
    display: flex;
    align-items: center;
    justify-content: center;
    line-height: 1.5;
    min-height: 100vh;
    background: #f3f3f3;
    flex-direction: column;
    margin: 0;
}
.main {
    background-color: #fff;
    border-radius: 15px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
    padding: 10px 20px;
    transition: transform 0.2s; 
    width: 500px;
    text-align: center;
}

h1 {
    color: 	#D4AF37;
}
label {
    display: block;
    width: 100%;
    margin-top: 10px;
    margin-bottom: 5px;
    text-align: left;
    color: #555;
    font-weight: bold;
}
input {
    display: block;
    width: 100%;
    margin-bottom: 15px;
    padding: 10px;
    box-sizing: border-box;
    border: 1px solid #ddd;
    border-radius: 5px;
}

button {
    padding: 15px;
    border-radius: 10px;
    margin-top: 15px;
    margin-bottom: 15px;
    border: none;
    color: white;
    cursor: pointer;
    background-color: 	#D4AF37;
    width: 100%;
    font-size: 16px;
}
.wrap {
    display: flex;
    justify-content: center;
    align-items: center;
}
.rememberMe {
    margin-top: 10px;
    
}

@media only screen and (max-width: 600px) {
    .main {
        width: 90%;
    }
}
       </style>
    </head>
    <body>
        <div class="main">
            <h1>Login SAG Awards</h1>
            <h3>Enter your login credentials</h3>
            <form action="/Tehnologii-Web-Proiect%20-%20Copy%20/AcVis~proiect/public/login" method="POST">
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
                <div class="rememberMe">
                    <p>Remember me?</p>
                    <input type="checkbox" id="rememberMe" name="rememberMe">
                </div>
            </form>
        </div>
    </body>
</html>