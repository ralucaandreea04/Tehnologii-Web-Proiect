<?php
require_once __DIR__ . '/data/news.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/AcVis~proiect/public/images/icon.png" type="image/x-icon">
    <title>ASV</title>
    <link rel="stylesheet" href="/AcVis~proiect/public/css/cssActor.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        #myChartBar {
            width: 830px;
            height: 400px;
        }
        #myChartCircle {
            width: 650px;
            height: 400px;
        }
    </style>
</head>

<body>
    <nav>
        <a href="/AcVis~proiect/public/">Back</a>
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
                <h2><?php echo htmlspecialchars($title); ?></h2>
                <p><?php echo htmlspecialchars($description); ?></p>
                <a href="<?php echo htmlspecialchars($newsArticle['url']); ?>"class="read-more" target="_blank">Read more</a>
            </div>
        </section>
        <div class="right-section">
            <div class="image-container">
                <img src="/AcVis~proiect/view/data/imageGenerator.php?actor_name=<?php echo urlencode($actor_name); ?>" alt="Profile Image" style="max-height: 500px; max-width: 300px;">
            </div>
        </div>
    </div>
    <div class="container">
    <div class="chart-container">
        <div class="chart">
            <canvas id="myChartBar"></canvas>
            <?php
                include '../view/data/chart_bar.php';
                $chartDataBar = generateChartBar($actor_name);
                echo $chartDataBar['chart_js'];
            ?>
        </div>
        <div class="chart">
            <canvas id="myChartCircle"></canvas>
            <?php
                include '../view/data/chart_circle.php';
                $chartDataCircle = generateChartCircle($actor_name);
                echo $chartDataCircle['chart_js'];
            ?>
        </div>
    </div>
</div>

</body>
</html>
