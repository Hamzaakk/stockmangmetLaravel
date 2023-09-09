@props(['localisations'])
<x-master title="index" >
   @section('title')
  Stock | Localisation 
   @endsection
 <h1>lieux </h1>



 @include('partials.flashback')


 <button  type="button" data-mdb-toggle="modal" data-mdb-target="#exampleModal" class="btn btn-primary float-end btn-sm btn-rounded">Add new<i class="fas fa-plus"></i></button>
 <!-- Modal -->
         <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
           <div class="modal-dialog">
             <div class="modal-content">
               <div class="modal-header ">
                 <h5 class="modal-title " id="exampleModalLabel">Add new Departement</h5>
                 <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
               <form action="{{route('stockslieu.store')}}" method="POST">
                @csrf
                @method('POST')
                <div class=" ">
                    <div>
                    <input type="text" placeholder="lieu" id="form6Example1" class="form-control" name="name" value="{{old('lieu')}}" />
                  </div>
                  <div class="my-2">
                    <textarea type="text" placeholder="city" id="form6Example1" class="form-control" name="city" value="{{old('city')}}" ></textarea>
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







 <table class="table align-middle mb-0 bg-white">
    <thead class="bgg-light">
      <tr>
        <th>id</th>
        <th>lieux</th>
        <th>city</th>
        <th>created at</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($localisations as $localisation)
      <tr>
     
        <td>
          <p class="fw-normal mb-1">{{$localisation->id}}</p>
        </td>
        
        <td>{{$localisation->name}}</td>
        <td>{{$localisation->city}}</td>
        <td>{{$localisation->created_at->format('Y-d-m')}}</td>
       
        
        <td class=" ">
          
        <form action="{{route('stockslieu.edit',$localisation->id)}}" method="GET" class="d-inline">
            @csrf
          <button type="submit" class="btn btn-primary btn-sm btn-rounded " >
            <i class="fas fa-pen"></i>
          </button>
        </form>

          <form action="{{route('stockslieu.destroy',$localisation->id)}}" method="POST"  class="d-inline">
            @csrf
            @method('DELETE')
          <button type="submit" onclick=" return confirm('do you want to delete this user')" class="btn  btn-danger btn-sm btn-rounded d-inline" >
            <i class="fas fa-trash"></i>
          </button>
        </form>
         
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{$localisations->links()}}
</x-master>