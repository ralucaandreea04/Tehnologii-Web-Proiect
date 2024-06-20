<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="icon.png" type="image/x-icon">
    <title>ASV</title>
    <style>body {
    font-family: Bookman Old Style;
    margin: 0;
    padding: 0;
    background-color: #ffffff;
}

header {
    color: #D4AF37;
    position: absolute;
    left: 70px;
}

nav {
    background-color: white;
    padding: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
}

nav a {
    color: #6b5c04;
    text-decoration: none;
    margin: 0 15px;
}

section {
    padding: 20px;
    text-align: center;
    overflow-y: hidden;
}

footer {
    background-color: #ffffff;
    color: #000000;
    padding: 10px 0;
    text-align: center;
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    z-index: 1000;
}

footer p {
    margin: 0;
}

.search-container {
    position: absolute;
    right: 5px;
}

.search-input {
    padding: 10px;
    border: 1px solid #D4AF37;
    border-radius: 5px;
    width: 300px;
}

.container1 {
    position: relative;
    width: 300px;
    height: 200px;
    overflow: hidden;
    display: flex;
    justify-content: space-around;
    align-items: center;
    margin-left: 40%;
}

.image {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    opacity: 0;
    transition: opacity 0.5s ease;
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1;
}

.overlay-text {
    color: white;
    font-size: 20px;
}

.container:hover .overlay {
    opacity: 1;
    pointer-events: auto;
}

.container {
    padding: 1rem;
    position: relative;
    overflow-x: hidden;
}

.slider-wrapper {
    position: relative;
    max-width: 48rem;
    margin: 0;
}

.slider {
    display: flex;
    aspect-ratio: 4 / 3;
    animation: slide 20s infinite linear;
}

@keyframes slide {
    0% {transform: translateX(0);}
    25% {transform: translateX(-100%);}
    50% {transform: translateX(-200%);}
    75% {transform: translate(0%);}
    100% {transform: translate(-100%);}
}

.slider img {
    flex: 1 0 100%;
    object-fit: cover;
}

.slider-nav {
    display: flex;
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    z-index: 1;
}

.slider-nav a {
    width: 0.5rem;
    height: 0.5rem;
    background-color: #fff;
    opacity: 0.75;
    transition: opacity ease 250ms;
}

.last-searched-people {
    text-align: center;
    margin-top: 20px;
}

.last-searched-people h2 {
    font-size: 30px;
    color: #333;
}

.image-container {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

.image-container a {
    margin: 0 10px;
    text-decoration: none;
    position: relative;
    display: flex;
}

.image-container img {
    width: 300px;
    height: auto;
    border-radius: 10px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
    transition: transform 0.3s ease;
}

.image-container img:hover {
    transform: scale(1.1);
}

.overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    opacity: 0;
    transition: opacity 0.5s ease;
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1;
}

.overlay-text {
    color: white;
    font-size: 20px;
}

.container:hover .overlay {
    opacity: 1;
    pointer-events: auto;
}

.container {
    padding: 2rem;
    position: relative;
}

* {
    margin: 0;
    padding: 0;
}

.menu {
    position: absolute;
    top: 0;
    left: 0;
    background: rgb(255, 255, 255);
    width: 240px;
    height: 100vh;
    transform: translate3d(-240px, 0, 0);
    transition: transform 0.35s;
    max-height: 688.5px ;
}

.menu label.menu-toggle {
    position: absolute;
    right: -60px;
    width: 60px;
    height: 60px;
    line-height: 0px;
    display: block;
    padding: 0;
    text-indent: -9999px;
    background: white url(https://cdn4.iconfinder.com/data/icons/wirecons-free-vector-icons/32/menu-alt-512.png) 50% 50% / 25px 25px no-repeat;
}

.menu ul li>label {
    background: url(https://cdn4.iconfinder.com/data/icons/ionicons/512/icon-arrow-right-b-128.png) 95% 50% / 16px 16px no-repeat;
}

.menu ul li a,
.menu ul li label {
    display: block;
    text-align: center;
    padding: 0 20px;
    line-height: 60px;
    text-decoration: none;
    color: #000;
}

.menu ul li a:hover,
.menu ul li label:hover {
    color: gold;
}

.menu-checkbox {
    display: none;
}

.menu .menu label.menu-toggle {
    background: none;
}

.menu-checkbox:checked+.menu {
    transform: translate3d(0, 0, 0);
}

html,
body {
    height: 100%;
}

p {
    margin-bottom: 15px;
}

#info {
    display: table;
    background: rgba(0, 0, 0, 0.4);
    height: 100%;
    width: 100%;
}

#info #info-content {
    display: table-cell;
    vertical-align: middle;
    text-align: center;
    text-transform: uppercase;
    color: white;
    font-size: 12px;
}

#info #info-content h1 {
    color: #fff;
    border: 3px solid #fff;
    text-align: center;
    background: rgba(0, 0, 0, 0.1);
    font-size: 22px;
    font-weight: normal;
    padding: 20px;
    margin: 10px;
    display: inline-block;
}

