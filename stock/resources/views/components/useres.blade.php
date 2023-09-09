@props(['profiles','departements'])
@include('partials.flashback')
<table class="table align-middle mb-0 bg-white">
    <thead class="bg-light">
      <tr>
        <th>user</th>
        <th>phone</th>
        <th>Status</th>
        <th>Bereaux</th>
        <th>created at</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($profiles as $user)
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
              <p class="text-muted mb-0">{{$user->email}}</p>
            </div>
          </div>
        </td>
        <td>
          <p class="fw-normal mb-1">{{$user->phone}}</p>
        </td>
        
        <td>
          <span class="badge badge-success rounded-pill d-inline">Active </span>
        </td>
        <td>

          @php
             $departement = \App\Models\departement::find($user->departemen_id);
          @endphp
             @if($departement)
             {{ $departement->name }}
             @else
              {{$user->departement_id}}       
             @endif
        </td>
       <td>{{$user->created_at->format('Y-d-m')}}</td>
        
        <td class=" ">
          <form action="{{route('profile.edit',$user->id)}}" method="GET" class="d-inline">
            @csrf
          <button type="submit" class="btn btn-primary btn-sm btn-rounded " >
            <i class="fas fa-pen"></i>
          </button>
        </form>
          <form action="{{route('profile.destroy',$user->id)}}" method="POST"  class="d-inline">
            @csrf
            @method('DELETE')
          <button type="submit" onclick=" return confirm('do you want to delete this user')" class="btn  btn-danger btn-sm btn-rounded d-inline" >
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
                   <x-profileCard :user="$user">
                  </x-profileCard>
               
              
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
  {{$profiles->links()}}