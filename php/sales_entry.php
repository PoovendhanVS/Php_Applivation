<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - Sales Entry</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/master_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        crossorigin="anonymous" />
    <!-- bootstrap css cdn files -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-components-web/4.0.0/material-components-web.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.material.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <style> 
        .header-cool{
            background-image: linear-gradient(to bottom, #3aafbb, #42b3c6, #4cb7d0, #58bbda, #65bfe3, #67c5e9, #6acbf0, #6cd1f6, #65dafa, #5fe3fc, #5decfc, #5ff5fb);
          }
        b.table-bordered th,
        .table-bordered td {
            border: 2px solid #44444426;
        }

        input[type=text].form-control-small {
            width: auto;
        }

        input[type=number].form-control-small {
            width: auto;
        }

        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            display: none;
        }

        input[type="number"] {
            appearance: textfield;
            -moz-appearance: textfield;
        }
        .sub-title{
            text-align: center;
        }
    </style>
</head>

<body>
<?php include 'html/nav-bar.html' ?>
<?php
function get_last_invoice_number() {
    $filename = 'last_invoice_number.txt';
    if (file_exists($filename)) {
        $last_number = intval(file_get_contents($filename));
        return $last_number;
    } else {
        return 0;
    }
}

function update_last_invoice_number($number) {
    $filename = 'last_invoice_number.txt';
    file_put_contents($filename, $number);
}

function invoice_num($pad_len = 3, $prefix = null) {
    // Increment the counter (read from file) on each call
    $last_number = get_last_invoice_number();
    $counter = $last_number + 1;

    // Format the counter with leading zeros and year
    $counter_padded = str_pad($counter, $pad_len, "0", STR_PAD_LEFT);
    $year = date('y'); // Get the last two digits of the current year (2023 -> 23)

    // Create the invoice number with or without the prefix
    $invoice_number = ($prefix ? $prefix : '') . $counter_padded . '-' . $year;

    // Update the last used invoice number in the file
    update_last_invoice_number($counter);

    return $invoice_number;
}

$invoice_id = invoice_num(3, "SAI-");

