
<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             Our <span>products</span>
          </h2>
       </div>
       <div class="row">

         @foreach($products as $product)

          <div class="col-sm-6 col-md-4 col-lg-4">
             <div class="box">
                <div class="option_container">
                   <div class="options">
                      <a href="{{route('productDetails', $product->id )}}"  class="option1">
                      Product Details
                      </a> 

                      <form action="{{route('addCart', $product->id)}}" method="post">

                        @csrf

                        <div class="row">

                           <div class="col-md-4">
                              <input type="number" name="quantity" value="1" min="1" style="width: 100px">

                           </div>

                           <div class="col-md-4">
                              <input type="submit" value="Add to Cart">

                           </div>

                           
                        </div>
                      </form>

                   </div>
                </div>
               <h4 style="text-align: center; font-weight: bold; text-decoration: underline;">
                  {{$product->title}}
               </h4> 
                <div class="img-box">
                  
                  <img class='img_size' src="{{ substr($product->image, 0, 7) == 'images/' ? '/storage/' . $product->image : $product->image }}" alt="">
                  
                </div>
                <div class="detail-box">

                   @if($product->discount_price != null)    
                   <h6 style="color: red">
                     Discount Price
                     <br>
                     ${{$product->discount_price}}
                   </h6>

                   <h6 style="text-decoration: line-through; color:blue">
                     Price
                     <br>
                     ${{$product->price}}
                  </h6>

                   @else
                   <h6 style="color: blue">
                     Price
                     <br>
                      ${{$product->price}}
                   </h6>

                   @endif

                </div>
             </div>
             
             
          </div>
         
         
      @endforeach

     <span style="padding-top: 20px">
      {!!$products->withQueryString()->links('pagination::bootstrap-5')!!}
     </span>
    </div>
 </section>

