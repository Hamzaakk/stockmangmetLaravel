@props(['profile','products','demandes'])

<x-master title="index" >
   @section('title')
  STOCK|DEMANDES
   @endsection

<x-alert type="primary">
   Add To Panier
</x-alert>
<div>
<a href="{{route('panier')}}" class="btn  btn-warning float-end btn-sm btn-rounded"><i class="fas fa-cart-arrow-down"></i></a>
</div>
  <button  type="button" data-mdb-toggle="modal" data-mdb-target="#exampleModal" class="btn  btn- float-end btn-sm btn-rounded"><i class="fas fa-cart-arrow-down"></i></button>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header ">
                <h5 class="modal-title " id="exampleModalLabel"></h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                   <x-demande :products="$products">
                  </x-demande>
            </div>
          </div>
          </div>
          </div>
        </div>
        
        <div class="d-flex flex-wrap my-2 container ps-5 pe-5">
          @foreach ($products as $product)
          <div class="card ms-3" style="width: 18rem;">
              <img src="{{asset('storage/'.$product->image)}}" class="card-img-top" alt="Sunset Over the Sea" />
              <div class="card-body">
                  <h4 class="card-title">{{$product->name}}</h4>
                  <h6 class="card-subtitle mb-2 text-muted">libillé: {{$product->liblillé}}</h6>
                  @php
                  $category = \App\Models\Category::find($product->category_id);
                  if($category)
                  {
                      $categoryName = $category->name;
                  }
                  @endphp
                  <h6 class="card-subtitle mb-2 text-muted">category: {{$category->name}}</h6>
                  <hr>
                  <p class="card-text">
                      {{$product->description}}
                  </p>
                  <div class="price text-success"><h6 class="mt-4"></div>
                  <form action="{{route('add-to-cart',$product->id)}}" method="GET">
                      <div class="btn btn-sm bg-danger-subtle" onclick="add({{$product->id}})">
                          <i class="fas fa-plus"></i>
                      </div>
                      <input type="number" name="quantity" id="inputt{{$product->id}}" class="inputt text-center" value="1">
                      <div class="btn btn-sm bg-light-subtle" onclick="subtract({{$product->id}})">
                          <i class="fas fa-minus"></i>
                      </div>
                      <button type="submit" class="btn btn-rounded btn-sm btn-primary float-end">
                          <i class="fas fa-cart-plus"></i>
                      </button>
                  </form>
              </div>
          </div>
          @endforeach
      </div>
      
      <script>
          function add(productId) {
              const input = document.getElementById('inputt' + productId);
              input.value++;
          }
      
          function subtract(productId) {
              const input = document.getElementById('inputt' + productId);
              if (input.value > 1) {
                  input.value--;
              }
          }
      </script>
      
 </div>
       
</x-master>




