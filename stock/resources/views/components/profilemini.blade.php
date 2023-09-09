@props(['user'])
<section style="background-color: ">
    <div class="container py-5">
      <div class="row">
       
     
  
        {{-- <div class="col-lg-4"> --}}
          <div class="carGd   me-3" width="500px">
            <div class="card-bodyH text-center" >
              <img src="{{asset("storage/$user->image")}}" alt="avatar"
                class="rounded-circle img-fluid" style="width: 150px;">
              <h5 class="my-3">{{$user->name}}</h5>
              <p class="text-muted mb-1">{{$user->role}}</p>
              <div class="d-flex justify-content-center mb-2">
                {{-- <button type="button" class="btn btn-primary">edit</button>
                 --}}
                 <form action="{{route('profile.edit',$user->id)}}" method="GET" class="d-inline">
                  @csrf
                <button type="submit" class="btn btn-primary  " >
                  <i class="fas fa-pen"></i>
                </button>
              </form>
                <button type="button" class="btn btn-outline-sacondary ms-1">Message</button>
              </div>
            </div>
          </div>