<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - Master</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/master_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        crossorigin="anonymous" />
</head>

<style>
</style>

<body>
    <?php
    session_start();

    if (isset($_SESSION['username'])) {
        $name = $_SESSION['username'];
    } else {
        header('Location: index.php');
        exit;
    }
    ?>
<?php
include('connect.php');

$uid = $_GET['id'];
$sql = "SELECT * FROM customer_creation WHERE id='" . $uid . "'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);


$name = $row['Customer_Name'];
$gender = $row['Gender'];
$doj = $row['Date_of_join'];
$foundation = $row['Foundation'];
$company_name = $row['Company_Name'];
$gst = $row['GST'];
$category = $row['Category'];
$unique = $row['Unique_ID'];
$manager = $row['Manager'];
$union = $row['Union'];

$filename = $row["Photo"];
$folder = $filename;

$country = $row['Country'];
$state = $row['State'];
$city = $row['City'];
$building_no = $row['Building_Number'];
$street = $row['Street'];
$area = $row['Area'];
$pincode = $row['Pincode'];

$country_pmt = $row['Country_Pmt'];
$state_pmt = $row['State_Pmt'];
$city_pmt = $row['City_Pmt'];
$building_no_pmt = $row['Building_Number_Pmt'];
$street_pmt = $row['Street_Pmt'];
$area_pmt = $row['Area_Pmt'];
$pincode_pmt  = $row['Pincode_Pmt'];



