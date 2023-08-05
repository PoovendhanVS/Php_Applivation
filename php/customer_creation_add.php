<?php
session_start();

if (isset($_SESSION['username'])) {
    $name = $_SESSION['username'];
} else {
    header('Location: index.php');
    exit;
}
include 'connect.php';
if (isset($_POST['submit'])) {
    $name = $_POST['customer_name'];
    $gender = $_POST['gen'];
    $doj = $_POST['doj'];
    $foundation = $_POST['foundation'];
    $company_name = $_POST['company_name'];
    $gst = $_POST['gst_number'];
    $category = $_POST['category'];
    $unique = $_POST['unique_id'];
    $manager = $_POST['manager_name'];
    $union = $_POST['union_name'];

    error_reporting(0);

    $msg = "";

    $filename = $_FILES["photo"]["name"];
    $tempname = $_FILES["photo"]["tmp_name"];
    $folder = "./img/" . $filename;
    if (move_uploaded_file($tempname, $folder)) {

        $msg =  "Image uploaded successfully";

    }else{

        $msg =  "Failed to upload image";

}

    $country = $_POST['country'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $building_no = $_POST['building_number'];
    $street = $_POST['street'];
    $area = $_POST['area'];
    $pincode = $_POST['pincode'];

    $country_pmt = $_POST['country_per'];
    $state_pmt = $_POST['state_per'];
    $city_pmt = $_POST['city_per'];
    $building_no_pmt = $_POST['building_number_per'];
    $street_pmt = $_POST['street_per'];
    $area_pmt = $_POST['area_per'];
    $pincode_pmt  = $_POST['pincode_per'];
    
    
    include 'connect.php';

    $sql = "INSERT INTO customer_creation 
    (
        Customer_Name, 
        Gender, 
        Date_of_join, 
        Foundation, 
        Company_Name, 
        GST,
        Category, 
        Unique_ID, 
        Manager, 
        `Union`, 
        Photo, 
        Country, 
        `State`, 
        City, 
        Building_Number, 
        Street,
        Area, 
        Pincode, 
        Country_Pmt, 
        State_Pmt, 
        City_Pmt, 
        Building_Number_Pmt, 
        Street_Pmt, 
        Area_Pmt, 
        Pincode_Pmt
    )
    VALUES (
        '$name',
        '$gender',
        '$doj',
        '$foundation',
        '$company_name',
        '$gst',
        '$category',
        '$unique',
        '$manager',
        '$union',
        '$folder',
        '$country',
        '$state',
        '$city',
        '$building_no',
        '$street',
        '$area',
        '$pincode',
        '$country_pmt',
        '$state_pmt',
        '$city_pmt',
        '$building_no_pmt',
        '$street_pmt',
        '$area_pmt',
        '$pincode_pmt'
    )";


    // Execute query
    
    $result_is_done = $conn->query($sql);

    // Now let's move the uploaded image into the folder: image
    if ($result_is_done) {
        header('location: customer_creation.php');
        // echo "<h3>  Customer details ceated successfully!</h3>";
    } else {
        echo "<script rel='jsavascript'>";
        echo "alert('Error Found!' )";
        echo "</script>";
    }

}
?>