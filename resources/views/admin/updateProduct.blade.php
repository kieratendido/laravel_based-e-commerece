<!DOCTYPE html>
<html lang="en">
  <head>

    <base href="/public">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="admin/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css">>
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <link rel="shortcut icon" href="admin/assets/images/favicon.png" />

    <style>
        .div_center{
            text-align: center;
            padding-top: 40px;
        }
        .font_size{
            font-size: 40px;
            padding-bottom: 40px;
        }
        .text_color{
            color: black;
            padding-bottom: 40px;
        }
        label{
            display: inline-block;
            width: 200px;
        }
        .div_design{
            padding-bottom: 15px;
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

            <div class='div_center'>
                <h1 class="font_size">Update Product</h1>

              <form action="{{route('updateProductConfirm',$product->id)}}" method="POST" enctype="multipart/form-data">

                @csrf
                <div class="div_design">
                    <label for="">Product Title</label>
                    <input class ='text_color' type="text" name='title' placeholder="Title" required="" value="{{$product->title}}">
                </div>
                <div class="div_design">
                    <label for="">Product Description</label>
                    <input class ='text_color' type="text" name='description' placeholder="Description" required="" value="{{$product->description}}">
                </div>
                <div class="div_design">
                    <label for="">Product Price</label>
                    <input class ='text_color' type="number" name='price' placeholder="Title" required="" value="{{$product->price}}">
                </div>
                <div class="div_design">
                    <label for="">Discount Price</label>
                    <input class ='text_color' type="number" name='discount_price' placeholder="Title" value="{{$product->discount_price}}">
                </div>
                <div class="div_design">
                    <label for="">Product Quantity</label>
                    <input class ='text_color' type="number" min="0" name='quantity' placeholder="Quantity" required="" value="{{$product->quantity}}">
                </div>
                <div class="div_design">
                    <label for="">Product Category</label>
                    <select class ='text_color' name="category" required="" >
                        <option value="{{$product->category}}" selected= "">{{$product->category}}</option>

                        @foreach($category as $cat)

                        <option value="{{$cat->categoryName}}">{{$cat->categoryName}}</option>

                        @endforeach
                    </select>   

                </div>

                <div class="div_design">
                    <label for="">Current Product Image</label>
                    <img style="margin:auto;" height="100" width="100" src="{{ substr($product->image, 0, 7) == 'images/' ? '/storage/' . $product->image : $product->image }}" alt="">
                </div>


                <div class="div_design">
                    <label for="">Change Product Image</label>
                    <input type="file" name="image" >
                </div>

                <div class="div_design">
                    <input type="submit" value="Update Product" class="btn btn-primary">
                </div>

              </form>

            </div>
    

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