#info #info-content h1 strong {
    display: block;
    font-size: 26px;
}
h3 {
    color: #D4AF37;
    text-align: left;
}
@media only screen and (max-width: 600px) {
    nav {
        flex-direction: column;
        align-items: center;
    }
    
    h1{
        font-size: 20px;
        text-align: center;
    }
    .search-container {
        position: relative;
        margin-top: 50px;
    }
    
    .search-input {
        width: 100%;
    }
    .image-container {
        flex-direction: column; 
        align-items: center;
    }

    .image-container a {
        margin: 10px 0; 
    }

    .image-container img {
        width: 90%; 
    }
}
@media only screen and (max-width: 768px) and (min-width: 601px) {
    nav {
        flex-direction: column;
        align-items: center;
    }

    h1{
        font-size: 35px;
        text-align: center;
    }
    
    .search-container {
        position: relative;
        margin-top: 30px; 
    }
    
    .search-input {
        width: 90%; 
    }

    .image-container {
        justify-content: center; 
    }

    .image-container a {
        margin: 5px;
    }
}
@media only screen and (min-width: 769px) and (max-width: 1023px) {
    nav {
        flex-direction: column;
        align-items: center;
    }

    h1{
        font-size: 40px;
        text-align: center;
    }
    
    .search-container {
        position: relative;
        margin-top: 30px; 
    }
    
    .search-input {
        width: 90%; 
    }

    .image-container {
        justify-content: center; 
    }

    .image-container a {
        margin: 5px;
    }
}

.submenu {
    max-height: 688.5px; /* Ajustați această valoare după cum este necesar */
    overflow-y: auto; /* Permite derularea */
    background-color: #ffffff;
}

.submenu ul {
    padding: 0;
    margin: 0;
    list-style: none;
}

.submenu ul li a {
    display: block;
    padding: 10px;
    text-decoration: none;
    color: #000;
}

@media only screen and (min-width: 1024px)
{
    h1{
        font-size: 22px;
    }
}  </style>
</head>
<body>
    <nav>
        <header>
            <h1>Screen Actors Guild Awards</h1>
        </header>
        <a href="proiectWEB.html">Home</a>
        <a href="/Tehnologii-Web-Proiect%20-%20Copy%20/AcVis~proiect/public/login">Login</a>
        <a href="/Tehnologii-Web-Proiect%20-%20Copy%20/AcVis~proiect/public/about">About</a>
        <div class="search-container">
            <form method="post" action="/Tehnologii-Web-Proiect%20-%20Copy%20/AcVis~proiect/public/search">
                <input type="text" name="search" class="search-input" placeholder="Search your favorite actor...">
                <button type="submit">Search</button>
            </form>
        </div>
    </nav>
    <section class="container">
        <h3>Gallery Photo</h3>
        <div class="slider-wrapper">
            <div class="slider">
                <img id="slide-1" src="images/castigatori.jpg" alt="castigatori">
                <img id="slide-2" src="images/castigatori2.jpg" alt="castigatori2">
                <img id="slide-3" src="images/castigarori3.jpg" alt="castigarori3">
                <img id="slide-4" src="images/castigarori4.jpg" alt="castigarori4">
            </div>
            <div class="slider-nav">
                <a href="#slide-1"></a>
                <a href="#slide-2"></a>
                <a href="#slide-3"></a>
                <a href="#slide-4"></a>
            </div>
        </div>
    </section>

    <section class="last-searched-people">
        <h2>The Last Searched People</h2>
        <div class="image-container">
            <a href="actor.html"><img src="images/margot.png" alt="Person 1"></a>
            <a href="#"><img src="images/castigarori4.jpg" alt="Person 2"></a>
            <a href="#"><img src="images/castigarori3.jpg" alt="Person 3"></a>
        </div>
    </section>

    <input type="checkbox" id="menu" name="menu" class="menu-checkbox">
    <div class="menu">
        <label class="menu-toggle" for="menu"><span>Toggle</span></label>
        <ul>
            <li><a href="/Tehnologii-Web-Proiect%20-%20Copy%20/AcVis~proiect/public/winners">Winners of 2020</a></li>
            <li><a href="/Tehnologii-Web-Proiect%20-%20Copy%20/AcVis~proiect/public/all">See All Actors</a>
            </li>
            <li>
                <label for="menu-year">Search by year</label>
                <input type="checkbox" id="menu-year" name="menu-year" class="menu-checkbox">
                <div class="menu">
                    <label class="menu-toggle" for="menu-year">Toggle<span></span></label>
                    <ul>
                        <?php include __DIR__.'/../view/yearsView.php'; ?>
                    </ul>
                </div>
            </li>
            <li>
                <label for="menu-category">Search by category</label>
                <input type="checkbox" id="menu-category" name="menu-category" class="menu-checkbox">
                <div class="menu">
                    <label class="menu-toggle" for="menu-category">Toggle<span></span></label>
                    <ul>
                        <?php include __DIR__.'/../view/categoriesView.php'; ?>
                    </ul>
                </div>
            </li>
        </ul>
    </div>

    <footer>
        <p>&copy; Bocanet Raluca-Andreea & Cirjontu Ionela-Elena-Daniela</p>
    </footer>
</body>
</html>
