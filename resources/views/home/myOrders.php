<!DOCTYPE html>
<html>
   <head>
      
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>My Orders</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.css')}}" />
      <!-- font awesome style -->
      <link href="{{asset('home/css/font-awesome.min.css')}}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{asset('home/css/style.css')}}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet" />

      
      <style>
        .center{
            margin: auto;
            padding: 30px;
            text-align: center;
            width: 70%;

        }
        /* table, th, tr, td{
          
            border: 1px solid black;
        } */
        .centerimg {
            display: block;
            margin-left: auto;
            margin-right: auto;
            
        }
      </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')

         <section class="inner_page_head">
            <div class="container_fuild">
               <div class="row">
                  <div class="col-md-12">
                     <div class="full">
                        <h3>My Orders</h3>
                     </div>
                  </div>
               </div>
            </div>
         </section>

         <br>

         <table class="center">
            <tr>
                {{-- <th>Image</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Payment Status</th>
                <th>Delivery Status</th>
                <th>Image</th>
                <th>Action</th> --}}
            </tr>
    
            @foreach ($orders as $order)
            <tr>
                <td><img class='img_size centerimg' height="100" width="100" style="" src="{{ substr($order->image, 0, 7) == 'images/' ? '/storage/' . $order->image : $order->image }}" alt=""></td>
                <td>{{$order->product_title}}</td>
                <td>{{$order->quantity}}</td>
                <td>₱{{number_format($order->price)}}</td>
                <td>{{$order->payment_status}}</td>
                <td>{{$order->delivery_status}}</td>
                <td> </td>
                <td>
                    @if($order->delivery_status == 'Processing')
                        <a class="btn btn-danger" onclick="return confirm('Are you sure you want to cancel this order')" href="{{route('cancelOrders', $order->id)}}">Cancel Order</a>

                    @elseif($order->delivery_status == 'Requesting to cancel the order')
                       

                    @elseif($order->delivery_status == 'To Ship')
                        <p class="btn btn-secondary">Received</p>

                    @else
                        <a class="btn btn-success" href="{{route('receivedOrders', $order->id)}}">Received</a>
                        
                    @endif
                </td>
            </tr>
            @endforeach
    
        </table>
        

      </div>
      <br>
      @include('home.footer')

      

      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>

   </body>
</html>