<?php
session_start();

if (isset($_SESSION['username'])) {
    $name = $_SESSION['username'];
} else {
    header('Location: index.php');
    exit;
}
include('connect.php');

// Fetching state data
$country_id = !empty($_POST['country_id']) ? $_POST['country_id'] : '';
echo $country_id;
if (!empty($country_id)) {
    $query = "SELECT id, name from states WHERE country_id=?";
    $countryData = $conn->prepare($query);
    $countryData->bind_param('s', $country_id);
    $countryData->execute();
    $result = $countryData->get_result();

    if ($result->num_rows > 0) {
        echo "<option value=''>Select State</option>";
        while ($arr = $result->fetch_assoc()) {
            echo "<option value='" . $arr['id'] . "'>" . $arr['name'] . "</option>";
        }
    }
}

// Fetching city data
$state_id = !empty($_POST['state_id']) ? $_POST['state_id'] : '';
if (!empty($state_id)) {
    $query = "SELECT id, name from cities WHERE state_id=?";
    $countryData = $conn->prepare($query);
    $countryData->bind_param('i', $state_id);
    $countryData->execute();
    $result = $countryData->get_result();

    if ($result->num_rows > 0) {
        echo "<option value=''>Select City</option>";
        while ($arr = $result->fetch_assoc()) {
            echo "<option value='" . $arr['id'] . "'>" . $arr['name'] . "</option>";
        }
    }
}
?>
