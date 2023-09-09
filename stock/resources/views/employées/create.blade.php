<x-master>
    <x-alert type='success'>
       Add new Employées
    </x-alert>




    <form enctype="multipart/form-data" method="POST" action="{{route('employes.store')}}">
        @csrf
        @method('POST')
        <div class="row mb-4">
          <div class="col">
            <div class="form-outline">
              <input type="text" id="form6Example1" required class="form-control" name="name" value="{{old('name')}}" />
              <label class="form-label" for="form6Example1"> name</label>
            </div>
          </div>
          {{-- <div class="col">
            <div class="form-outline">
              <input type="email" id="form6Example2" class="form-control" name="email" value="{{old('email')}}" />
              <label class="form-label" for="form6Example2">email</label>
            </div>
          </div> --}}
        </div>
      
        <!-- Text input -->
        <div class="form-outline mb-4">
          <input type="number" id="form6Example3" class="form-control" required name="phone" value="{{old('phone')}}" />
          <label class="form-label" for="form6Example3">phone</label>
        </div>
       
    
        <!-- Text input -->
        <div class="form-outline mb-2 my-2">
          <input type="text" id="form6Example4" required class="form-control" name="adresse" value="{{old('adresse')}}" />
          <label class="form-label" for="form6Example4">Address</label>
        </div>
      
        <!-- Email input -->
       
      
        <!-- Number input -->
        <label class="form-label" for="form6Example6">Image</label>
        <div class="form-outline mb-4">
          <input type="file" id="form6Example6" class="form-control" name="image" />
        </div>
      <label for="">Service</label>
        <select class="form-select" aria-label="Default select example" name="service_id" required>
          
            @foreach ($services as $item)
            <option  selected value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
          </select>

      
       
      
        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-sm my-3 float-end btn-rounded mb-4">ADD</button>
      </form>


    
</x-master>