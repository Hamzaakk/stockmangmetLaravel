@props(['profile','fornisseur'])

<x-master title="index" >
   @section('title')
  STOCK|Edit Fornisseur
   @endsection

<x-alert type="warning">
  EDIT Fornisseur  <span class="text-info"> {{$fornisseur->name}} </span>
</x-alert>

<div class="card">
    <div class="card-body">
      <h5 class="card-title">Fornisseur Registration</h5>
  
      <!-- Multi Columns Form -->
      <form class="row g-3" method="POST" action="{{route('fornisseurs.update',$fornisseur->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-md-6">
          <label for="inputName" class="form-label">Name</label>
          <input type="text" class="form-control" id="inputName" name="name" required value="{{old('name',$fornisseur->name)}}">
        </div>
       
        <div class="col-md-6">
          <label for="inputEmail" class="form-label">Email</label>
          <input type="email" class="form-control" id="inputEmail" name="email" required value="{{old('email',$fornisseur->email)}}">
        </div>
       
        <div class="col-md-6">
          <label for="inputImage" class="form-label">Image</label>
          <input type="file" class="form-control" id="inputImage" name="image" accept="image/*">
        </div>
        <div class="col-md-6">
            <label for="inputPassword" class="form-label">company</label>
            <input type="text" class="form-control" id="inputPassword" name="company" required value="{{old('company',$fornisseur->company)}}">
          </div>
        <div class="col-md-12">
          <label for="inputAddress" class="form-label">Address</label>
          <input type="text" class="form-control" id="inputAddress" name="adresse" value="{{old('adresse',$fornisseur->adresse)}}">
        </div>
        
        <div class="col-md-6">
          <label for="inputPhone" class="form-label">Phone</label>
          <input type="number" class="form-control" id="inputPhone" name="phone" required value="{{old('phone',$fornisseur->phone)}}">
        </div>
        <div class="col-md-6">
          <label for="inputFix" class="form-label">Fix</label>
          <input type="number" class="form-control" id="inputFix" name="fix" value="{{old('fix',$fornisseur->fix)}}">
        </div>
  
        <div class="text-center my-2">
          <button type="submit" class="btn btn-primary">edit</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form><!-- End Multi Columns Form -->
    </div>
  </div>


</x-master>