
    // function onSubmisstion(event){
    //     var invoice = document.getElementById('invoice').value;
        
    //     // Clear the input fields
    //     document.getElementById('item_type').value = '';
    //     document.getElementById('item_code').value = '';
    //     document.getElementById('item_rate').value = '';
    //     document.getElementById('item_qty').value = '';
    //     document.getElementById('total').value = '';
    //     alert('Invoice Details stored successfully, Invoice ID: ' + invoice)
    // }
/*function onSubmisstion(event){
    var name = document.getElementById('emp_name').value;
    var type = document.getElementById('item_type').value;
    var code = document.getElementById('item_code').value;
    var rate = document.getElementById('item_rate').value;
    var qty = document.getElementById('item_qty').value;
    if (name == ''){
        alert('Customer name is required');
        event.preventDefault();
    }
    else if (type == ''){
        alert('Item type is required');
        event.preventDefault();
    }
    else if (type == ''){
        alert('Item code is required');
        event.preventDefault();
    }
    else if (type == ''){
        alert('Item rate is required');
        event.preventDefault();
    }
    else if (type == ''){
        alert('Item quantity is required');
        event.preventDefault();
    }
    else{
        return 0;
    }
}*/

function disableSelect(selectElement) {
    selectElement.disabled = true;
    }
    
    function item_details_edit(event) {
        document.getElementById('addButton').style.display = 'block';
        document.getElementById('editButton').style.display = 'none';
        var my_id = document.getElementById('get_id').value;
      
        var invoice_id = document.getElementById('invoice').value;
        var type = document.getElementById('item_type').value;
        var code = document.getElementById('item_code').value;
        var rate = document.getElementById('item_rate').value;
        var qty = document.getElementById('item_qty').value;
        var tol = document.getElementById('total').value;
        var csrfToken = document.querySelector('input[name="csrfmiddlewaretoken"]').value;
      
        $.ajax({
          url: '/update_dte/',
          type: 'POST',
          headers: {
            'X-CSRFToken': csrfToken
          },
          data: {
            'invoice_id':invoice_id,
            'my_id': my_id,
            'type': type,
            'code': code,
            'rate': rate,
            'qty': qty,
            'tol': tol,
            'csrfmiddlewaretoken': csrfToken // Include the CSRF token in the request data
          },
          success: function(response) {
            if (response) {
                $('#table-body').html(response);
                console.log('Success Updated Table') // Call the getTableData function to reload the table data
      
              // Clear the input fields
              document.getElementById('item_type').value = '';
              document.getElementById('item_code').value = '';
              document.getElementById('item_rate').value = '';
              document.getElementById('item_qty').value = '';
              document.getElementById('total').value = '';
            }
            // Handle the response as needed
          },
          error: function(xhr, errmsg, err) {
            console.log(errmsg);
          }
        });
      }
      
      
      // Add an event listener to the edit button
      document.getElementById('editButton').addEventListener('click', item_details_edit);
      

function UpdateItem(id){
    alert(id);
    document.getElementById('addButton').style.display = 'none';
    document.getElementById('editButton').style.display = 'block';
    var my_id = id;
    $.ajax({
        url: '/update_sales_dte/',
        type: 'GET',
        data: {
            'my_id': my_id
        },
        success: function (response) {
            //console.log(response.site_name)
            $('#item_type').val(response.item_type);
            $('#item_code').val(response.item_code);
            $('#item_rate').val(response.item_rate);
            $('#item_qty').val(response.Quentity);
            $('#total').val(response.Total);
            $('#get_id').val(response.Get_id);
        },
        error: function (xhr, errmsg, err) {
            console.log(errmsg);
        }
    });
    
}


