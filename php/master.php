<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - Master</title>
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
    .popup{
        text-align: center
    }
    .popup img{
        cursor: pointer;
    }
    .showon{
        z-index: 999;
        display: none;
    }
    .showon .overlay{
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,.66);
        position: absolute;
        top: 0;
        left: 0;
    }
    .showon .img-show{
        width: 600px;
        height: 400px;
        background: #FFF;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
        overflow: hidden;
    }
    .img-show span{
      position: absolute;
        right: 10px;
        z-index: 99;
        cursor: pointer;
      font-size: 18px;
      font-weight: 700;
      background:#fff;
      width:20px;
      text-align:center;
      border-radius:5px;
    }
.close {
  top: 10px;
}
.plus {
  top: 35px;
}
.minus {
  top: 60px;
}
.reset {
  top: 85px;
}
    .img-show img{
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
    }
    /*End style*/
.center {
  text-align:center;
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
    ?>


    <?php include 'html/nav-bar.html'; ?>
  <div class="container-fulid p-5">
    <center>
      <a href="customer_creation.php"><button class="btn btn-success" style="float:right">Add</button></a>
      <h3>CUSTOMER CREATION</h3>
    </center>
    <?php
    include 'master_list_link.php';
    ?>
    <div class="showon">
    <div class="overlay"></div>
    <div class="img-show">
        <span class="close" title="Close">x</span>
      <span class="plus" title="ZoomIn" >+</span>
      <span class="minus" title="ZoomOut" >−</span>
      <span class="reset" title="Reset" >⟲</span>
        <img src="">
    </div>
</div>
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
  <script src="https://code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
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
  <script>


    function confirmDelete(id) {
            var result = confirm("Are you sure you want to delete this ID: " + id + "?");
            if (result) {
                window.location.href = "customer_creation_delete_id.php?id=" + id;
            }
        }

        
     $(document).ready(function () {
      var table = $('#example').DataTable({
        select: true,
        lengthChange: true,
        lengthMenu: [
        [10, 25, 50, -1],
        [10, 25, 50, 'All']
        ],
        processing: true,
        search: {
        return: true
        },
        buttons: ['colvis'],
        initComplete: function () {
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
      table.on('click', 'tbody tr', (e) => {
    let classList = e.currentTarget.classList;
 
    if (classList.contains('selected')) {
        classList.remove('selected');
    }
    else {
        table.rows('.selected').nodes().each((row) => row.classList.remove('selected'));
        classList.add('selected');
    }
});
 
document.querySelector('#button').addEventListener('click', function () {
    table.row('.selected').remove().draw(false);
});
      table.rows('.important').select();
      table.buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');
    });


    $(function () {
        $(".popup img").click(function () {
            let $src = $(this).attr("src");
            $(".showon").fadeIn();
            $(".img-show img").attr("src", $src);
        });

        $("span.close").click(function () {
            $(".showon").fadeOut();
          $('.img-show img').css({'width': '100%', 'height': '100%'});
        });
        
  $('.plus').on('click', function(){
    let img_widht = $('.img-show img').width()
    let new_widht = img_widht+100;
    $('.img-show img').width(new_widht);
    $('.img-show img').height('auto')
  })
  
  $('.minus').on('click', function(){
    let img_widht = $('.img-show img').width()
    let new_widht = img_widht-100;
    if(new_widht < 500) {
      new_widht = 500;
    }
    $('.img-show img').width(new_widht);
    $('.img-show img').height('auto')
  })
  
  $('.reset').on('click', function(){ 
    $('.img-show img').css({'width': '100%', 'height': '100%', 'top': '0', 'left': '0'});
  });

  
  // let ovrflow_width
  $(".img-show img").draggable({
    
    scroll: true,
        stop: function(){},  
        drag : function(e,ui){         
          
          let popup_img_width = $('.img-show img').width();
          let popup_width = $('.img-show').width();
          let new_img_width = popup_width - popup_img_width;
          
          let popup_img_height = $('.img-show img').height();
          let popup_height = $('.img-show').height();
          let new_img_height = popup_height - popup_img_height;
          
            if(ui.position.left > 0) {
              ui.position.left = 0;
            }
          if(ui.position.left < new_img_width) {
              ui.position.left = new_img_width;
            }
          
          if(ui.position.top > 0) {
              ui.position.top = 0;
            }
          if(ui.position.top < new_img_height) {
              ui.position.top = new_img_height;
            }
        }
  });
  
    });
  </script>


</body>

</html>