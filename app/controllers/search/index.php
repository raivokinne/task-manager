<?php

$query = $_GET['q'] ?? '';

echo json_encode([
    'results' => $query
]);