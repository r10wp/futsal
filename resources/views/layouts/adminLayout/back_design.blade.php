<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('asset_backend/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('asset_backend/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('asset_backend/bower_components/Ionicons/css/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('asset_backend/dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('asset_backend/dist/css/skins/_all-skins.min.css') }}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{ asset('asset_backend/bower_components/morris.js/morris.css') }}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('asset_backend/bower_components/jvectormap/jquery-jvectormap.css') }}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ asset('asset_backend/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('asset_backend/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset('asset_backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">

    <link rel="stylesheet" href="{{ asset('asset_backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <div class="content-wrapper">
        @if ($message = Session::get('success'))
          <div class="alert alert-success alert-block">
          	<button type="button" class="close" data-dismiss="alert">×</button>
                  <strong>{{ $message }}</strong>
          </div>
        @endif

        @if ($message = Session::get('warning'))
          <div class="alert alert-warning alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                  <strong>{{ $message }}</strong>
          </div>
        @endif

        @if ($message = Session::get('error'))
          <div class="alert alert-danger alert-block">
          	<button type="button" class="close" data-dismiss="alert">×</button>
                  <strong>{{ $message }}</strong>
          </div>
        @endif
        @include('layouts.adminLayout.back_side')

        @yield('content')

      </div>
      @include('layouts.adminLayout.back_footer')
    </div>

    <!-- jQuery 3 -->
    <script src="{{ asset('asset_backend/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('asset_backend/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('asset_backend/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <!-- daterangepicker -->
    <script src="{{ asset('asset_backend/bower_components/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('asset_backend/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <!-- datepicker -->
    <script src="{{ asset('asset_backend/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ asset('asset_backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <!-- Slimscroll -->
    <script src="{{ asset('asset_backend/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('asset_backend/bower_components/fastclick/lib/fastclick.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('asset_backend/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('asset_backend/dist/js/pages/dashboard.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('asset_backend/dist/js/demo.js') }}"></script>

    <script src="{{ asset('asset_backend/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('asset_backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

    <script type="text/javascript">
      window.setTimeout(function() {
          $(".alert").fadeTo(500, 0).slideUp(500, function(){
              $(this).remove();
          });
      }, 4000);

    </script>

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
    </script>
    <script type="text/javascript">
    $(function () {
      $('#table-original').DataTable()
    })
    </script>
    <style media="screen">
      .swal2-popup {
        font-size: 1.6rem !important;
      }
    </style>
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

            window.location = "/deleteJadwalLapangan/"+id;
          }
        })
      }

      function delJadwal (id) {
       var id = id;
       Swal.fire({
         title: 'Are you sure?',
         text: "Apakah anda yakin akan menghapus jadwal ini?",
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

           window.location = "/deleteTgl/"+id;
         }
       })
     }

     function delLapangan (id) {
      var id = id;
      Swal.fire({
        title: 'Are you sure?',
        text: "Apakah anda yakin akan menghapus lapangan ini?",
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

          window.location = "/deleteLapangan/"+id;
        }
      })
    }

    function delBlog (id) {
     var id = id;
     Swal.fire({
       title: 'Are you sure?',
       text: "Apakah anda yakin akan menghapus lapangan ini?",
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

         window.location = "/deleteBlog/"+id;
       }
     })
   }

   function delAdmin (id) {
    var id = id;
    Swal.fire({
      title: 'Are you sure?',
      text: "Apakah anda yakin akan menghapus lapangan ini?",
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

        window.location = "/deleteAdmin/"+id;
      }
    })
  }

    </script>



    <script type="text/javascript">
      $('#my_modal').on('show.bs.modal', function(e) {

        var set1 = $(e.relatedTarget).data('set1');
        $(e.currentTarget).find('input[name="jadwal_id"]').val(set1);

        var set2 = $(e.relatedTarget).data('set2');
        $(e.currentTarget).find('input[name="waktu_mulai_id"]').val(set2);

        var set3 = $(e.relatedTarget).data('set3');
        $(e.currentTarget).find('input[name="waktu_habis_id"]').val(set3);

        var set4 = $(e.relatedTarget).data('set4');
        $(e.currentTarget).find('input[name="harga_id"]').val(set4);

        var set5 = $(e.relatedTarget).data('set5');
        $(e.currentTarget).find('input[name="kat"]').val(set5);

        var set6 = $(e.relatedTarget).data('set6');
        $(e.currentTarget).find('input[name="oldkat"]').val(set6);

        var set7 = $(e.relatedTarget).data('set7');
        $(e.currentTarget).find('input[name="oldharga_id"]').val(set7);
      });
    </script>

    <script type="text/javascript">
      $("#binding").on('keyup keypress change mouseup', function(event) {
        var data=$(this).val();
        var x = parseInt(data)+1;
        $(".binding").val(x);
      });
    </script>

    <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
    <script>
            CKEDITOR.replace( 'editor1' );
    </script>
  </body>
</html>
