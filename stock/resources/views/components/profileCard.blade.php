@props(['user'])
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
              <h6 class="mb-0">Email</h6>
            </div>
            <div class="col-sm-9 text-secondary">
              {{$user->email}}
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <h6 class="mb-0">Phone</h6>
            </div>
            <div class="col-sm-9 text-secondary">
              {{$user->phone}}
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
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <h6 class="mb-0">role</h6>
            </div>
            <div class="col-sm-9 text-secondary">
              {{$user->role}}
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <h6 class="mb-0">created at</h6>
            </div>
            <div class="col-sm-9 text-secondary">
              {{$user->created_at->format('Y-d-m')}}
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