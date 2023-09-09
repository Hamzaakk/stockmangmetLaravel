@props(['employes'])

<table class="table align-middle mb-0 bg-white">
    <thead class="bg-light">
      <tr>
        <th>Employée</th>
        <th>phone</th>
        <th>Service</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($employes as $user)
      <tr>
        <td>
          <div class="d-flex align-items-center">
            <img
                src="{{asset('storage/'.$user->image)}}"
                alt=""
                style="width: 50px; height: 50px"
                class="rounded-circle"
                />
            <div class="ms-3">
              <p class="fw-bold mb-1">{{$user->name}}</p>
            </div>
          </div>
        </td>
        <td>
          <p class="fw-normal mb-1">+212{{$user->phone}}</p>
        </td>
        
        <td>

          @php
             $service = \App\Models\Service::find($user->service_id);
          @endphp
            {{$service->name}}
        </td>

        
        <td class=" ">
          <form action="{{route('employes.edit',$user->id)}}" method="GET" class="d-inline">
            @csrf
          <button type="submit" class="btn btn-primary btn-sm btn-rounded " >
            <i class="fas fa-pen"></i>
          </button>
        </form>
          <form action="{{route('employes.destroy',$user->id)}}" method="POST"  class="d-inline">
            @csrf
            @method('DELETE')
          <button type="submit" onclick="return confirm('do you want to delete this user')" class="btn  btn-danger btn-sm btn-rounded d-inline" >
            <i class="fas fa-trash"></i>
          </button>
        </form>
          <!-- Button trigger modal -->
          <button  type="button" data-mdb-toggle="modal" data-mdb-target="#exampleModal{{$user->id}}" class="btn btn-success btn-sm btn-rounded"><i class="fas fa-address-card"></i></button>
        <div class="modal fade" id="exampleModal{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header ">
                <h5 class="modal-title " id="exampleModalLabel">{{$user->name}}</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                 
                <div class="row gutters-sm">
                  <div class="contetn-modal text-center">
                      <img  src="{{asset('storage/'.$user->image)}}" alt="" 
                      style="width: 225px; height: 225px; "
                      class="rounded-circle"
                      >
                    <div class="card pt-2 ">
                  <div class="col">
                    <div class="card mb-3">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-sm-3">
                            <h6 class="mb-0">Full Name</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
                            {{$user->name}}
                          </div>
                        </div>
                        <hr>
                       
                        
                        <div class="row">
                          <div class="col-sm-3">
                            <h6 class="mb-0">Phone</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
                          +212  {{$user->phone}}
                          </div>
                        </div>
                        <hr>
                       
                        <div class="row">
                          <div class="col-sm-3">
                            <h6 class="mb-0">Address</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
                            {{$user->adresse}}
                          </div>
                        </div>
                  
                     
                        <div class="row">
                          <div class="col-sm-12">
                          </div>
                        </div>
                      </div>
                    </div>
              
                  </div>
              
                  </div>
                </div>
              
              </div>
              </div>
              
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
              </div>
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
  {{$employes->links()}}