<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; }
        h1 { text-align: center; }
        .section { margin-bottom: 20px; }
        .section h2 { border-bottom: 1px solid #000; }
    </style>
</head>
<body>
    <h1>Beach Details</h1>
    <div class="section">
        <h2>Name</h2>
        <p><?= $beach['name'] ?></p>
    </div>
    <div class="section">
        <h2>Country</h2>
        <p><?= $beach['country_name'] ?></p>
    </div>
    <div class="section">
        <h2>Description</h2>
        <p><?= $beach['description'] ?></p>
    </div>
    <div class="section">
        <h2>Traits</h2>
        <?php foreach ($traits as $trait): ?>
            <p><strong><?= $trait['trait_name'] ?>:</strong> <?= $trait['trait_description'] ?></p>
        <?php endforeach; ?>
    </div>
    <div class="section">
        <h2>More Info</h2>
        <?php foreach ($infos as $info): ?>
            <p><strong><?= $info['more_info_name'] ?>:</strong> <?= $info['more_info_content'] ?></p>
        <?php endforeach; ?>
    </div>
    <div class="section">
        <h2>Weather</h2>
        <?php foreach ($weathers as $weather): ?>
            <p><?= $weather['month_name'] ?>: High <?= round($weather['avg_high'], 1) ?>°C, Low <?= round($weather['avg_low'], 1) ?>°C, Rainy Days: <?= round($weather['rainy_days'], 1) ?></p>
        <?php endforeach; ?>
    </div>
</body>
</html>
