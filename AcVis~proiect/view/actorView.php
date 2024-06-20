<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="icon.png" type="image/x-icon">
    <title>ASV</title>
   <style>
    body {
    font-family: Bookman Old Style;
    margin: 0;
    padding: 0;
    background-color: #ffffff;
    overflow-x: hidden;
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
    justify-content: flex-start;
}

nav a {
    color: #6b5c04;
    text-decoration: none;
    margin: 0 15px;
}

.home-button {
    background-color: #fff;
    color: #333;
    border: none;
    padding: 5px 10px;
    font-size: 16px;
    cursor: pointer;
}

.main-content {
    display: flex;
    justify-content: space-between;
    width: 100%;
    padding: 20px;
}

section {
    padding: 20px;
    text-align: center;
    width: 55%;
    margin-left: 5%;
    margin-right: 5%;
}

.right-section {
    width: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 40px;
}
.image-container {
    text-align: center;
    width: 100%;
    height: 70%;
}

.image {
    width: 600px;
    max-height: 5000px;
    border-radius: 10px;
}

.nomination-list {
    text-align: center;
}

.nomination-heading {
    text-align: center;
    font-weight: bold;
    margin-bottom: 5px;
}

.news-box {
    background-color: #f4f4f4;
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 20px;
    max-width: 400px;
    margin: 0 auto;
}

.news-title {
    color: #333;
    font-size: 24px;
    margin-top: 0;
}

.news-content {
    color: #666;
}

.read-more {
    display: inline-block;
    background-color: #D4AF37;
    color: #fff;
    padding: 5px 10px;
    text-decoration: none;
    border-radius: 3px;
    margin-top: 10px;
}

.read-more:hover {
    background-color: #b3901f;
}

.container {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
}

.images {
    flex: 1 1 33%;
    max-width: 300px;
    padding: 15px;
    text-align: center;
}

.images img {
    max-width: 100%;
    height: auto;
}
   </style>
</head>

<body>
    <nav>
        <a href="/Tehnologii-Web-Proiect%20-%20Copy%20/AcVis~proiect/public/">Back</a>
    </nav>
    <div class="main-content">
        <section>
            <h1><?php echo htmlspecialchars($actor_name); ?></h1>
            <?php  
             $actor_name_lower = ucwords(strtolower($actor_name));
             include  __DIR__ .'/data/image+info.php';?>
            <div class="nomination-heading">Nominations at SAG Awards:</div>
            <ul class="nomination-list">
                <?php if (!empty($awards)): ?>
                    <?php foreach ($awards as $award): ?>
                        <li>Outstanding Performance by a <?php echo htmlspecialchars($award['category']); ?> for "<?php echo htmlspecialchars($award['show']); ?>" (<?php echo htmlspecialchars($award['year']); ?>)</li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <li>No awards found.</li>
                <?php endif; ?>
            </ul>
            <div class="news-box">
                <h2 class="news-title">Breaking News</h2>
                <p class="news-content">News about <?php echo htmlspecialchars($actor_name); ?>, her latest projects and her personal life.</p>
                <a href="https://people.com/tag/<?php echo urlencode($actor_name); ?>/" class="read-more" target="_blank">Read more</a>
            </div>
        </section>
        <div class="right-section">
            <div class="image-container">
                <img src="/../imageGenerator.php?actor_name=<?php echo urlencode($actor_name); ?>" alt="Profile Image" style="max-height: 500px; max-width: 300px;">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="images">
            <img src="grafic1.png" alt="Imagine 1">
        </div>
        <div class="images">
            <img src="grafic2.png" alt="Imagine 2">
        </div>
        <div class="images">
            <img src="grafic3.png" alt="Imagine 3">
        </div>
    </div>
</body>
</html>
