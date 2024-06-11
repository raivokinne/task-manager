<?php

use App\Models\Room;

$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];
$image = $_FILES['image']['name'];
$imageTmpName = $_FILES['image']['tmp_name'];
$type = $_POST['type'];
$capacity = $_POST['capacity'];
$address = $_POST['address'];
$city = $_POST['city'];
$country = $_POST['country'];
$categoryId = $_POST['category'];
$rating = $_POST['rating'];

$errors = [];

$targetDir = 'storage/images/';
if (!is_dir($targetDir)) {
    mkdir($targetDir, 0777, true);
}

$targetFile = $targetDir . basename($image);

if (empty($name)) {
    $errors['name'] = 'Name is required';
} else if (strlen($name) < 3) {
    $errors['name'] = 'Name must be at least 3 characters';
} else if (strlen($name) > 255) {
    $errors['name'] = 'Name must be at most 255 characters';
}

if (empty($description)) {
    $errors['description'] = 'Description is required';
} else if (strlen($description) < 3) {
    $errors['description'] = 'Description must be at least 3 characters';
} else if (strlen($description) > 255) {
    $errors['description'] = 'Description must be at most 255 characters';
}

if (empty($price)) {
    $errors['price'] = 'Price is required';
} else if (!is_numeric($price)) {
    $errors['price'] = 'Price must be a number';
}

if (empty($image)) {
    $errors['image'] = 'Image is required';
}

if (empty($type)) {
    $errors['type'] = 'Type is required';
} else if (strlen($type) < 3) {
    $errors['type'] = 'Type must be at least 3 characters';
} else if (strlen($type) > 255) {
    $errors['type'] = 'Type must be at most 255 characters';
}

if (empty($capacity)) {
    $errors['capacity'] = 'Capacity is required';
} else if (!is_numeric($capacity)) {
    $errors['capacity'] = 'Capacity must be a number';
}

if (empty($address)) {
    $errors['address'] = 'Address is required';
} else if (strlen($address) < 3) {
    $errors['address'] = 'Address must be at least 3 characters';
} else if (strlen($address) > 255) {
    $errors['address'] = 'Address must be at most 255 characters';
}

if (empty($city)) {
    $errors['city'] = 'City is required';
} else if (strlen($city) < 3) {
    $errors['city'] = 'City must be at least 3 characters';
} else if (strlen($city) > 255) {
    $errors['city'] = 'City must be at most 255 characters';
}

if (empty($country)) {
    $errors['country'] = 'Country is required';
} else if (strlen($country) < 3) {
    $errors['country'] = 'Country must be at least 3 characters';
} else if (strlen($country) > 255) {
    $errors['country'] = 'Country must be at most 255 characters';
}

if (empty($categoryId)) {
    $errors['category'] = 'Category is required';
}

if (empty($rating)) {
    $errors['rating'] = 'Rating is required';
}

$room = Room::where('name', "=", $name)->first();
if ($room) {
    $errors['name'] = 'Room already exists';
}

if (empty($errors)) {
    if (move_uploaded_file($imageTmpName, $targetFile)) {
        Room::create([
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'image' => $image,
            'type' => $type,
            'capacity' => $capacity,
            'address' => $address,
            'city' => $city,
            'country' => $country,
            'category_id' => $categoryId,
            'rating' => $rating
        ]);

        redirect('/rooms');
    } else {
        $errors['image'] = 'Sorry, there was an error uploading your file.';
    }
}

if (!empty($errors)) {
    view('rooms/create', [
        'title' => 'Create Room',
        'errors' => $errors
    ]);

    exit;
}

