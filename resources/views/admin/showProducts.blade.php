<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="admin/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <link rel="shortcut icon" href="admin/assets/images/favicon.png" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
 
    
    <style>
        .center{
            margin: auto;
            width: 50%;
            border: 3px solid whitesmoke;
            text-align: center;
            margin-top: 40px;
        }
        .font_size{
            text-align: center;
            font-size: 40px;
            padding-top: 20px;
        }
        .img_size{
            width: 150px;
            height: 150px;
        
        }
        tr, th, td{
          border: solid 1px white;
            padding: 5px;
            text-align: center
        }

        .th_color{
           background-color:grey;
        }   
    </style>
  </head>
  <body>
    <div class="container-scroller">
  
      @include('admin.sidebar')
  
      <div class="container-fluid page-body-wrapper">
     
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

            <h2 class="font_size">All Products</h2>

            <table id="table_id" class="display">
              <thead>
                <tr class="th_color">
                    <th>Product Title</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Discount Price</th>
                    <th>Product Image</th>
                    <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($products as $product)
                  <tr>
                      <td>{{$product->title}}</td>
                      <td>{{$product->description}}</td>
                      <td>{{$product->quantity}}</td>
                      <td>{{$product->category}}</td>
                      <td>{{$product->price}}</td>
                      <td>{{$product->discount_price}}</td>
                      <td>
                        <img class='img_size' src="{{ substr($product->image, 0, 7) == 'images/' ? '/storage/' . $product->image : $product->image }}" alt="">
                      </td>
                      <td><a class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Delete</a>
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Warning</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                Do you want to delete this item?
                              </div>
                              <div class="modal-footer">
                                <a class="btn btn-danger" data-dismiss="modal">Close</a>
                                <a class="btn btn-success" href="{{route('deleteProduct', $product->id)}}">Save Changes</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      <a class="btn btn-success" href="{{route('editProduct', $product->id)}}">Edit</a>
                    </td>
                  </tr>
                @endforeach
     
            </table>

        </div>

     </div>
   
    </div> 
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
    <script src="admin/assets/js/hoverable-collapse.js"></script>
    <script src="admin/assets/js/misc.js"></script>
    <script src="admin/assets/js/settadmin/ings.js"></script>
    <script src="admin/assets/js/todolist.js"></script>
    <script src="admin/assets/js/dashboard.js"></script>

    <script>
      $(document).ready(function () {
         $('#table_id').DataTable();
      });
    </script>

  </body>
</html>