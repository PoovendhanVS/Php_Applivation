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
$last_id = $_GET['id'];
?>
<?php 
$last_id = $_GET['id'];
if ($last_id) {
    include 'connect.php';
    $sql2 = "SELECT * FROM invoice_details WHERE ID= '$last_id'";
    $result_2 = $conn->query($sql2);
    
    // Check if the customer query returned results before accessing data
    if ($result_2->num_rows > 0) {
        $row_2 = $result_2->fetch_assoc();
        $c_id = $row_2['CUSTOMER_ID'];
        $invoice_id = $row_2['INVOICE_ID'];
        $bill_date = $row_2['BILL_DATE'];
    } else {
        $c_name = "N/A"; // Set a default value if no customer found
    }
}
if (isset($_POST['submit'])) {
    $invoice_number = $_POST['invoice'];
    $bill_date = $_POST['bill_date'];
    $customer_id = $_POST['customer_name'];
    $total = 'NONE';
    include 'connect.php';
    $sql = "UPDATE invoice_details SET CUSTOMER_ID = '$customer_id', INVOICE_ID = '$invoice_number', BILL_DATE = '$bill_date', TOTAL = 'NONE' WHERE id = '$last_id'";
    $result = $conn->query($sql);
    if ($result) {
        echo "<script>";
        echo "alert('Invoice Details Updated Successfully');";
        echo "window.location.href = 'sales_list.php';";
        echo "</script>";
    } else {
        echo "<script>";
        echo "alert('Invoice Details Cannot Be Updated');";
        echo "</script>";
    }
}

?>
<form id="myForm" action="" method="POST" onsubmit="item_submit(event)" enctype="multipart/form-data" autocomplete="off">
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
                                <?php
                                $bill_date = date('Y-m-d');
                                 ?>
                                <input type="date" name="bill_date" id="bill_date" class="form-control"
                                    max="<?php echo $bill_date ?>" value="<?php echo $bill_date ?>" />
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
                                        <option value="<?php  echo $Id; ?>" <?php if($c_id == $Id) echo 'Selected'; ?>><?php echo $Name; ?></option>
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
                        <th  style='width:200px'>Item Type</th>
                        <th>Item Code</th>
                        <th>Item Rate</th>
                        <th>Qty</th>
                        <th style="text-align: right;">Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="table-body">
                </tbody>
            </table>
            <p></p>
            <button class="btn btn-primary" style="margin-left:1% ;float: right;width:100px;">Update</button>
        <a href="sales_list.php" type="button" class="btn btn-info" style="float:right; width:100px;">Cancel</a>
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

<script src="js/sales_entry_update.js"></script>


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