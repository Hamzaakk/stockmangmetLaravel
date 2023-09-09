@props(['departements'])
@include('partials.flashback')
<table class="table align-middle mb-0 bg-white">
    <thead class="bg-light">
      <tr>
        <th>id</th>
        <th>Bereaux</th>
        <th>Services</th>
        <th>description</th>
        <th>created at</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($departements as $departement)
      <tr>
     
        <td>
          <p class="fw-normal mb-1">{{$departement->id}}</p>
        </td>
        
        <td>{{$departement->name}}</td>
        <td>
          @php
              $service = \App\Models\Service::find($departement->service_id);
          @endphp
          {{$service->name}}
        </td>
        <td>{{$departement->description}}</td>
        
        <td>{{$departement->created_at->format('Y-d-m')}}</td>
       
        
        <td class=" ">
          <form action="{{route('departement.edit',$departement->id)}}" method="GET" class="d-inline">
            @csrf
          <button type="submit" class="btn btn-primary btn-sm btn-rounded " >
            <i class="fas fa-pen"></i>
          </button>
        </form>
          <form action="{{route('departement.destroy',$departement->id)}}" method="POST"  class="d-inline">
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
  {{$departements->links()}}