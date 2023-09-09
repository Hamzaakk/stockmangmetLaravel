<div class="card">
    <div class="card-body">
      <h5 class="card-title">Add New Product</h5>

      <!-- Multi Columns Form -->
      <form class="row g-3" method="POST" action="{{route('products.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="col-md-12">
          <label for="inputName5" class="form-label">Name</label>
          <input type="text" class="form-control" id="inputName5" name="name" required>
        </div>
        <div class="col-md-6">
          <label for="inputEmail5" class="form-label">libillé</label>
          <input type="text" class="form-control" id="inputEmail5" name="liblillé"  required>
        </div>
        <div class="col-md-6">
          <label for="inputPassword5" class="form-label">description</label>
          <input type="text" class="form-control" id="inputPassword5" name="description"  required>
        </div>
        <div class="col-md-6">
            <label for="inputPassword5" class="form-label">Category</label>
            <select class="form-select" aria-label="Default select example" name="category_id">
                @foreach ($category as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
              </select>
          </div>
        <div class="col-12">
          <label for="inputAddress5" class="form-label">price</label>
          <input type="number" class="form-control" id="inputAddres5s" placeholder="1234DH" name="price"  required>
        </div>
        <div class="col-12">
          <label for="inputAddress2" class="form-label">image</label>
          <input type="file" class="form-control" id="inputAddress2" name="image"  required>
        </div>
        <div class="col-md-">
          <label for="inputCity" class="form-label">Date</label>
          <input type="date" class="form-control" id="inputCity" name="created_at"  required>
         
       
    
        <div class="text-center my-2">
          <button type="submit" class="btn btn-primary" >Submit</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form><!-- End Multi Columns Form -->
    </div>
</div>

</div>