<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Creation</title>
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
    
<?php include 'html/nav-bar.html'?>

    <div class="container">
        <div class="main-form">
            <form id="myForm" action="item_creation_add.php" method="POST" enctype="" autocomplete="off">
                <h4 class="sub_title" style="color: dodgerblue;">ITEM CREATION</h4>
                <hr style="border-color:blue;">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-items">
                            <label class="emp_name" for="">Item Type</label>
                            <input type="text" name="item_type" id="item_type" class="form-control" placeholder="" />
                        </div>
                        <div class="form-items">
                            <label for="">Item code</label>
                            <input type="text" name="item_code" id="item_code" class="form-control" placeholder="" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-items">
                            <label for="">Item Rate</label>
                            <input type="text" name="item_rate" id="item_rate" class="form-control" placeholder="" />
                        </div>
                        <div class="form-outline">
                            <label for="" class="textarea-lable">Description</label>
                            <textarea name="item_desc" class="form-control" id="item_desc" cols="10"
                                rows="2"></textarea>
                                <a href="item_list.php" type="button" class="btn btn-info" style="width:100px; margin-left: 40%;">Clear</a>
                                <button name="submit" class="btn btn-primary submit-btn" style="width:100px; margin-left: 0%;" onclick="FormValidation(event)">submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
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
function confirmDelete(id) {
    var result = confirm("Are you sure you want to delete this ID: " + id + "?");
    if (result) {
        window.location.href = "item_creation_delete_id.php?id=" + id;
    }
}
function FormValidation(event){
    var type =  $("#item_type").val();
    var rate =  $("#item_rate").val();
    var code =  $("#item_code").val();
    var desc =  $("#item_desc").val();
    if(type === ""){
        alert('Item type is required');
        event.preventDefault();
    }
    else if(rate === ""){
        alert('Item rate is required');
        event.preventDefault();
    }
    else if(code === ""){
        alert('Item code is required');
        event.preventDefault();
    }
    // else if(desc === ""){
    //     alert('Description is required');
    //     event.preventDefault();
    // }
    else{
        alert('Item is created successfully')
    }
}
</script>


</body>

</html>