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
?>

    <?php include 'html/nav-bar.html'; ?>
    <div class="container mt-4">

        <div class="container-fluid">
            <div class="main-form">
                <form id="myForm" action="customer_creation_add.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <div id="form_1" style="display: block;">
                        <h4 class="sub_title" style="color: dodgerblue;">CUSTOMER CREATION</h4>
                        <hr style="border-color:blue;">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-items">
                                    <label class="customer_full_name" for="">Customer Name</label>
                                    <select name="gen" class="gen" id="gen">
                                        <option value="">Select</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Others</option>
                                    </select>
                                    <input type="text" name="customer_name" id="customer_name" class="form-control"
                                        placeholder="Enter Customer Name" value="" />
                                </div>
                                <div class="form-items">
                                    <label for="">Date of join</label>
                                    <input name="doj" type="date" id="doj" class="form-control" max="" value="">
                                </div>
                                <div class="form-items">
                                    <label for="">Foundation</label>
                                    <input type="text" id="foundation" name="foundation" class="form-control" placeholder="Foundation" />
                                </div>
                                <br>
                                <div class="form-items">
                                    <label class="company_name" for="">Company Name</label>
                                    <select name="company_name" class="form-control" id="company_name">
                                        <option value="">Select</option>  
                                        <option value="Lakshmi Iron corpration S1">Lakshmi Iron corpration S1</option>
                                        <option value="Lakshmi Iron corpration S2">Lakshmi Iron corpration S2</option>
                                        <option value="RK Steels Private Ltd">RK Steels Private Ltd</option>
                                        <option value="SLR Factory Made Steels">SLR Factory Made Steels</option>
                                        <option value="SLR Factory Made Steels Production">SLR Factory Made Steels Production</option>
                                        <option value="Optimize Steels&Scrap Factory">Optimize Steels&Scrap Factory</option>                                    

                                    </select>
                                </div>
                                <div class="form-items">
                                    <label class="gst_number" for="">GST</label>
                                    <input type="text" name="gst_number" id="gst_number" class="form-control"
                                        placeholder="GST*********678" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-items">
                                    <label class="category" for="">Category</label>
                                    <select name="category" class="form-control" id="category">
                                        <option value="">Select</option>
                                        <option value="Contract">Contract</option>
                                        <option value="WholeSale Dealer">Local Dealer</option>
                                        <option value="Export Dealer">Export Dealer</option>
                                        <option value="Lease Agreement">Lease Agreement</option>
                                        <option value="Export Dealer">Export Dealer</option>
                                    </select>
                                </div>

                                <div class="form-items">
                                    <label class="unique_id" for="">Unique ID</label>
                                    <?php 
                                    $randomNumber = rand(1000, 10000);
                                    echo "<input type='text' class='form-control' name='unique_id' value='$randomNumber' readonly>"
                                    ?>
                                </div>
                                <div class="form-items">
                                    <label class="manager_name" for="">Manager</label>
                                    <select name="manager_name" class="form-control" id="manager_name">
                                        <option value="">Select</option>
                                        <option value="Vector">Vector</option>
                                        <option value="Joes">Joes</option>
                                        <option value="Sam">Sam</option>
                                        <option value="Lara">Lara</option>
                                    </select>
                                </div>

                                <div class="form-items">
                                    <label class="union_name" for="">Union</label>
                                    <select name="union_name" class="form-control" id="union_name">
                                        <option value="">Select</opti on>
                                        <option value="Sector Pue">Sector Pue</opti on>
                                        <option value="Rectal Union">Rectal Union</option>
                                        <option value="Stripy Groups">Stripy Groups</option>
                                        <option value="Vendata Groups">Vendata Groups</option>
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
                                        class="form-control" id="photo" value="{{ data.emp_img }}" />
                                </div>
                                <div class="show_photo" style="margin-left: 60%;"><img id="output" width="100"
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
                                        <select name="country" class="form-control" id="country">
                                        <option value="">Select Country</option>
                                        <option value="India">India</option>
                                    </select>
                                    </div>
                                    <div class="form-items">
                                        <label class="" for="">State</label>
                                        <select name="state" class="form-control" id="state">
                                            <option value="">State</option>
                                            <option value="Tamil Nadu">Tamil Nadu</option>
                                        </select>
                                    </div>
                                    <div class="form-items">
                                        <label class="" for="">District</label>
                                        <select name="city" class="form-control" id="city">
                                            <option value="">City</option>
                                            <option value="Erode">Erode</option>
                                            <option value="Coimbatore">Coimbatore</option>
                                            <option value="Tirupur">Tirupur</option>
                                        </select>
                                    </div>
                                    <div class="form-items">
                                        <label for="">Building No</label>
                                        <input type="text" name="building_number" id="building_number" class="form-control" value=""
                                            placeholder="" />
                                    </div>
                                    <div class="form-outline">
                                        <label for="" class="textarea-lable">Street</label>
                                        <textarea name="street" class="form-control" id="street"
                                            rows="2"></textarea>
                                    </div>
                                    <div class="form-outline">
                                        <label for="" class="textarea-lable">Area</label>
                                        <textarea name="area" class="form-control" id="area" cols="10"
                                            rows="2"></textarea>
                                    </div>
                                    <div class="form-items">
                                        <label for="">Pincode</label>
                                        <input name="pincode" type="text" id="pincode"
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
                                        <select name="country_per" class="form-control" id="country_per">
                                        <option value="">Select Country</option>
                                        <option value="India">India</option>
                                        </select>
                                    </div>
                                    <div class="form-items">
                                        <label class="" for="">State</label>
                                        <select name="state_per" class="form-control" id="state_per">
                                            <option value="">State</option>
                                            <option value="Tamil Nadu">Tamil Nadu</option>
                                        </select>
                                    </div>
                                    <div class="form-items">
                                        <label class="" for="">District</label>
                                        <select name="city_per" class="form-control" id="city_per">
                                            <option value="">City</option>
                                            <option value="Erode">Erode</option>
                                            <option value="Coimbatore">Coimbatore</option>
                                            <option value="Tirupur">Tirupur</option>
                                        </select>
                                    </div>
                                    <div class="form-items">
                                        <label for="">Building No</label>
                                        <input type="text" name="building_number_per" id="building_number_per"
                                            class="form-control" value="" placeholder="" />
                                    </div>
                                    <div class="form-outline">
                                        <label for="" class="textarea-lable">Street</label>
                                        <textarea name="street_per" class="form-control" id="street_per"
                                            rows="2"></textarea>
                                    </div>
                                    <div class="form-outline">
                                        <label for="" class="textarea-lable">Area</label>
                                        <textarea name="area_per" class="form-control" id="area_per" cols="10"
                                            rows="2"></textarea>
                                    </div>
                                    <div class="form-items">
                                        <label for="">Pincode</label>
                                        <input type="text" name="pincode_per" id="pincode_per" class="form-control"
                                            placeholder="" />
                                    </div>
                                    <div class="button-section">
                                        <a href="master.php" class="btn btn-dark cancel">Cancel</a>
                                        <button name="submit" class="btn btn-primary" onclick="validateForm(event)">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
    
    <script src="js/master_script.js"></script>
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
    else if (photo === "") {
      alert("Please insert a photo.");
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