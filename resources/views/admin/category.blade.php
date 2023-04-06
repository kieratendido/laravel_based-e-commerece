<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Category</title>
    <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="admin/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <link rel="shortcut icon" href="admin/assets/images/favicon.png" />
   
    
    <style type="text/css">
      .div_center{
        text-align: center;
        padding-top: 40px;
      }
      .h2_font{
        font-size: 40px;
        padding-bottom: 40px;
      }
      .input_color{
        color: black;
      }
      .center{
        margin: auto;
        width: 50%;
        text-align:center;
        margin-top: 30px;
        border: 3px solid whitesmoke;
      }
      tr td{
        border: 3px solid whitesmoke;
      }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.header')

        <div class="main-panel">
            <div class="content-wrapper">

              @if(session()->has('message'))
              <div class="alert alert-success">
                {{-- displaying a notification --}}
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{session()->get('message')}}
              </div>
              @endif

              <div class="div_center">
                <h2 class="h2_font">Add Category</h2>
                <form action="{{route('addCategory')}}" method="POST">
                  @method('post')
                  @csrf
                  <input type="text" name="category" class="input_color" placeholder="Write Category Name">
                  <input type="submit" class="btn btn-primary" name="submit" value="Add Category ">
                </form>
              </div>

              <table class="center">
                <tr>
                  <td>Category Name</td>
                  <td>Action</td>

                  @foreach($data as $datas)
                  <tr>
                    <td>{{$datas->categoryName}}</td>
                    <td>
                      <a onclick="return confirm('Are you sure you want to delete this category?')" class ="btn btn-danger "href="{{route('deleteCategory', $datas->id)}}">Delete</a>
                    </td>
                  </tr>
                  @endforeach

                </tr>
              </table>
              
            </div>
        </div>

      </div>
    </div>

    <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="admin/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="admin/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="admin/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>admin/
    <script src="admin/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <script src="admin/assets/js/off-canvas.js"></script>
    <script src="admin/assets/js/hoverable-collapse.js"></script>
    <script src="admin/assets/js/misc.js"></script>
    <script src="admin/assets/js/settadmin/ings.js"></script>
    <script src="admin/assets/js/todolist.js"></script>
    <script src="admin/assets/js/dashboard.js"></script>
 
  </body>
</html>