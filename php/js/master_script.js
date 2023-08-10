

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

    var country = $("#emp_countrys").val();
    var state = $("#emp_states").val();
    var city = $("#emp_district").val();
    var building_number = $("#emp_bild").val();
    var street = $("#emp_street").val();
    var area = $("#emp_area").val();
    var pincode = $("#emp_pin").val();

    var country_per = $("#emp_p_countrys").val();
    var state_per = $("#emp_p_states").val();
    var city_per = $("#emp_p_districts").val();
    var building_number_per = $("#emp_p_bild").val();
    var street_per = $("#emp_p_street").val();
    var area_per = $("#emp_p_area").val();
    var pincode_per = $("#emp_p_pin").val();


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
    else if (union_name) {
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
      alert('Employee official details stored successfully.')
    }
  }

  // $(document).on('change', '#country', function() {
  //   var countryID = document.getElementById('country').value; // Remove the () after value
  //   // alert(countryID);
  //   if (countryID) {
  //     $.ajax({
  //       type: 'POST',
  //       url: 'dropdown_list.php',
  //       data: {'country_id': countryID},
  //       success: function(result) {
  //       //   alert('Data retrieved successfully!');
  //         $('#state').html(result);
  //       }
  //     });
  //   } else {
  //     $('#state').html('<option value="">No Country Found</option>');
  //     $('#city').html('<option value="">No State Found</option>');
  //   }
  // });

  // // ajax script for getting city data
  // $(document).on('change', '#state', function() {
  //   var stateID = document.getElementById('state').value; // Remove the () after value
  //   // alert(stateID);
  //   if (stateID) {
  //     $.ajax({
  //       type: 'POST',
  //       url: 'dropdown_list.php',
  //       data: {'state_id': stateID},
  //       success: function(result) {
  //         $('#city').html(result);
  //       }
  //     });
  //   } else {
  //     $('#city').html('<option value="">No City Found</option>');
  //   }
  // });

  // $(document).on('change', '#country_per', function() {
  //   var countryID = document.getElementById('country_per').value; // Remove the () after value
  //   // alert(countryID);
  //   if (countryID) {
  //     $.ajax({
  //       type: 'POST',
  //       url: 'dropdown_list.php',
  //       data: {'country_id': countryID},
  //       success: function(result) {
  //       //   alert('Data retrieved successfully!');
  //         $('#state_per').html(result);
  //       }
  //     });
  //   } else {
  //     $('#state_per').html('<option value="">No Country Found</option>');
  //     $('#city_per').html('<option value="">No State Found</option>');
  //   }
  // });

  // // ajax script for getting city data
  // $(document).on('change', '#state_per', function() {
  //   var stateID = document.getElementById('state_per').value; // Remove the () after value
  //   // alert(stateID);
  //   if (stateID) {
  //     $.ajax({
  //       type: 'POST',
  //       url: 'dropdown_list.php',
  //       data: {'state_id': stateID},
  //       success: function(result) {
  //         $('#city_per').html(result);
  //       }
  //     });
  //   } else {
  //     $('#city_per').html('<option value="">No City Found</option>');
  //   }
  // });

  
  // function sameAddress() {
  //   if (document.getElementById(
  //     "same").checked) {
        
  //     document.getElementById("country_per").value =document.getElementById("country").value;
        
  //     document.getElementById(
  //       "state_per").value =
  //       document.getElementById(
  //         "state").value;
        
  //     document.getElementById(
  //       "city_per").value =
  //       document.getElementById(
  //         "city").value;

  //     document.getElementById(
  //       "building_number_per").value =
  //       document.getElementById(
  //         "building_number").value;

  //     document.getElementById(
  //       "street_per").value =
  //       document.getElementById(
  //         "street").value;

  //     document.getElementById(
  //       "area_per").value =
  //       document.getElementById(
  //         "area").value;

  //     document.getElementById(
  //       "pincode_per").value =
  //       document.getElementById(
  //         "pincode").value;



  //   } else {
  //     document.getElementById(
  //       "building_number_per").value = "";

  //     document.getElementById(
  //       "street_per").value = "";

  //     document.getElementById(
  //       "area_per").value = "";

  //     document.getElementById(
  //       "pincode_per").value = "";

  //   }
  // }