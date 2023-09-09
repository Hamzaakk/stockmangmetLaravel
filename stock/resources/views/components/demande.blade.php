<div class="card">
    <div class="card-body">
      <h5 class="card-title">Add New Demande</h5>

      <!-- Multi Columns Form -->
      <form class="row g-3" method="POST" action="{{route('demandes.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="col-md-12">
            <label for="inputPassword5" class="form-label">Category</label>
            <select class="form-select" aria-label="Default select example" name="product_id">
                @foreach ($products as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
              </select>
          </div>
        <div class="col-12">
          <label for="inputAddress5" class="form-label">Quantity</label>
          <input type="number" class="form-control" id="inputAddres5s" placeholder="1234DH" name="quantité"  required>
        </div>
        <input type="number" class="form-control" id="inputAddres5s" name="profile_id"  value="{{Auth::id()}}" hidden>

        <div class="col-12">
            <label for="inputAddress5" class="form-label">Déscription</label>
            <textarea class="form-control" id="inputAddres5s"  name="description" > </textarea>
    
        <div class="text-center my-2">
          <button type="submit" class="btn btn-primary" >Submit</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form><!-- End Multi Columns Form -->
    </div>
</div>

</div>