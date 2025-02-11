<?php
header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['username']) || !isset($data['password'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Missing required fields']);
    exit;
}

$users = json_decode(file_get_contents('../data/users.json'), true);

foreach ($users as $user) {
    if ($user['username'] === $data['username'] && password_verify($data['password'], $user['password'])) {
        echo json_encode(['message' => 'Login successful', 'user' => $user]);
        exit;
    }
}

http_response_code(401);
echo json_encode(['error' => 'Invalid credentials']);
?>