<x-master title="index" >
    @section('title')
   STOCK|DEMANDES
    @endsection
 
 <x-alert type="primary">
    Mes Demandes
 </x-alert>
 <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Product</th>
        <th scope="col">Quantity</th>
        <th scope="col">status</th>
        <th>date</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($demandes as $item)
      <tr>
        @php
            $product = \App\Models\Product::find($item->product_id);
            $badegClass = 'info';
            if ($item->status==='accepter') {
                $badegClass ='badge badge-info';
            }
            elseif ($item->status === 'traiter') {
                $badegClass = 'badge badge-warning';
            }
        @endphp
        <th scope="row">{{$item->id}}</th>
        <td>{{$product->name}}</td>
        <td>{{$item->quantité}}</td>    
        <td><span class="{{$badegClass}}"> {{$item->status}}</span></td>
        <td>{{ \Carbon\Carbon::parse($item->created_at)->format('Y-m-d') }}</td>
    </tr>
      @endforeach

    </tbody>
  </table>
  {{$demandes->links()}}
</x-master> 