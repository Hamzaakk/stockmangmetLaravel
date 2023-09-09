@props(['categorys'])
<x-master >
    @section('title')
      Stock |Category
    @endsection
<x-alert type='primary'>
   add Category
  </x-alert>
  @include('partials.flashback')
    

  <button  type="button" data-mdb-toggle="modal" data-mdb-target="#exampleModal" class="btn btn-primary float-end btn-sm btn-rounded ">Add new<i class="fas fa-plus"></i></button>
  <div class="container mt-4  ">
    <table class="table table-bordered my-5">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Opération</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($categorys as $item)
        <tr>
          <td>{{$item->id}}</td>
          <td>{{$item->name}}</td>
          <td class="d-flex ">
            <form action="{{route('categories.destroy',$item->id)}}" method="POST" class="">
                @csrf
                @method('DELETE')
            <button type="submit" onclick="return confirm('are you sure ?')" class="btn btn-danger  btn-sm btn-rounded me-2"> 
                <i class="fas fa-trash"></i>
            </button>
            </form>
        
            <button  type="button" data-mdb-toggle="modal" data-mdb-target="#exampleModal{{$item->id}}" class="btn btn-success btn-sm btn-rounded"> <i class="fas fa-pen"></i></button>
       
            <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header ">
                      <h5 class="modal-title " id="exampleModalLabel">{{$item->name}}</h5>
                      <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                         
                        <form action="{{route('categories.update',$item->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class=" ">
                                <div>
                                <input type="text" placeholder="name" id="form6Example1" class="form-control" name="name" value="{{old('name',$item->name)}}" required />
                              </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm my-2 float-end mb-4">ADD</button>
                          </form>
                    
                  </div>
                </div>
                </div>
                </div>
              </div>
       
        </td>
        </tr>
        @endforeach
      </tbody>

    </table>
  </div>
  
  
  
  
  
  
  
  
  
  
  
  
  <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header ">
                  <h5 class="modal-title " id="exampleModalLabel">Add new Departement</h5>
                  <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="{{route('categories.store')}}" method="POST">
                 @csrf
                 @method('POST')
                 <div class=" ">
                     <div>
                     <input type="text" placeholder="name" id="form6Example1" class="form-control" name="name" value="{{old('name')}}" required/>
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
</x-master>
