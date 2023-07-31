<?php
if (isset($_GET['id'])) {
    $button = $_GET['id'];
    if ($button == 1) {
        echo "This is 1 that is selected";
    } elseif ($button === 'button2') {
        echo "This is empty that is selected";
    } else {
        echo "Invalid button selected";
    }
} else {
    echo "No button selected";
}
?>
