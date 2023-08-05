

function validateForm(event) {
    var empGen = $("#emp_gender").val();
    var empName = $("#offic_emp_name").val();
    var empDoj = $("#__doj").val();
    var empRole = $("#role").val();
    var empSite = $("#site_name").val();
    var empShift = $("#gst").val();
    var empCate = $("#emp_cate").val();
    var empHead = $("#emp_head").val();
    var empSkill = $("#emp_skill").val();
    var empPhoto = $("#emp_photos").val();

    var empCountryS = $("#emp_countrys").val();
    var empStateS = $("#emp_states").val();
    var empDistrict = $("#emp_district").val();
    var empBild = $("#emp_bild").val();
    var empStreet = $("#emp_street").val();
    var empArea = $("#emp_area").val();
    var empPin = $("#emp_pin").val();

    var empPCountrys = $("#emp_p_countrys").val();
    var empPStates = $("#emp_p_states").val();
    var empPDistricts = $("#emp_p_districts").val();
    var empPBild = $("#emp_p_bild").val();
    var empPStreet = $("#emp_p_street").val();
    var empPArea = $("#emp_p_area").val();
    var empPPin = $("#emp_p_pin").val();


    if (empGen === '') {
      alert('Please select a gender');
      event.preventDefault();
    }
    else if (empName === '') {
      alert('Please enter a employee name');
      event.preventDefault();
    }
    else if (empDoj === "") {
      alert("Please select a date of jioning.");
      event.preventDefault();
    }
    else if (empRole === "") {
      alert("Please enter designation.");
      event.preventDefault();
    }
    else if (empSite === "") {
      alert("Please select a Company name.");
      event.preventDefault();
    }
    else if (empShift === "") {
      alert("Please select an GST number.");
      event.preventDefault();
    }
    else if (empCate === "") {
      alert("Please select a employee category.");
      event.preventDefault();
    }
    else if (empHead === "") {
      alert("Please select a staff head.");
      event.preventDefault();
    }
    else if (empSkill.length < 1) {
      alert("Please select a skill.");
      event.preventDefault();
    }
    else if (empPhoto === "") {
      alert("Please insert a employee photo.");
      event.preventDefault();
    }
    // Perform validation for each field
    
    else if (empCountryS === "") {
      alert("Please select present country.");
      event.preventDefault();
    }
    else if (empStateS === "") {
      alert("Please select present state.");
      event.preventDefault();
    }
    else if (empDistrict === "") {
      alert("Please select present district.");
      event.preventDefault();
    }
    else if (empBild === "") {
      alert("Please enter building number for present address.");
      event.preventDefault();
    }
    else if (empStreet === "") {
      alert("Please enter street for present address.");
      event.preventDefault();
    }
    else if (empArea === "") {
      alert("Please enter area for present address.");
      event.preventDefault();
    }
    else if (empPin === "") {
      alert("Please enter pincode for present address.");
      event.preventDefault();
    }
    // permanent address
    else if (empPCountrys === "") {
      alert("Please select permanent country.");
      event.preventDefault();
    }
    else if (empPStates === "") {
      alert("Please select permanent state.");
      event.preventDefault();
    }
    else if (empPDistricts === "") {
      alert("Please select permanent district.");
      event.preventDefault();
    }
    else if (empPBild === "") {
      alert("Please enter building number for permanent address.");
      event.preventDefault();
    }
    else if (empPStreet === "") {
      alert("Please enter street for permanent address.");
      event.preventDefault();
    }
    else if (empPArea === "") {
      alert("Please enter area for permanent address.");
      event.preventDefault();
    }
    else if (empPPin === "") {
      alert("Please enter pincode for permanent address.");
      event.preventDefault();
    }
    else {
      alert('Employee official details stored successfully.')
    }
  }

  $(document).on('change', '#country', function() {
    var countryID = document.getElementById('country').value; // Remove the () after value
    // alert(countryID);
    if (countryID) {
      $.ajax({
        type: 'POST',
        url: 'dropdown_list.php',
        data: {'country_id': countryID},
        success: function(result) {
        //   alert('Data retrieved successfully!');
          $('#state').html(result);
        }
      });
    } else {
      $('#state').html('<option value="">No Country Found</option>');
      $('#city').html('<option value="">No State Found</option>');
    }
  });

  // ajax script for getting city data
  $(document).on('change', '#state', function() {
    var stateID = document.getElementById('state').value; // Remove the () after value
    // alert(stateID);
    if (stateID) {
      $.ajax({
        type: 'POST',
        url: 'dropdown_list.php',
        data: {'state_id': stateID},
        success: function(result) {
          $('#city').html(result);
        }
      });
    } else {
      $('#city').html('<option value="">No City Found</option>');
    }
  });

  $(document).on('change', '#country_per', function() {
    var countryID = document.getElementById('country_per').value; // Remove the () after value
    // alert(countryID);
    if (countryID) {
      $.ajax({
        type: 'POST',
        url: 'dropdown_list.php',
        data: {'country_id': countryID},
        success: function(result) {
        //   alert('Data retrieved successfully!');
          $('#state_per').html(result);
        }
      });
    } else {
      $('#state_per').html('<option value="">No Country Found</option>');
      $('#city_per').html('<option value="">No State Found</option>');
    }
  });

  // ajax script for getting city data
  $(document).on('change', '#state_per', function() {
    var stateID = document.getElementById('state_per').value; // Remove the () after value
    // alert(stateID);
    if (stateID) {
      $.ajax({
        type: 'POST',
        url: 'dropdown_list.php',
        data: {'state_id': stateID},
        success: function(result) {
          $('#city_per').html(result);
        }
      });
    } else {
      $('#city_per').html('<option value="">No City Found</option>');
    }
  });

  
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