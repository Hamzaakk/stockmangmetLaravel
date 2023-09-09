<x-master >
    @section('title')
      Stock |Create Fornisseur
    @endsection
<x-alert type='primary'>
    add Fornisseurs
  </x-alert>
  @include('partials.flashback')
   
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Fornisseur Registration</h5>
  
      <!-- Multi Columns Form -->
      <form class="row g-3" method="POST" action="{{route('fornisseurs.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="col-md-6">
          <label for="inputName" class="form-label">Name</label>
          <input type="text" class="form-control" id="inputName" name="name" required value="{{old('name')}}">
        </div>
       
        <div class="col-md-6">
          <label for="inputEmail" class="form-label">Email</label>
          <input type="email" class="form-control" id="inputEmail" name="email" required value="{{old('email')}}">
        </div>
       
        <div class="col-md-6">
          <label for="inputImage" class="form-label">Image</label>
          <input type="file" class="form-control" id="inputImage" name="image" accept="image/*">
        </div>
        <div class="col-md-6">
            <label for="inputPassword" class="form-label">company</label>
            <input type="text" class="form-control" id="inputPassword" name="company" required value="{{old('company')}}">
          </div>
        <div class="col-md-12">
          <label for="inputAddress" class="form-label">Address</label>
          <input type="text" class="form-control" id="inputAddress" name="adresse" value="{{old('adresse')}}">
        </div>
        
        <div class="col-md-6">
          <label for="inputPhone" class="form-label">Phone</label>
          <input type="number" class="form-control" id="inputPhone" name="phone" required value="{{old('phone')}}">
        </div>
        <div class="col-md-6">
          <label for="inputFix" class="form-label">Fix</label>
          <input type="number" class="form-control" id="inputFix" name="fix" value="{{old('fix')}}">
        </div>
  
        <div class="text-center my-2">
          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form><!-- End Multi Columns Form -->
    </div>
  </div>
  
  
</x-master>