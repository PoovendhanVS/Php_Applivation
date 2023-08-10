<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP - Account Lists</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    crossorigin="anonymous" />
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-components-web/4.0.0/material-components-web.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.material.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
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

  <?php include 'html/nav-bar.html'; ?>
  <div class="container-fluid mt-5">
    <center>
      <a href="sales_entry.php"><button class="btn btn-success" style="float:right">Add</button></a>
      <h3>SALES ENTRY LISTS</h3>
    </center>
    <p><button id="button">Row count</button></p>
    <?php
    include 'sales_list_link.php';
    ?>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>


    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js  "></script>
  <script src="https://cdn.datatables.net/1.13.6/js/dataTables.material.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.colVis.min.js"></script>
  <script>function confirmDelete(itemId) {
    var confirmResult = confirm("Are you sure you want to delete this invoice id?");
    if (confirmResult) {
        deleteItem(itemId);
    }
}

function deleteItem(id) {
    var ids = id;
    $.ajax({
        url: 'sales_entry_list_delete.php',
        type: 'POST',
        data: {
            'ids': ids,
        },
        dataType: 'json', // Expect JSON response
        success: function(response) {
            if (response.success) {
                alert('Invoice deleted successfully');
                window.location.href = 'sales_list.php';
            } else {
                alert('Deletion failed');
            }
        },
        error: function(error) {
            // Handle any errors that occur during the request
            alert('Error');
        }
    });
}


      $(document).ready(function () {
      var table = $('#example').DataTable({
        lengthChange: true,
        lengthMenu: [
        [10, 25, 50, -1],
        [10, 25, 50, 'All']
        ],  
        processing: true,
        select: true,
        search: {
        return: true
        },
        buttons: ['colvis'],
        initComplete: function () {
          // tata data can be click the data value to send the data from search box then appeare the required data
          // let api = this.api();
 
          //   api.on('click', 'tbody td', function () {
          //       api.search(this.innerHTML).draw();
          //   });
          this.api().columns().every(function () {
            
            let column = this;
            let title = column.footer().textContent;

            let input = document.createElement('input');
            input.placeholder = ' ' + title;
            column.footer().replaceChildren(input);

            input.addEventListener('keyup', () => {
              if (column.search() !== input.value) {
                column.search(input.value).draw();
              }
            });
          });
        }
      });
      table.on('click', 'tbody tr', function (e) {
    e.currentTarget.classList.toggle('selected');
});
 
document.querySelector('#button').addEventListener('click', function () {
    alert(table.rows('.selected').data().length + ' row(s) selected');
});
      table.buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');
    });
  </script>
</body>

</html>