function item_details_add(event) {
    event.preventDefault();
    var name = $('#customer_name').val();
    if (name != ''){
    var invoice_id = $('#invoice').val();
    var bill_date = $('#bill_date').val();
    var itemType = $('#item_type').val();
    var itemCode = $('#item_code').val();
    var itemRate = $('#item_rate').val();
    var itemQty = $('#item_qty').val();
    var total = $('#total').val();

    // Create an object to hold the form data
    var formData = {
        name_id: name,
        invoice: invoice_id,
        bill_date: bill_date,
        item_type: itemType,
        item_code: itemCode,
        item_rate: itemRate,
        item_qty: itemQty,
        total: total,
     };
     
    document.getElementById('item_type').value = '';
    document.getElementById('item_code').value = '';
    document.getElementById('item_rate').value = '';
    document.getElementById('item_qty').value = '';
    document.getElementById('total').value = '';
    }
     else{
        alert('Customer name is required');
      // Add the CSRF token
    };

    // Make an AJAX request to the backend endpoint
    $.ajax({
        url: 'sales_entry_add_bill.php',
        type: 'POST',
        data: formData,
        success: function(response) {
            // Handle the successful response here
            // Update the HTML of a specific element with the table HTML
            if(response){
                $('#table-body').html(response.table_rows);
                // alert(response.table_rows);
                // alert(response.bill_date);
                // alert(response.itemType);
                // alert(response.itemCode);
                // alert(response.itemRate);
                // alert(response.itemQty);
                // alert(response.total);
            console.log('Success Inserted Table')
            }
            else{
                console.log('Fail table')
            }
        },
        error: function(error) {
            // console.log(error);
            // Handle any errors that occur during the request
        }
    });

}

function deleteItem(id) {
    var csrfToken = '{{ csrf_token }}';  // Include the CSRF token from Django

    $.ajax({
        url: '/del_sales_dte/' + id + '/',
        type: 'POST',
        headers: {
            'X-CSRFToken': csrfToken  // Set the CSRF token in the request headers
        },
        success: function(response) {
            if (response === 'Deleted') {
                $('tr[data-id="' + id + '"]').remove();
                document.getElementById('item_type').value = '';
                document.getElementById('item_code').value = '';
                document.getElementById('item_rate').value = '';
                document.getElementById('item_qty').value = '';
                document.getElementById('total').value = '';
            } else {
                alert('FALSE');
            }
        },
        error: function(error) {
            // Handle any errors that occur during the request
            alert('Error');
        }
    });
}


$(document).ready(function () {
    $('#customer_name').change(function () {
        var selectedId = $(this).val();
        if (selectedId !== '') {
            updateList(selectedId);
        } else {
            resetFields();
        }
    });

    function updateList(selectedId) {
        // Make an AJAX request to fetch the corresponding data
        $.ajax({
            url: 'sales_entry_fetch_name_dte.php',
            type: 'GET',
            data: {
                'selectedId': selectedId // Use the correct parameter name 'selectedId'
            },
            success: function (response) {
                $('#company_name').val(response.company_name);
                $('#gst_number').val(response.gst);
                
                var concateaddress = 
                    response.building_number + ', '+
                    response.street + ', '+
                    response.area + ', '+
                    response.city + ', '+
                    response.state + ', '+
                    response.country + ', '+
                    response.pincode;
                

                $('#address').val(concateaddress);
            },
            error: function (xhr, errmsg, err) {
                console.log(errmsg);
            }
        });
    }

    function resetFields() {
        $('#company_name').val('');
        $('#gst_number').val('');
        $('#address').val('');
    }
});


$(document).ready(function () {
    $('#item_type').change(function () {
        var selectedId = $(this).val();
        if (selectedId !== '') {
            updateList(selectedId);
        } else {
            resetFields();
        }
    });

    function updateList(selectedId) {
        // Make an AJAX request to fetch the corresponding data
        $.ajax({
            url: 'sales_entry_fetch_type_dte.php',
            type: 'GET',
            data: {
                'selectedId': selectedId
            },
            success: function (response) {
                // alert(response.code);
                $('#item_code').val(response.code);
                $('#item_rate').val(response.rate);
            },
            error: function (xhr, errmsg, err) {
                console.log(errmsg);
            }
        });
    }

    function resetFields() {
        $('#item_code').val('');
        $('#item_rate').val('');
    }
});

    function refresh_window() {
        alert('The employee record was deleted');
    }


    function calculateTotal() {
        var itemRate = parseFloat(document.getElementById('item_rate').value);
        var itemQty = parseFloat(document.getElementById('item_qty').value);
        var total = isNaN(itemRate) || isNaN(itemQty) ? '' : (itemRate * itemQty).toFixed(2);
        document.getElementById('total').value = total;
    }