@props(['products','fornisseurs','lieux'])

<div class="card">
    <div class="card-body">
      <h5 class="card-title">Add New Entrées</h5>

      <!-- Multi Columns Form -->
      <form class="row g-3" method="POST" action="{{route('stockenier.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="col-md-6">
            <label for="inputPassword5" class="form-label">Product</label>
            <select class="form-select" aria-label="Default select example" name="product_id">
                @foreach ($products as $product)
                <option value="{{$product->id}}">{{$product->name}}</option>
                @endforeach
              </select>
          </div>
          <div class="col-md-6">
            <label for="inputPassword5" class="form-label">Forniseur</label>
            <select class="form-select" aria-label="Default select example" name="fornisseur_id">
                @foreach ($fornisseurs as $fornisseur)
                <option value="{{$fornisseur->id}}">{{$fornisseur->company}}</option>
                @endforeach
              </select>
          </div>
          <div class="col-12">
            <label for="inputPassword5" class="form-label">lieux de stockage</label>
            <select class="form-select" aria-label="Default select example" name="lieux_id">
                @foreach ($lieux as $lieux)
                <option value="{{$lieux->id}}">{{$lieux->name}}</option>
                @endforeach
              </select>
          </div>
          <div class="col-12">
            <label for="inputAddress5" class="form-label">quantité</label>
            <input type="number" class="form-control" id="inputAddres5s" placeholder="12" name="quantité"  required>
          </div>
        <div class="col-12">
          <label for="inputAddress5" class="form-label">price</label>
          <input type="number" class="form-control" id="inputAddres5s" placeholder="..DH" name="priceforOne"  required>
          <textarea hidden type="number" class="form-control" id="inputAddres5s" placeholder="..DH" name="total"  required>
          
          </textarea>
        </div>

        <div class="col-12">
            <label for="inputPassword5" class="form-label">status</label>
            <select class="form-select" aria-label="Default select example" name="status">
                <option value="En_stock">En stock</option>
                <option value="En_transit">En transit</option>
                <option value="Réservés">Réservés</option>
                <option value="En_attente_deréception">En attente de réception</option>
              </select>
          </div>
        <div class="col-md-">
          <label for="inputCity" class="form-label">Date Entrées</label>
          <input type="date" class="form-control" id="inputCity" name="created_at"  required>
          <div class="col-12">
            <label for="inputAddress5" class="form-label">description</label>
            <textarea  class="form-control" id="inputAddres5s"name="description" > </textarea>
          </div>
        <div class="text-center my-2">
          <button type="submit" class="btn btn-primary" >Submit</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form><!-- End Multi Columns Form -->
    </div>
</div>

</div>