<?php
include('../includes/header.php');
if (!is_admin()) {
    redirect('/quickserve/index.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $hours = $_POST['hours'];

    // Generate unique Restaurant ID
    $restaurant_id = uniqid('rest_', true);

    $sql = "INSERT INTO Restaurants (RestaurantID, Name, Address, PhoneNumber, Email, OpeningHours) VALUES ('$restaurant_id', '$name', '$address', '$phone', '$email', '$hours')";

    if ($conn->query($sql) === TRUE) {
        echo "<p class='container'>Restaurant added successfully. Restaurant ID: $restaurant_id</p>";
    } else {
        echo "<p class='container'>Error: " . $conn->error . "</p>";
    }
}
?>
<div class="container add-restaurant-container">
    <h2>Add Restaurant</h2>
    <form action="" method="post">
        <label for="name">Restaurant Name</label>
        <input type="text" id="name" name="name" required>
        <label for="address">Address</label>
        <input type="text" id="address" name="address" required>
        <label for="phone">Phone Number</label>
        <input type="text" id="phone" name="phone" required>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
        <label for="hours">Opening Hours</label>
        <input type="text" id="hours" name="hours" required>
        <button type="submit" class="button">Add Restaurant</button>
    </form>
</div>
<?php
include('../includes/footer.php');
?>
