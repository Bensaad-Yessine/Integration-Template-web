<?php
if (!file_exists('../../Controller/TravelOfferController.php')) {
    die('Le fichier TravelOfferController.php est introuvable.');
}
require_once '../../Controller/TravelOfferController.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $title = trim($_POST["title"]);
    $destination = trim($_POST["destination"]);
    $departureDate = trim($_POST["departureDate"]);
    $returnDate = trim($_POST["returnDate"]);
    $price = trim($_POST["price"]);
    $availability = trim($_POST["availability"]);
    $category = trim($_POST["category"]);
    $errors = [];
    if(empty($title)){
        $errors[] = "The title is required.";
    }
    if(empty($destination)){
        $errors[] = "The destination is required.";
    }
    if(empty($departureDate)){
        $errors[] = "The departure date is required.";
    }
    if(empty($returnDate)){
        $errors[] = "The return date is required.";
    }
    if(empty($price)){
        $errors[] = "The price is required.";
    }
    if($price <= 0){
        $errors[] = "The price must be greater than 0.";
    }
    if(!empty($errors)){
        foreach($errors as $error){
            echo "<p style='color:red;'>$error</p>";
        }
    }else{
        $offer1 = new TravelOffer($title, $destination, $departureDate, $returnDate, $price, $availability, $category);
        $offer1->show();
        var_dump($offer1);
    }
}

?>