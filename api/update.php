<?php
header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['id']) || !isset($data['username']) || !isset($data['email'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Missing required fields']);
    exit;
}

$users = json_decode(file_get_contents('../data/users.json'), true);

foreach ($users as &$user) {
    if ($user['id'] === $data['id']) {
        $user['username'] = $data['username'];
        $user['email'] = $data['email'];
        file_put_contents('../data/users.json', json_encode($users));
        echo json_encode(['message' => 'User updated', 'user' => $user]);
        exit;
    }
}

http_response_code(404);
echo json_encode(['error' => 'User not found']);
?>