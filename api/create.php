<?php
header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['username']) || !isset($data['password']) || !isset($data['email'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Missing required fields']);
    exit;
}

$users = json_decode(file_get_contents('../data/users.json'), true);

foreach ($users as $user) {
    if ($user['username'] === $data['username']) {
        http_response_code(409);
        echo json_encode(['error' => 'Username already exists']);
        exit;
    }
}

$newUser = [
    'id' => uniqid(),
    'username' => $data['username'],
    'password' => password_hash($data['password'], PASSWORD_BCRYPT),
    'email' => $data['email']
];

$users[] = $newUser;
file_put_contents('../data/users.json', json_encode($users));

http_response_code(201);
echo json_encode(['message' => 'User created', 'user' => $newUser]);
?>