<?php
header('Content-Type: application/json');

$id = $_GET['id'];

if (!isset($id)) {
    http_response_code(400);
    echo json_encode(['error' => 'Missing required fields']);
    exit;
}

$users = json_decode(file_get_contents('../data/users.json'), true);

foreach ($users as $user) {
    if ($user['id'] === $id) {
        echo json_encode(['user' => $user]);
        exit;
    }
}

http_response_code(404);
echo json_encode(['error' => 'User not found']);
?>