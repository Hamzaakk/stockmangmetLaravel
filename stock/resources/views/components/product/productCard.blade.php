@props(['product','category'])
  <div class="card" style="width: 18rem;">
    <img  src="{{asset('storage/'.$product->image)}}" class="card-img-top" alt="Sunset Over the Sea"/>
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
      <div class="price text-success"><h6 class="mt-4">{{$product->price}}DH</h6></div>
      <form action="{{route('products.destroy',$product->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm btn-rounded float-end" onclick="return confirm('danger we have demandes enregiser by this product_id whene you delete this product all demandes can deleted')">delete</button>
      </form>
      <form action="{{route('products.edit',$product->id)}}" method="GET">
        <button type="submit" class="btn btn-primary btn-sm me-2 btn-rounded float-end">edit</button>
      </form>
    </div>
  </div>
