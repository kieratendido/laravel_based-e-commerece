<!DOCTYPE html>
<html lang="en">
<head>
      <!-- Basic -->
      <base href="/public">
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />

      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
</head>

<style>
.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 15px;
  display: flex;
}
.left-column {
  width: 30%;
  position: relative;

}
 
.right-column {
  width: 50%;
  margin-left: 15%;
  margin-top: 60px;
}
.left-column img {
   width: 100%;
   height: auto;
   margin-top: 50px;
}
 
.left-column img.active {
  opacity: 1;
}
.product-description {
  border-bottom: 1px solid #E1E8EE;
  margin-bottom: 20px;
}
.product-description span {
  font-size: 12px;
  color: #358ED7;
  letter-spacing: 1px;
  text-transform: uppercase;
  text-decoration: none;
}
.product-description h1 {
  font-weight: 300;
  font-size: 52px;
  color: #43484D;
  letter-spacing: -2px;
}
.product-description p {
  font-size: 16px;
  font-weight: 300;
  color: #86939E;
  line-height: 24px;
}
.product-color {
  margin-bottom: 30px;
}
 
.product-price {
  display: flex;
  align-items: center;
}
 
.product-price span {
  font-size: 26px;
  font-weight: 300;
  color: #43474D;
  margin-right: 20px;
}
 
.cart-btn {
  display: inline-block;
  background-color: #7DC855;
  border-radius: 6px;
  font-size: 16px;
  color: #FFFFFF;
  text-decoration: none;
  padding: 12px 30px;
  transition: all .5s;
}
.cart-btn:hover {
  background-color: #64af3d;
}

</style>


<body>

      <div class="hero_area">
      @include('home.header')


      <main class="container">
         <!-- Left Column / Headphones Image -->
         <div class="left-column">
           <img data-image="red" class="active" src="{{ substr($product->image, 0, 7) == 'images/' ? '/storage/' . $product->image : $product->image }}" alt="">
         </div>
        
        
         <!-- Right Column -->
         <div class="right-column">
        
           <!-- Product Description -->
           <div class="product-description">
             <span>{{$product->category}}</span>
             <h1>{{$product->title}}</h1>
             <p>{{$product->description}}</p>
           </div>
        
           <!-- Product Configuration -->
           <div class="product-configuration">
        
            
           </div>
        
           <!-- Product Pricing -->
           <div class="product-price">
             <span>148$</span>
             <a href="#" class="cart-btn">Add to cart</a>
           </div>
         </div>
       </main>
      </div>

    @include('home.footer')

    <script src="home/js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="home/js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="home/js/bootstrap.js"></script>
    <!-- custom js -->
    <script src="home/js/custom.js"></script>
</body>


</html>