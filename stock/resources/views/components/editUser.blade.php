@props(['profile','departements'])
<form enctype="multipart/form-data" method="POST" action="{{route('profile.editAction',$profile->id)}}">
  @csrf
  @method('PUT')
  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <input type="text" id="form6Example1" class="form-control" name="name" value="{{old('name',$profile->name)}}" />
        <label class="form-label" for="form6Example1"> name</label>
      </div>
    </div>
    <div class="col">
      <div class="form-outline">
        <input type="email" id="form6Example2" class="form-control" name="email" value="{{old('name',$profile->email)}}" />
        <label class="form-label" for="form6Example2">email</label>
      </div>
    </div>
  </div>

  <!-- Text input -->
  <div class="form-outline mb-4">
    <input type="number" id="form6Example3" class="form-control" name="phone" value="{{old('name',$profile->phone)}}"/>
    <label class="form-label" for="form6Example3">phone</label>
  </div>

  <!-- Text input -->
  <div class="form-outline mb-2">
    <input type="text" id="form6Example4" class="form-control" name="adresse"value="{{old('name',$profile->adresse)}}" />
    <label class="form-label" for="form6Example4">Address</label>
  </div>

  <!-- Email input -->
 

  <!-- Number input -->
  <label class="form-label" for="form6Example6">Image</label>
  <div class="form-outline mb-4">
    <input type="file" id="form6Example6" class="form-control" name="image" />
  </div>
          @php
             $departement = \App\Models\departement::find($profile->id);
          @endphp
          <label for="">Bereaux</label>
  <select class="form-select" aria-label="Default select example" name="departemen_id">
    @foreach ($departements as $item)
    <option selected value="{{$item->id}}">{{$item->name}}</option>
    @endforeach
  </select>
  <label for="">Role</label>
  <select class="form-select my-2" aria-label="Default select example" name="role">  
    {{-- @foreach ($departements as $item) --}}
    <option value="admin">admin</option>
    <option value="user">user</option>
    <option value="gestionnaire">gestionnaire de stock</option>
    <option value="gestionnairef">gestionnaire de fornnisseur</option>

    {{-- @endforeach --}}
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
  <button type="submit" class="btn btn-primary btn-block mb-4">edit</button>
</form>