?>
<form id="myForm" action="" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="container-fluid">
            <div class="main-form">
                <h4 class="sub_title" style="color: dodgerblue; text-align:center; text-decoration:underline;">SALES ENTRY</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-items">
                                <label class="invoice" for="">Invoice</label>
                                <input type="text" name="invoice" id="invoice" class="form-control" placeholder=""
                                    value="<?php echo $invoice_id ?>" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-items">
                                <label for="">Billing Date</label>
                                <?php $dt = new DateTime ?>
                                <input type="date" name="bill_date" id="bill_date" class="form-control"
                                    max="<?php echo $dt->format('Y-m-d') ?>" value="<?php echo $dt->format('Y-m-d') ?>" />
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-items">
                                <label>Name</label>
                                <select  class="form-control" name="customer_name" id="customer_name">
                                <option value="">Select</option>
                                <?php
                                include 'connect.php';
                                $Data = "SELECT id, Customer_Name FROM customer_creation";
                                $result = mysqli_query($conn, $Data);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($arr = mysqli_fetch_assoc($result)) {
                                        $Id = $arr['id'];
                                        $Name = $arr['Customer_Name'];
                                ?>
                                        <option value="<?php echo $Id; ?>"><?php echo $Name; ?></option>
                                <?php
                                    }
                                }
                                ?>
                                </select>
                            </div>
                        </div>
    
                        <div class="col-md-3">
                            <div class="form-items">
                                <label for="company_name">Company Name</label>
                                <input type="text" class="form-control" name="company_name" id="company_name" >
                            </div>
                        </div>
    
    
    
                        <div class="col-md-3">
                            <div class="form-items">
                                <label for="">Address</label>
                                <textarea type="text" name="address" id="address" rows="3" class="form-control"
                                    placeholder="" ></textarea>
                            </div>
                        </div>
    
                        <div class="col-md-3">
                            <div class="form-items">
                                <label for="">GST</label>
                                <input type="text" id="gst_number" name="gst_number" class="form-control" placeholder="" />
                            </div>
                        </div>
    
                    </div>
            </div>
        </div>
    

    <div class="container-fluid">
        <div class="main-form">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-items">
                        <label class="item_type" for="">Item Type</label>
                        <select  class="form-control" name="item_type" id="item_type" style="width:100%;">
                            <option value="">Select</option>
                            <?php
                            include 'connect.php';
                            $Data = "SELECT id, Item_Type FROM item_creation";
                            $result = mysqli_query($conn, $Data);
                            if (mysqli_num_rows($result) > 0) {
                                while ($arr = mysqli_fetch_assoc($result)) {
                                    $Id = $arr['id'];
                                    $Type = $arr['Item_Type'];
                            ?>
                                    <option value="<?php echo $Type; ?>"><?php echo $Type; ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-items">
                        <label for="">Item Code</label>
                        <input type="text" name="item_code" id="item_code" class="form-control-small" placeholder="" />
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-outline">
                        <label for="" class="textarea-lable">Item Rate</label>
                        <input type="number" name="item_rate" id="item_rate" class="form-control-small"
                            placeholder="" />
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-outline">
                        <label for="" class="textarea-lable">Quantity</label>
                        <input type="number" name="item_qty" id="item_qty" class="form-control-small"
                            oninput="calculateTotal()" placeholder="" />
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-outline">
                        <label for="" class="textarea-lable">Total</label>
                        <input type="number" name="total" id="total" class="form-control-small text-right" placeholder=""
                            readonly />
                    </div>
                </div>
                
                <input type="text" placeholder="type New" id="get_id" style="display: none;">
                <div class="col-md-1" style="display:flex;justify-content:center;align-items: center;text-align: center;">
                    <a class="btn btn-info add-btn" id="addButton" onclick="item_details_add(event)"
                        style="display:block;justify-content:center;align-items: center; ">Add</a>
                    <a class="btn btn-success edit-btn" id="editButton" onclick="item_details_edit(event)"
                        style="justify-content:center;align-items: center; display:none">Edit</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid" id="content">
            <table id="example" style="width:100%;" class="table table-striped table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>S.No</th>
                        <th>Invoice ID</th>
                        <th>Item Type</th>
                        <th>Item Code</th>
                        <th>Item Rate</th>
                        <th>Qty</th>
                        <th style="text-align: right;">Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="table-body">
                            
                    
                <?php /*
                    $count = 1;
    $sql_view = "SELECT * FROM sales_order";
    $result_to_table = $conn->query($sql_view);
    
    if ($result_to_table->num_rows > 0) {
        // If there are rows returned from the query
        while ($row = $result_to_table->fetch_assoc()) {
            $last_id = $row['id'];
            echo "<tr>
                <td>" . $count . "</td>
                <td>" . $row['Invoice_Number'] . "</td>
                <td>" . $row['Item_Type'] . "</td>
                <td>" . $row['Item_Code'] . "</td>
                <td>" . $row['Item_Rate'] . "</td>
                <td>" . $row['Quantity'] . "</td>
                <td>" . $row['Total'] . "</td>
                <td style='width:200px'>
                <a class='button-look-edit' title='edit' href='UpdateItem($last_id)'>
                <img src='img/edit.png' width='20px'></a>
                <a class='button-look-del' title='delete'  onclick='confirmDelete($user_id)' >
                <img src='img/delete.png' width='20px'></a>
                </td>
            </tr>";
            $count++;
        }
    } else {
        // Handle the case when no rows are returned from the query
        // For example, display a message that no data is available.
        echo "<tr><td colspan='8'>No data available.</td></tr>";
    } */
    ?>


                </tbody>
            </table>
            <p></p>
            <button class="btn btn-primary" style="margin-left:1% ;float: right;width:100px;" onclick="onSubmisstion(event)">Submit</button>
        <a href="/sales_home" type="button" class="btn btn-info" style="float:right; width:100px;">Cancel</a>
    </div>
</form>

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

<script src="js/sales_entry.js"></script>


  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js  "></script>

<script>
new DataTable('#example', {
    searching:false,
    paging: false,
    info: false, 
    scrollCollapse: true,
    scrollY: '130px'
});
</script>

</body>
</html>