?>

    <?php include 'html/nav-bar.html'; ?>
    <div class="container mt-4">

        <div class="container-fluid">
            <div class="main-form">
                <form id="myForm" action="<?php echo 'customer_creation_update_action.php?id=' . $row['id']; ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <div id="form_1" style="display: block;">
                        <h4 class="sub_title" style="color: dodgerblue;">CUSTOMER CREATION</h4>
                        <hr style="border-color:blue;">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-items">
                                    <label class="customer_full_name" for="">Customer Name</label>
                                    <select name="gen" class="gen" id="gen">
                                        <option value="">Select</option>
                                        <option value="Male" <?php if ($gender === 'Male') echo 'selected'; ?>>Male</option>
                                        <option value="Female" <?php if ($gender === 'Female') echo 'selected'; ?>>Female</option>
                                        <option value="Other" <?php if ($gender === 'Other') echo 'selected'; ?>>Others</option>
                                    </select>
                                    <input type="text" name="customer_name" id="customer_name" class="form-control"
                                        placeholder="Enter Customer Name" value="<?php echo $name ?>" />
                                </div>
                                <div class="form-items">
                                    <label for="">Date of join</label>
                                    <input name="doj" type="date" id="doj" class="form-control" max="" value="<?php echo $doj ?>">
                                </div>
                                <div class="form-items">
                                    <label for="">Foundation</label>
                                    <input type="text" id="foundation" name="foundation" class="form-control" value="<?php echo $foundation ?>" placeholder="Foundation" />
                                </div>
                                <br>


                                <div class="form-items">
                                    <label class="company_name" for="">Company Name</label>
                                    <?php
                                    $companyNames = array(
                                        "Lakshmi Iron corpration S1",
                                        "Lakshmi Iron corpration S2",
                                        "RK Steels Private Ltd",
                                        "SLR Factory Made Steels",
                                        "SLR Factory Made Steels Production",
                                        "Optimize Steels&Scrap Factory"
                                    );
                                    ?>

                                    <select name="company_name" class="form-control" id="company_name">
                                        <option value="">Select</option>
                                        <?php
                                        foreach ($companyNames as $name) {
                                            // Escape the company name for safe HTML output
                                            $escapedName = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
                                            // Check if the company name matches the selected value (if available)
                                            $selected = ($name === $company_name) ? 'selected' : '';
                                            echo "<option value=\"$escapedName\" $selected>$escapedName</option>";
                                        }
                                        ?>
                                    </select>
                                </div> 
                                <div class="form-items">
                                    <label class="gst_number" for="">GST</label>
                                    <input type="text" name="gst_number" id="gst_number" class="form-control" value="<?php echo $gst ?>"
                                        placeholder="GST*********678" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-items">
                                    <label class="category" for="">Category</label>
                                    <?php
                                    $category_list = array(
                                        "Contract",
                                        "Local Dealer",
                                        "Export Dealer",
                                        "WholeSale Dealer",
                                        "Lease Agreement",
                                        "Export Dealer"
                                    );
                                    ?>

                                    <select name="category" class="form-control" id="category">
                                        <option value="">Select</option>
                                        <?php
                                        foreach ($category_list as $name) {
                                            $escapedName = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
                                            $selected = ($name === $category) ? 'selected' : '';
                                            echo "<option value=\"$escapedName\" $selected>$escapedName</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-items">
                                    <label class="unique_id" for="">Unique ID</label>
                                    <input type='text' class='form-control' name='unique_id' value='<?php echo $unique ?>' readonly>
                                </div>
                                <div class="form-items">
                                    <label class="manager_name" for="">Manager</label>
                                    <?php
                                    $manager_names = array(
                                        "Vector",
                                        "Joes",
                                        "Sam",
                                        "Lara",
                                    );
                                    ?>

                                    <select name="manager_name" class="form-control" id="manager_name">
                                        <option value="">Select</option>
                                        <?php
                                        foreach ($manager_names as $action) {
                                            $escapedName = htmlspecialchars($action, ENT_QUOTES, 'UTF-8');
                                            $selected = ($action === $manager) ? 'selected' : '';
                                            echo "<option value=\"$escapedName\" $selected>$escapedName</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-items">
                                    <label class="union_name" for="">Union</label>
                                    <?php
                                    $union_list = array(
                                        "Sector Pue",
                                        "Rectal Union",
                                        "Stripy Groups",
                                        "Vendata Groups",
                                    );
                                    ?>

                                    <select name="union_name" class="form-control" id="union_name">
                                        <option value="">Select</option>
                                        <?php
                                        foreach ($union_list as $action) {
                                            $escapedName = htmlspecialchars($action, ENT_QUOTES, 'UTF-8');
                                            $selected = ($action === $union) ? 'selected' : '';
                                            echo "<option value=\"$escapedName\" $selected>$escapedName</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <script>
                                    var loadFile = function (event) {
                                        var output = document.getElementById('output');
                                        output.src = URL.createObjectURL(event.target.files[0]);
                                        output.onload = function () {
                                            URL.revokeObjectURL(output.src) // free memory
                                        }
                                    };
                                </script>
                                <div class="form-items">
                                    <label class="photo" for="">Photo</label>
                                    <input type="file" accept="image/*" onchange="loadFile(event)" name="photo"
                                        class="form-control" id="photo" value="<?php echo $folder ?>" />
                                </div>
                                <div class="show_photo" style="margin-left: 60%;"><img id="output" width="100" src="<?php echo $folder ?>"
                                        height="100"></div>
                            </div>
                        </div>
                    </div>

                    <div id="form_2" style="display: block;">

                        <div class="container-below">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="title"  style="color: dodgerblue;">Present Address Details</div>
                                    <div class="form-items">
                                        <label class="" for="">Country</label>
                                        <?php
                                    $country_list = array(
                                        "India",
                                    );
                                    ?>

                                    <select name="country" class="form-control" id="country">
                                        <option value="">Select</option>
                                        <?php
                                        foreach ($country_list as $action) {
                                            $escapedName = htmlspecialchars($action, ENT_QUOTES, 'UTF-8');
                                            $selected = ($action === $country) ? 'selected' : '';
                                            echo "<option value=\"$escapedName\" $selected>$escapedName</option>";
                                        }
                                        ?>
                                    </select>
                                    </div>
                                    <div class="form-items">
                                        <label class="" for="">State</label>
                                        
                                    <?php
                                    $state_list = array(
                                        "Tamil Nadu",
                                    );
                                    ?>

                                    <select name="state" class="form-control" id="state">
                                        <option value="">Select</option>
                                        <?php
                                        foreach ($state_list as $action) {
                                            $escapedName = htmlspecialchars($action, ENT_QUOTES, 'UTF-8');
                                            $selected = ($action === $state) ? 'selected' : '';
                                            echo "<option value=\"$escapedName\" $selected>$escapedName</option>";
                                        }
                                        ?>
                                    </select>
                                    </div>
                                    <div class="form-items">
                                        <label class="" for="">District</label>
                                    <?php
                                    $city_list = array(
                                        "Erode",
                                        "Coimbatore",
                                        "Tirupur",
                                    );
                                    ?>

                                    <select name="city" class="form-control" id="city">
                                        <option value="">Select</option>
                                        <?php
                                        foreach ($city_list as $action) {
                                            $escapedName = htmlspecialchars($action, ENT_QUOTES, 'UTF-8');
                                            $selected = ($action === $city) ? 'selected' : '';
                                            echo "<option value=\"$escapedName\" $selected>$escapedName</option>";
                                        }
                                        ?>
                                    </select>

                                    </div>
                                    <div class="form-items">
                                        <label for="">Building No</label>
                                        <input type="text" name="building_number" id="building_number" class="form-control" value="<?php echo $building_no ?>"
                                            placeholder="" />
                                    </div>
                                    <div class="form-outline">
                                        <label for="" class="textarea-lable">Street</label>
                                        <textarea name="street" class="form-control" id="street" value=""
                                            rows="2"><?php echo $street ?></textarea>
                                    </div>
                                    <div class="form-outline">
                                        <label for="" class="textarea-lable">Area</label>
                                        <textarea name="area" class="form-control" id="area" cols="10" value = ""
                                            rows="2"><?php echo $area; ?></textarea>
                                    </div>
                                    <div class="form-items">
                                        <label for="">Pincode</label>
                                        <input name="pincode" type="text" id="pincode" value="<?php echo $pincode ?>"
                                            class="form-control" value="" placeholder="" />
                                    </div>
                                    <div class="form-check" style="margin-left: 57%;">
                                        <input class="form-check-input" type="checkbox" id="same" value=""
                                            onchange="sameAddress()" />
                                        <label class="form-check-label" for="flexCheckChecked">Same Address</label>
                                    </div>

                                </div>
                                <div class="col-sm-6">
                                    <div class="title" style="color: dodgerblue;">Permanent Address Details</div>
                                    <div class="form-items">
                                        <label class="" for="">Country</label>
                                        <?php
                                    $country_pmt_list = array(
                                        "India",
                                    );
                                    ?>

                                    <select name="country_per" class="form-control" id="country_per">
                                        <option value="">Select</option>
                                        <?php
                                        foreach ($country_pmt_list as $action) {
                                            $escapedName = htmlspecialchars($action, ENT_QUOTES, 'UTF-8');
                                            $selected = ($action === $country_pmt) ? 'selected' : '';
                                            echo "<option value=\"$escapedName\" $selected>$escapedName</option>";
                                        }
                                        ?>
                                    </select>
                                    </div>
                                    <div class="form-items">
                                        <label class="" for="">State</label>
                                        <?php
                                    $state_pmt_list = array(
                                        "Tamil Nadu",
                                    );
                                    ?>

                                    <select name="state_per" class="form-control" id="state_per">
                                        <option value="">Select</option>
                                        <?php
                                        foreach ($state_pmt_list as $action) {
                                            $escapedName = htmlspecialchars($action, ENT_QUOTES, 'UTF-8');
                                            $selected = ($action === $state_pmt) ? 'selected' : '';
                                            echo "<option value=\"$escapedName\" $selected>$escapedName</option>";
                                        }
                                        ?>
                                    </select>
                                    </div>
                                    <div class="form-items">
                                        <label class="" for="">District</label>
                                        
                                    <?php
                                    $city_list = array(
                                        "Erode",
                                        "Coimbatore",
                                        "Tirupur",
                                    );
                                    ?>

                                    <select name="city_per" class="form-control" id="city_per">
                                        <option value="">Select</option>
                                        <?php
                                        foreach ($city_list as $action) {
                                            $escapedName = htmlspecialchars($action, ENT_QUOTES, 'UTF-8');
                                            $selected = ($action === $city_pmt) ? 'selected' : '';
                                            echo "<option value=\"$escapedName\" $selected>$escapedName</option>";
                                        }
                                        ?>
                                    </select>
                                    </div>
                                    <div class="form-items">
                                        <label for="">Building No</label>
                                        <input type="text" name="building_number_per" id="building_number_per"
                                            class="form-control" value="<?php echo $building_no_pmt ?>" placeholder="" />
                                    </div>
                                    <div class="form-outline">
                                        <label for="" class="textarea-lable">Street</label>
                                        <textarea name="street_per" class="form-control" id="street_per"value=""
                                            rows="2"><?php echo $street_pmt ?></textarea>
                                    </div>
                                    <div class="form-outline">
                                        <label for="" class="textarea-lable">Area</label>
                                        <textarea name="area_per" class="form-control" id="area_per" cols="10" value=""
                                            rows="2"><?php echo $area_pmt ?></textarea>
                                    </div>
                                    <div class="form-items">
                                        <label for="">Pincode</label>
                                        <input type="text" name="pincode_per" id="pincode_per" class="form-control" value="<?php echo $pincode_pmt ?>"
                                            placeholder="" />
                                    </div>
                                    <div class="button-section">
                                        <a href="master.php" class="btn btn-dark cancel">Cancel</a>
                                        <button name="submit" class="btn btn-primary" onclick="validateForm(event)">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
    
    <!-- <script src="js/master_script.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
//   $(document).on('change', '#country', function() {
//     var countryID = document.getElementById('country').value; // Remove the () after value
//     // alert(countryID);
//     if (countryID) {
//       $.ajax({
//         type: 'POST',
//         url: 'dropdown_list.php',
//         data: {'country_id': countryID},
//         success: function(result) {
//         //   alert('Data retrieved successfully!');
//           $('#state').html(result);
//         }
//       });
//     } else {
//       $('#state').html('<option value="">No Country Found</option>');
//       $('#city').html('<option value="">No State Found</option>');
//     }
//   });

//   // ajax script for getting city data
//   $(document).on('change', '#state', function() {
//     var stateID = document.getElementById('state').value; // Remove the () after value
//     // alert(stateID);
//     if (stateID) {
//       $.ajax({
//         type: 'POST',
//         url: 'dropdown_list.php',
//         data: {'state_id': stateID},
//         success: function(result) {
//           $('#city').html(result);
//         }
//       });
//     } else {
//       $('#city').html('<option value="">No City Found</option>');
//     }
//   });

//   $(document).on('change', '#country_per', function() {
//     var countryID = document.getElementById('country_per').value; // Remove the () after value
//     // alert(countryID);
//     if (countryID) {
//       $.ajax({
//         type: 'POST',
//         url: 'dropdown_list.php',
//         data: {'country_id': countryID},
//         success: function(result) {
//         //   alert('Data retrieved successfully!');
//           $('#state_per').html(result);
//         }
//       });
//     } else {
//       $('#state_per').html('<option value="">No Country Found</option>');
//       $('#city_per').html('<option value="">No State Found</option>');
//     }
//   });

//   // ajax script for getting city data
//   $(document).on('change', '#state_per', function() {
//     var stateID = document.getElementById('state_per').value; // Remove the () after value
//     // alert(stateID);
//     if (stateID) {
//       $.ajax({
//         type: 'POST',
//         url: 'dropdown_list.php',
//         data: {'state_id': stateID},
//         success: function(result) {
//           $('#city_per').html(result);
//         }
//       });
//     } else {
//       $('#city_per').html('<option value="">No City Found</option>');
//     }
//   });

  
function validateForm(event) {
    var gen = $("#gen").val();
    var customer_name = $("#customer_name").val();
    var doj = $("#doj").val();
    var foundation = $("#foundation").val();
    var company_name = $("#company_name").val();
    var gst_number = $("#gst_number").val();
    var category = $("#category").val();
    var manager_name = $("#manager_name").val();
    var union_name = $("#union_name").val();
    var photo = $("#photo").val();

    var country = $("#country").val();
    var state = $("#state").val();
    var city = $("#city").val();
    var building_number = $("#building_number").val();
    var street = $("#street").val();
    var area = $("#area").val();
    var pincode = $("#pincode").val();

    var country_per = $("#country_per").val();
    var state_per = $("#state_per").val();
    var city_per = $("#city_per").val();
    var building_number_per = $("#building_number_per").val();
    var street_per = $("#street_per").val();
    var area_per = $("#area_per").val();
    var pincode_per = $("#pincode_per").val();


    if (gen === '') {
      alert('Please select a gender');
      event.preventDefault();
    }
    else if (customer_name === '') {
      alert('Please enter a customer name');
      event.preventDefault();
    }
    else if (doj === "") {
      alert("Please select a date of jioning.");
      event.preventDefault();
    }
    else if (foundation === "") {
      alert("Please enter foundation.");
      event.preventDefault();
    }
    else if (company_name === "") {
      alert("Please select a Company name.");
      event.preventDefault();
    }
    else if (gst_number === "") {
      alert("Please select an GST number.");
      event.preventDefault();
    }
    else if (category === "") {
      alert("Please select a category.");
      event.preventDefault();
    }
    else if (manager_name === "") {
      alert("Please select a manager name.");
      event.preventDefault();
    }
    else if (union_name === '') {
      alert("Please select a union name.");
      event.preventDefault();
    }

    // Perform validation for each field
    
    else if (country === "") {
      alert("Please select present country.");
      event.preventDefault();
    }
    else if (state === "") {
      alert("Please select present state.");
      event.preventDefault();
    }
    else if (city === "") {
      alert("Please select present district.");
      event.preventDefault();
    }
    else if (building_number === "") {
      alert("Please enter building number for present address.");
      event.preventDefault();
    }
    else if (street === "") {
      alert("Please enter street for present address.");
      event.preventDefault();
    }
    else if (area === "") {
      alert("Please enter area for present address.");
      event.preventDefault();
    }
    else if (pincode === "") {
      alert("Please enter pincode for present address.");
      event.preventDefault();
    }
    // permanent address
    else if (country_per === "") {
      alert("Please select permanent country.");
      event.preventDefault();
    }
    else if (state_per === "") {
      alert("Please select permanent state.");
      event.preventDefault();
    }
    else if (city_per === "") {
      alert("Please select permanent district.");
      event.preventDefault();
    }
    else if (building_number_per === "") {
      alert("Please enter building number for permanent address.");
      event.preventDefault();
    }
    else if (street_per === "") {
      alert("Please enter street for permanent address.");
      event.preventDefault();
    }
    else if (area_per === "") {
      alert("Please enter area for permanent address.");
      event.preventDefault();
    }
    else if (pincode_per === "") {
      alert("Please enter pincode for permanent address.");
      event.preventDefault();
    }
    else {
      alert('Customer details stored successfully.')
    }
  }
  function sameAddress() {
    if (document.getElementById(
      "same").checked) {
        
      document.getElementById("country_per").value =document.getElementById("country").value;
        
      document.getElementById(
        "state_per").value =
        document.getElementById(
          "state").value;
        
      document.getElementById(
        "city_per").value =
        document.getElementById(
          "city").value;

      document.getElementById(
        "building_number_per").value =
        document.getElementById(
          "building_number").value;

      document.getElementById(
        "street_per").value =
        document.getElementById(
          "street").value;

      document.getElementById(
        "area_per").value =
        document.getElementById(
          "area").value;

      document.getElementById(
        "pincode_per").value =
        document.getElementById(
          "pincode").value;



    } else {
      document.getElementById(
        "building_number_per").value = "";

      document.getElementById(
        "street_per").value = "";

      document.getElementById(
        "area_per").value = "";

      document.getElementById(
        "pincode_per").value = "";

    }
  }
</script>

</body>

</html>