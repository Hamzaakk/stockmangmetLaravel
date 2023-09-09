@props(['profile','departement'])

<x-master title="index" >
   @section('title')
  STOCK|DEPARTEMENT 
   @endsection

<x-alert type="warning">
  EDIT DEPARTEMENT  <span class="text-info"> {{$departement->name}} </span>
</x-alert>

<form action="{{route('departement.update',$departement->id)}}" method="POST">
    @csrf
    @method('PUT')


    <div class="rowk mb-4">
        <div class="col">
          <div class="form-outline">
            <input type="text" id="form6Example1" class="form-control" name="name" value="{{old('name',$departement->name)}}" />
            <label class="form-label" for="form6Example1"> name</label>
          </div>
        </div>
        <div class="col my-3">
          <div class="form-outline">
            <textarea type="email" id="form6Example2" class="form-control" name="description" >{{old('description',$departement->description)}} </textarea>
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-primary btn-sm my-2 float-end mb-4">Update</button>
    </form>

</x-master>