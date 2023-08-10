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
    $get_id = $_GET['id'];
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

    if (move_uploaded_file($tempname, $folder)) {

        
    $sql = "UPDATE customer_creation SET 
    Customer_Name='$name', 
    Gender='$gender', 
    Date_of_join='$doj', 
    Foundation='$foundation', 
    Company_Name='$company_name', 
    GST='$gst',
    Category='$category', 
    Unique_ID='$unique', 
    Manager='$manager', 
    `Union`='$union', 
    
    Photo='$folder', 
    Country='$country', 
    `State`='$state', 
    City='$city', 
    Building_Number='$building_no', 
    Street='$street',
    Area='$area', 
    Pincode='$pincode', 
    Country_Pmt='$country_pmt', 
    State_Pmt='$state_pmt', 
    City_Pmt='$city_pmt', 
    Building_Number_Pmt='$building_no_pmt', 
    Street_Pmt='$street_pmt', 
    Area_Pmt='$area_pmt', 
    Pincode_Pmt='$pincode_pmt'
    WHERE id = '$get_id'";


    }else{

        
    $sql = "UPDATE customer_creation SET 
    Customer_Name='$name', 
    Gender='$gender', 
    Date_of_join='$doj', 
    Foundation='$foundation', 
    Company_Name='$company_name', 
    GST='$gst',
    Category='$category', 
    Unique_ID='$unique', 
    Manager='$manager', 
    `Union`='$union', 
    Country='$country', 
    `State`='$state', 
    City='$city', 
    Building_Number='$building_no', 
    Street='$street',
    Area='$area', 
    Pincode='$pincode', 
    Country_Pmt='$country_pmt', 
    State_Pmt='$state_pmt', 
    City_Pmt='$city_pmt', 
    Building_Number_Pmt='$building_no_pmt', 
    Street_Pmt='$street_pmt', 
    Area_Pmt='$area_pmt', 
    Pincode_Pmt='$pincode_pmt'
    WHERE id = '$get_id'";


}
    // Execute query
    
    $result_is_done = $conn->query($sql);

    // Now let's move the uploaded image into the folder: image
    if ($result_is_done) {
        
        echo "<script rel='jsavascript'>";
        echo "alert('Customer detail Updated successfully!' )";
        echo "</script>";
        header('location: master.php');

        // echo "<h3>  Customer details ceated successfully!</h3>";
    } else {
        echo "<script rel='jsavascript'>";
        echo "alert('Customer details can not updated' )";
        echo "</script>";
    }

}


?>