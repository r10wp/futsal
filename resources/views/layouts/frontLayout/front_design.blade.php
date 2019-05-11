<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

     <!-- Site Metas -->
    <title>Gawang Website</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('asset_frontend/css/bootstrap.min.css') }}">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{ asset('asset_frontend/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('asset_frontend/css/responsive.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('asset_frontend/css/custom.css') }}">

    <!-- Modernizer for Portfolio -->
    <script src="js/modernizer.js"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

    <style>
      input[type='checkbox']:after{
          line-height: 1.5em;
          content: '';
          display: inline-block;
          width: 18px;
          height: 18px;
          margin-top: -4px;
          margin-left: -4px;
          border: 1px solid rgb(192,192,192);
          border-radius: 0.25em;
          background: rgb(224,224,224);
      }

      input[type='checkbox']:checked:after {
          width: 22px;
          height: 22px;
          transform: rotate(45deg);
          border: 7px solid #17a2b8;
          border-radius: 20px;
      }

      input[type='checkbox']:disabled:after {
          width: 25px;
          height: 25px;
          transform: rotate(45deg);
          border: 8px solid green;
      }
    </style>
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php
      use Carbon\Carbon;
      $current = Carbon::now();
    ?>
</head>
<body>
    <!-- LOADER -->
    <div id="preloader">
      <div class="loader">
        <div class="loader__bar"></div>
        <div class="loader__bar"></div>
        <div class="loader__bar"></div>
        <div class="loader__bar"></div>
        <div class="loader__bar"></div>
        <div class="loader__ball"></div>
      </div>
    </div><!-- end loader -->

    @include('layouts.frontLayout.front_header')

    @yield('content')

    @include('layouts.frontLayout.front_footer')

    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

    <!-- ALL JS FILES -->
    <script src="{{ asset('asset_frontend/js/all.js') }}"></script>
    <!-- ALL PLUGINS -->
    <script src="{{ asset('asset_frontend/js/custom.js') }}"></script>
    <script src="{{ asset('asset_frontend/js/portfolio.js') }}"></script>
    <script src="{{ asset('asset_frontend/js/hoverdir.js') }}"></script>

    <script src="{{ asset('asset_backend/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('asset_backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

    <script>
      $(document).ready(function() {
        // Setup - add a text input to each footer cell
        $('#table-search thead tr').clone(true).appendTo( '#table-search thead' );
        $('#table-search thead tr:eq(1) th').each( function (i) {
            var title = $(this).text();
            $(this).html( '<input type="text" placeholder="Search '+title+'" />' );

            $( 'input', this ).on( 'keyup change', function () {
                if ( table.column(i).search() !== this.value ) {
                    table
                        .column(i)
                        .search( this.value )
                        .draw();
                }
            } );
        } );

        var table = $('#table-search').DataTable( {
            orderCellsTop: true,
            fixedHeader: true
        });
      });

      $(document).ready(function() {
        // Setup - add a text input to each footer cell
        $('#table-search-foot tfoot tr').clone(true).appendTo( '#table-search-foot tfoot' );
        $('#table-search-foot tfoot tr:eq(1) th').each( function (i) {
            var title = $(this).text();
            $(this).html( '<input type="text" placeholder="Search '+title+'" />' );

            $( 'input', this ).on( 'keyup change', function () {
                if ( table.column(i).search() !== this.value ) {
                    table
                        .column(i)
                        .search( this.value )
                        .draw();
                }
            } );
        } );

        var table = $('#table-search-foot').DataTable( {
            orderCellsTop: true,
            fixedHeader: true
        });
      });
      $(document).ready(function() {
        $('#table-original').DataTable({
          columnDefs: [ {
           targets: [ 0 ],
           orderData: [ 0, 1 ],
           visible: false,
           targets: 0,
         },]
        });
      });

    </script>

    <script type="text/javascript">
      window.setTimeout(function() {
          $(".alert").fadeTo(500, 0).slideUp(500, function(){
              $(this).remove();
          });
      }, 4000);

    </script>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

    <script type="text/javascript">
       function theFunction (id) {
        var id = id;
        Swal.fire({
          title: 'Are you sure?',
          text: "Apakah anda yakin akan menghapus item ini?",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Lanjutkan, hapus'
          }).then((result) => {
          if (result.value) {
            Swal.fire(
              'Deleted!',
              'Your file has been deleted.',
              'success'
            )

            window.location = "/delItem/"+id;
          }
        })
      }
    </script>
</body>
</html>
