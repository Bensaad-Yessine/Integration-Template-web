<?php
if (!file_exists('../../Controller/TravelOfferController.php')) {
    die('Le fichier TravelOfferController.php est introuvable.');
}
require_once '../../Controller/TravelOfferController.php';

$offer = new traveloffer("Travel to Paris", "Paris", "2021-07-01", "2021-07-10", 1000, 1, "Tourism");
$offer->show();
var_dump($offer);
unset($offer);
?>
