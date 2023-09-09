@props(['categories','product'])
<div class="card">
    <div class="card-body">

      <!-- Multi Columns Form -->
      <form class="row g-3" method="POST" action="{{route('products.update',$product->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-md-12">
          <label for="inputName5" class="form-label">Name</label>
          <input type="text" class="form-control" id="inputName5" name="name" value="{{old('name',$product->name)}}" required>
        </div>
        <div class="col-md-6">
          <label for="inputEmail5" class="form-label">libillé</label>
          <input type="text" class="form-control" id="inputEmail5" name="liblillé" value="{{old('name',$product->liblillé)}}" required>
        </div>
        <div class="col-md-6">
          <label for="inputPassword5" class="form-label">Category</label>
          <select class="form-select" aria-label="Default select example" name="category_id">
              @foreach ($categories  as $item)
              <option value="{{$item->id}}">{{$item->name}}</option>
              @endforeach
            </select>
        </div>
        <div class="col-md-6">
          <label for="inputPassword5" class="form-label">description</label>
          <input type="text" class="form-control" id="inputPassword5" name="description" value="{{old('name',$product->description)}}"  required>
        </div>
        <div class="col-12">
          <label for="inputAddress5" class="form-label">price</label>
          <input type="number" class="form-control" id="inputAddres5s" placeholder="1234DH" name="price" value="{{old('name',$product->price)}}"  required>
        </div>
        <div class="col-12">
          <label for="inputAddress2" class="form-label">image</label>
          <input type="file" class="form-control" id="inputAddress2" name="image"  >
        </div>
      
   
       
    
        <div class="text-center">
          <button type="submit" class="btn btn-primary" >Update</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form><!-- End Multi Columns Form -->
    </div>
</div>

</div>