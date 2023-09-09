@props(['profile','departements'])

<x-master title="index" >
   @section('title')
  STOCK|DEPARTEMENT 
   @endsection

<x-alert type="primary">
  BEREAUX
</x-alert>
 <!-- Button trigger modal -->
 <button  type="button" data-mdb-toggle="modal" data-mdb-target="#exampleModal" class="btn btn-primary float-end btn-sm btn-rounded">Add new<i class="fas fa-plus"></i></button>
 <!-- Modal -->
         <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
           <div class="modal-dialog">
             <div class="modal-content">
               <div class="modal-header ">
                 <h5 class="modal-title " id="exampleModalLabel">Add new Bereaux</h5>
                 <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
               <form action="{{route('departement.store')}}" method="POST">
                @csrf
                @method('POST')
                <div class=" ">
                    <div>
                    <input type="text" placeholder="name" id="form6Example1" class="form-control" name="name" value="{{old('name')}}" />
                  </div>
                  <select class="form-select my-3" aria-label="Default select example" name="service_id">
                    <option selected>Service</option>
                  
                    @foreach ($services as $service)
                    <option value="{{$service->id}}">{{$service->name}}</option>
                    @endforeach
                  </select>
                  <div class="my-2">
                    <textarea type="text" placeholder="description" id="form6Example1" class="form-control" name="description" value="{{old('name')}}" ></textarea>
                  </div>
                 </div>
                  <button type="submit" class="btn btn-primary btn-sm my-2 float-end mb-4">ADD</button>
                </form>
                 
               </div>
               <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
               </div>
             </div>
           </div>
         </div>
{{-- @include('partials.flashback') --}}
<x-departement :departements='$departements'>
</x-departement>

</x-master>