<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "prakweb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);

if ($method == 'GET') {
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $sql = "SELECT * FROM booking WHERE id = $id";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        echo json_encode($data);
    } else {
        $sql = "SELECT * FROM booking";
        $result = $conn->query($sql);
        $bookings = [];
        while ($row = $result->fetch_assoc()) {
            $bookings[] = $row;
        }
        echo json_encode($bookings);
    }
} elseif ($method == 'POST') {

    $name = $input['name'];
    $email = $input['email'];
    $room_type = $input['room_type'];
    $check_in = $input['check_in'];
    $check_out = $input['check_out'];
    $phone = $input['phone'];
    $total_room = $input['total_room'];
    $payment_method = $input['payment_method'];

    $sql = "INSERT INTO booking (name, email, room_type, check_in, check_out, phone, total_room, payment_method)
            VALUES ('$name', '$email', '$room_type', '$check_in', '$check_out', '$phone', $total_room, '$payment_method')";

    if ($conn->query($sql)) {
        echo json_encode(["message" => "Booking created successfully"]);
    } else {
        echo json_encode(["message" => "Failed to create booking"]);
    }
} elseif ($method == 'PUT') {

    $id = intval($_GET['id']);
    $name = $input['name'];
    $email = $input['email'];
    $room_type = $input['room_type'];
    $check_in = $input['check_in'];
    $check_out = $input['check_out'];
    $phone = $input['phone'];
    $total_room = $input['total_room'];
    $payment_method = $input['payment_method'];

    $sql = "UPDATE booking SET 
            name='$name', email='$email', room_type='$room_type', 
            check_in='$check_in', check_out='$check_out', 
            phone='$phone', total_room=$total_room, payment_method='$payment_method'
            WHERE id=$id";

    if ($conn->query($sql)) {
        echo json_encode(["message" => "Booking updated successfully"]);
    } else {
        echo json_encode(["message" => "Failed to update booking"]);
    }
} elseif ($method == 'DELETE') {

    $id = intval($_GET['id']);
    $sql = "DELETE FROM booking WHERE id=$id";

    if ($conn->query($sql)) {
        echo json_encode(["message" => "Booking deleted successfully"]);
    } else {
        echo json_encode(["message" => "Failed to delete booking"]);
    }
} else {

    echo json_encode(["message" => "Invalid HTTP Method"]);
}

$conn->close();

?>