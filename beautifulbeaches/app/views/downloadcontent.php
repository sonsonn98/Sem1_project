<!DOCTYPE html>
<html lang="en">
<body>
    <?php $beach = $data['beach'];
    $image = $data['image'][0];
    $map = $data['map'][0];
    $slideimgs = $data['slideimgs'];
    $middleimg = $data['middleimg'][0];
    $traits = $data['traits'];
    $infos = $data['infos'];
    $weathers = $data['weathers'];
    $flights = $data['flights'];
    $beach_id = $data['beach_id'];
    ?>

    <main>
        <!-- big img beach -->
        <div class="centered">
            <img class=" details-big-img" src="<?= $image['picture_link'] ?>" alt="">
        </div>
        <!-- beach header -->
        <div class="centered">
            <p class="details-header-title header-p"><?= $beach['name'] ?></p>
            <p class="header-p"><?= $beach['country_name'] ?></p>
        </div>
        <!-- section content -->
            <p class="details-tilte"><?= $beach['description_title'] ?></p>
            <p><?= $beach['description'] ?></p>
        <div class="centered">
            <img class="details-big-img" src="<?= $map['picture_link'] ?>" alt="">
        </div>
        <!-- section slide images -->
        <div class="centered">
            <?php foreach ($slideimgs as $slideimg): ?>
                    <img class="slide-imgs" src="<?= $slideimg['picture_link'] ?>" alt="">
            <?php endforeach; ?>
        </div>
        <!-- section more info  -->
        <div class="details-container-more">
            <p class="details-more-title">THE PERFECT DAY AT <?= $beach['name'] ?></p>
            <ul>
                    <?php foreach ($infos as $info): ?>
                    <p class="details-tilte"><?= $info['more_info_name'] ?></p>
                    <p><?= $info['more_info_content'] ?></p>
                    <?php endforeach; ?>
            </ul>   
        </div>                
        <!-- section traits -->
            <table class="details-pluses">
                <thead>
                    <tr><?php foreach ($traits as $trait): ?>
                        <th><img class="trait-img" src="<?= $trait['trait_img'] ?>" alt="">
                        </th>
                    </tr><?php endforeach; ?>
                </thead>
                <tbody>
                    <tr><?php foreach ($traits as $trait): ?>
                        <th><p class="details-pluses-title"><?= $trait['trait_name'] ?></p>
                        </th>
                    </tr><?php endforeach; ?>
                    <tr><?php foreach ($traits as $trait): ?>
                        <td><p class="details-pluses-text"><?= $trait['trait_description'] ?></p>
                        </td>
                    </tr><?php endforeach; ?>
                </tbody>
            </table>

        <!-- weather info -->
        <div class="details-container-more">  
            <p class="details-more-title"><?= $beach['name'] ?> WEATHER AVERAGES</p>
                <table class="details-more-table">
                    <thead>
                        <tr>
                            <th></th>
                            <th >AVG. HIGH</th>
                            <th class="details-title">AVG. LOW</th>
                            <th class="details-title">RAINY DAYS</th>
                        </tr>
                    </thead>        
                    <tbody>
                        <?php foreach ($weathers as $weather): ?>
                        <tr>
                            <td><?= $weather['month'] ?></td>
                            <td><span><?= $weather['avg_high'] ?></span>°</td>
                            <td><span><?= $weather['avg_low'] ?></span>°</td>
                            <td><?= $weather['rainy_days'] ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
        </div>
        <!-- middle image -->
        <div class="details-beach-bg">
            <img  src="<?= $middleimg['picture_link'] ?>" alt="">
        </div>
        <!-- Flight information section-->
        <div class="details-container-more">
            <p class="details-more-title">FLIGHTS TO <?= $beach['name'] ?></p>
                <table class="details-more-table">
                    <thead>
                        <tr>
                            <th class="details-title">FROM</th>
                            <th class="details-title">TO</th>
                            <th class="details-title">DEPARTURE TIME</th>
                            <th class="details-title">ARRIVAL TIME</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php  foreach ($flights as $flight): ?>
                        <tr>
                        <td class="details-table-month"><?= $flight["from"]?></td>
                        <td>
                        <span><?= $flight["to"]?></span>             
                        </td>
                        <td>
                        <span><?= $flight["depart_date"]?></span>
                        </td>
                        <td><?= $flight["arrive_date"]?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
        </div>            
    </main>
</body>

</html>