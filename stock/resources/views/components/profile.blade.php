@props(['user'])
<section style="background-color: #eee;">
    <div class="container py-5">
      <div class="row">
       
      </div>
  
      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center">
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
        
        </div>
        <div class="col-lg-8">
          <div class="card mb-4 p-4">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Full Name</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{$user->name}}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{$user->email}}</p>
                </div>
              </div>
              <hr>
             
              
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Mobile</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{$user->phone}}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Address</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{$user->adresse}}</p>
                </div>
              </div>
            </div>
          </div>
         
        </div>
      </div>
    </div>
  </section>