<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Employee Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> 
</head>
<style>
    * {
        margin: 0;
        padding: 0;
    }

    .header-cool {
        background-image: linear-gradient(to bottom, #3aafbb, #42b3c6, #4cb7d0, #58bbda, #65bfe3, #67c5e9, #6acbf0, #6cd1f6, #65dafa, #5fe3fc, #5decfc, #5ff5fb);
    }

    .view-title {
        color: #003c74;
        padding: 15px;
        font-family: 'arial';
        text-align: center;
        text-transform: uppercase;
        letter-spacing: 0.25rem;
        text-decoration: underline;
    }

    .main-form {
        padding: 20px;
        max-width: 100vw;
        min-height: 400px;
        border-radius: 5px;
    }

    .table_list {
        margin-top: 10px;
        width: 100%;
        border-bottom: 1px solid #333;
    }

    body {
        color: #1a202c;
        text-align: left;
        background-color: #e9ecef;
    }

    .main-body {
        padding: 15px;
    }

    .card {
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid rgba(0, 0, 0, .125);
        border-radius: .25rem;
    }

    .card-body {
        flex: 1 1 auto;
        min-height: 1px;
        padding: 1rem;
    }

    .gutters-sm {
        margin-right: -8px;
        margin-left: -8px;
    }

    .gutters-sm>.col,
    .gutters-sm>[class*=col-] {
        padding-right: 8px;
        padding-left: 8px;
    }

    .mb-3,
    .my-3 {
        margin-bottom: 1rem !important;
    }

    .bg-gray-300 {
        background-color: #e2e8f0;
    }

    .h-100 {
        height: 100% !important;
    }

    .shadow-none {
        box-shadow: none !important;
    }

    .back-btn {
        float: left;
    }

    a{
    text-decoration: none;
}

nav{
    background-color: #5E7BC2;
    color: #fff;
}

.navbar-brand{
    color: #fff;
}
.navbar-brand:hover{
    color: #E6F4F1;
    text-decoration: underline;
}

.nav-link{
    color: #fff;
}

.nav-link:hover{
    color: #00AAE4;
}

.span-tl:hover{
    color: #00AAE4;
}
tfoot input {
    width: 100%;
    padding: 3px;
    box-sizing: border-box;
}

.button-look-edit:hover{
    color: #fff;
    width: auto;
    opacity: 0.7;
}

.button-look-del:hover{
    color: #fff;
    width: auto;
    opacity: 0.7;
}
    
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

$addressComponents = array(
    $row['Building_Number'],
    $row['Street'],
    $row['Area'],
    $row['City'],
    $row['State'],
    $row['Country'],
    $row['Pincode']
);

// Filter out empty components
$addressComponents = array_filter($addressComponents);

// Join the address components with a comma separator
$address = implode(', ', $addressComponents);


?>

    <?php include 'html/nav-bar.html'; ?>
    <div class="sub-title">
        <h3 class="view-title">Overview Of Customer Details</h3>
    </div>

    <div class="container">
        <div class="main-body">
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="<?php echo $folder ?>" alt="Emp_Photo" class="rounded-circle" width="150"
                                    height="150">
                                <div class="mt-3">
                                    <h4><?php echo $name ?></h4>
                                    <p class="text-secondary mb-1"><?php echo $name ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">Date Of Join</h6>
                                <span class="text-secondary"><?php echo $doj ?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">Foundation</h6>
                                <span class="text-secondary"><?php echo $foundation ?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">Union</h6>
                                <span class="text-secondary"><?php echo $union ?></span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                <?php echo $name ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Gender</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                <?php echo $gender ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $address; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row gutters-sm">
                        <div class="col-sm-6 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="card mt-3">
                                        <ul class="list-group list-group-flush">
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                <h6 class="mb-0">Company Name</h6>
                                                <span class="text-secondary"><?php echo $company_name ?></span>
                                            </li>
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                <h6 class="mb-0">GST No.</h6>
                                                <span class="text-secondary"><?php echo $gst ?></span>
                                            </li>
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                <h6 class="mb-0">category</h6>
                                                <span class="text-secondary"><?php echo $category ?></span>
                                            </li>
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                <h6 class="mb-0">Unique ID</h6>
                                                <span class="text-secondary"><?php echo $unique ?></span>
                                            </li>
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                <h6 class="mb-0">Manager</h6>
                                                <span class="text-secondary"><?php echo $manager ?></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="card mt-3">
                                        <ul class="list-group list-group-flush">
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                <h6 class="mb-0">License</h6>
                                                <span class="text-secondary">None</span>
                                            </li>
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                <h6 class="mb-0">Certificates</h6>
                                                <span class="text-secondary">None</span>
                                            </li>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>

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
</body>

</html>