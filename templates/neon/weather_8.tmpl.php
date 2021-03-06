<?php
    foreach ($objects['0'] as $forecast) {
        $forecatsArr[] = $forecast;
    }
    $time = date('H:i', time());
?>

<body>
<div class="view-7-neon-4">
    <div class="view-7-neon-citytime">
        <?php echo $mainObject['name'] ?> - <?php echo $abstractData->getWeek() ?>, <?php echo $abstractData->getFullDate() ?>
    </div>
    <div class="view-7-neon-main-3">
        <ul class="view-7-neon-time-temp">
            <li class="view-7-neon-temp-cels shine-font">
                <?php echo $mainObject['tempC']; ?>°
            </li>
            <li class="view-7-neon-temp-far shine-font">
                <?php echo $mainObject['tempF']; ?>°F
            </li>
        </ul>

        <ul class="view-7-neon-daytime-info black-icons daytime-info-2">
            <li class="view-7-neon-daytime-name">
                <?php echo $abstractData->getTimesOfDay($time) ?>
            </li>
            <li class="view-7-neon-daytime-icon">
                <?php echo $abstractData->getWeatherIcon($mainObject) ?>
            </li>
            <li class="view-7-neon-type-2">
                <?php echo $abstractData->getWeatherDescription($mainObject['icon']) ?>
            </li>
        </ul>

        <ul class="view-7-neon-city-params black-icons params-2">
            <li class="view-7-neon-wind">
                <?php echo $abstractData->getWwindDirection($mainObject['wd']) ?>: <?php echo $abstractData->getMetersPerSecond($mainObject['ws']) ?> м/с
            </li>
            <li class="view-7-neon-degrees">
                <?php echo $mainObject['gmtMin'] ?>°
            </li>
            <li class="view-7-neon-wet">
                Влажность: <?php echo $mainObject['rh'] ?>%
            </li>
            <li class="view-7-neon-pressure">
                Давление: <?php echo $abstractData->getMillimetersOfMercury($mainObject['psl']) ?> мм рт.ст.
            </li>
            <li class="view-7-neon-dpf">
                dpF <?php echo $mainObject['dpF'] ?>°
            </li>
        </ul>
    </div>

    <div class="view-7-neon-infobox-4">
        <?php for ($i=0; $i < 3; $i++) {
    if ($i == 0) {
        $className = 'morning';
    }
    if ($i == 1) {
        $className = 'day';
    }
    if ($i == 2) {
        $className = 'evening';
    }

    if ($i == 0) {
        $blockName = 'top';
    }
    if ($i == 1) {
        $blockName = 'middle';
    }
    if ($i == 2) {
        $blockName = 'bottom';
    } ?>

            <div class="view-7-neon-info">
                <p class="view-7-neon-daytime-next next-4">
                    <?php echo $abstractData->getTimesOfDay($abstractData->getDateFromString($forecatsArr[$i]['dt'], 'H:i')) ?>
                </p>
                <div class="view-7-neon-<?php echo $className ?>">
                    <?php echo $abstractData->getWeatherIcon($forecatsArr[$i]) ?>
                </div>
                <p class="view-7-neon-next-temp">
                    <?php echo $forecatsArr[$i]['tempC']; ?>°
                </p>
            </div>

            <?php
}?>
    </div>
</div>
</body>