@props(['departements'])
<form enctype="multipart/form-data" method="POST" action="{{route('profile.store')}}">
    @csrf
    @method('POST')
    <div class="row mb-4">
      <div class="col">
        <div class="form-outline">
          <input type="text" id="form6Example1" class="form-control" name="name" value="{{old('name')}}" />
          <label class="form-label" for="form6Example1"> name</label>
        </div>
      </div>
      <div class="col">
        <div class="form-outline">
          <input type="email" id="form6Example2" class="form-control" name="email" value="{{old('email')}}" />
          <label class="form-label" for="form6Example2">email</label>
        </div>
      </div>
    </div>
  
    <!-- Text input -->
    <div class="form-outline mb-4">
      <input type="number" id="form6Example3" class="form-control" name="phone" value="{{old('phone')}}" />
      <label class="form-label" for="form6Example3">phone</label>
    </div>
    <select class="form-select" aria-label="Default select example" name="role">
      <option selected>Role</option>
    
      {{-- @foreach ($departements as $item) --}}
      <option value="admin">admin</option>
      <option value="user">user</option>
      <option value="gestionnaire">gestionnaire de stock</option>
      <option value="gestionnairef">gestionnaire de fornnisseur</option>

      {{-- @endforeach --}}
    </select>

    <!-- Text input -->
    <div class="form-outline mb-2 my-2">
      <input type="text" id="form6Example4" class="form-control" name="adresse" value="{{old('adresse')}}" />
      <label class="form-label" for="form6Example4">Address</label>
    </div>
  
    <!-- Email input -->
   
  
    <!-- Number input -->
    <label class="form-label" for="form6Example6">Image</label>
    <div class="form-outline mb-4">
      <input type="file" id="form6Example6" class="form-control" name="image" />
    </div>

    <select class="form-select" aria-label="Default select example" name="departemen_id">
        <option selected>Bereaux</option>
      
        @foreach ($departements as $item)
        <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
      </select>
  
    <div class="form-outline mb-4 my-2">
        <input type="password" id="form6Example3" class="form-control" name="password" />
        <label class="form-label" for="form6Example3">password</label>
      </div>

      <div class="form-outline mb-4 my-2">
        <input type="password" id="form6Example3" class="form-control" name="password_confirmation" />
        <label class="form-label" for="form6Example3">confimed password</label>
      </div>
    <!-- Message input -->
  
  
   
  
    <!-- Submit button -->
    <button type="submit" class="btn btn-primary btn-block mb-4">ADD</button>
  </form>