<?php
// Initialize variables
$title = $destination = $departureDate = $returnDate = $price = $category = "";
$availability = 0; // Default value for checkbox
$errors = [];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Travel Offer</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            font-size: 18px;
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input, select {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }

        input:focus, select:focus {
            border-color: #007bff;
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-bottom: 10px;
            display: block;
        }

        .checkbox-container {
            display: flex;
            align-items: center;
        }

        .checkbox-container input {
            transform: scale(1.2);
            margin-left: 10px;
        }

        button {
            width: 100%;
            padding: 12px;
            font-size: 18px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            transition: background 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Add Travel Offer</h2>
    <form action="Verification.php" method="post">
        
        <label for="title">Title:</label>
        <input type="text" name="title" value="<?= htmlspecialchars($title) ?>" placeholder="Enter the title">
        <span class="error-message"><?= $errors["title"] ?? "" ?></span>

        <label for="destination">Destination:</label>
        <input type="text" name="destination" value="<?= htmlspecialchars($destination) ?>" placeholder="Enter the destination">
        <span class="error-message"><?= $errors["destination"] ?? "" ?></span>

        <label for="departureDate">Departure Date:</label>
        <input type="date" name="departureDate" value="<?= htmlspecialchars($departureDate) ?>">
        <span class="error-message"><?= $errors["departureDate"] ?? "" ?></span>

        <label for="returnDate">Return Date:</label>
        <input type="date" name="returnDate" value="<?= htmlspecialchars($returnDate) ?>">
        <span class="error-message"><?= $errors["returnDate"] ?? "" ?></span>

        <label for="price">Price:</label>
        <input type="number" name="price" value="<?= htmlspecialchars($price) ?>" placeholder="Enter the price" step="any">
        <span class="error-message"><?= $errors["price"] ?? "" ?></span>

        <div class="checkbox-container">
            <label for="availability">Availability:</label>
            <input type="checkbox" name="availability" value="1" <?= $availability ? "checked" : "" ?>>
        </div>

        <label for="category">Category:</label>
        <select name="category">
            <option value="adventure" <?= $category == "adventure" ? "selected" : "" ?>>Adventure</option>
            <option value="relaxation" <?= $category == "relaxation" ? "selected" : "" ?>>Relaxation</option>
            <option value="cultural" <?= $category == "cultural" ? "selected" : "" ?>>Cultural</option>
            <option value="business" <?= $category == "business" ? "selected" : "" ?>>Business</option>
            <option value="family" <?= $category == "family" ? "selected" : "" ?>>Family</option>
        </select>
        <span class="error-message"><?= $errors["category"] ?? "" ?></span>

        <button type="submit">Add Offer</button>
    </form>
</div>

</body>
</html>
