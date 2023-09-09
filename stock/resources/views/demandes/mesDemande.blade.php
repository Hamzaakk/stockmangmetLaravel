@props(['profile','products','demandes'])

<x-master title="index" >
   @section('title')
  STOCK|DEMANDES
   @endsection

<x-alert type="primary">
   all Demandes
</x-alert>
@include('partials.flashback')
@if (count($demandes) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    
                    <th>User</th>
                    <th>Pour Employé</th>
                    <th>status</th>
                    <th>opération</th>
                    
               
                </tr>
            </thead>
            <tbody>
                @foreach ($demandes as  $demande)
                    <tr>
                      
          @php
          $product = \App\Models\Product::find($demande->product_id);
          $user =  \App\Models\Profile::find($demande->profile_id);
          $Employé = \App\Models\Employée::find($demande->employé_id);;
         @endphp
    
                        <td>{{ $product->name }}</td>
                        <td>{{$demande->quantité}}</td>
                        <td>
                            {{$user->name}}
                        <p>{{$user->email}}</p>
                    </td>
                    @if ($demande->employé_id!==null)
                    <td><span class="badge text-bg-info">{{$Employé->name}}</span></td>        
                    @else
                    <td>
                         {{$user->name}}
                       </td>        
                    @endif
                    
                        <td>
                           
                                @if($demande->status==='traiter')
                                <span class="badge text-bg-warning">{{$demande->status}}</span>
                                 @else
                                 <span class="badge text-bg-success">{{$demande->status}}</span>
                                 @endif
                         
                        </td>
                        <td class="d-flex">
                            <form action="{{ route('demandes.destroy', $demande->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm btn-rounded">            <i class="fas fa-trash"></i>
</button>
                            </form>
                            @if($demande->status==='traiter')
                            <form action="{{ route('demandes.accepter', $demande->id) }}" method="GET" class="">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm btn-rounded">  <i class="fas fa-check"></i>
</button>
                            </form> 
                           @endif 
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$demandes->links()}}
        @endif
</x-master>