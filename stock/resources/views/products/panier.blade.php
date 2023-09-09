<x-master title="index" >
    @section('title')
   STOCK|Panier
    @endsection
 
 <x-alert type="primary">
     Panier 
 </x-alert>
 <div>
    <h1>Commande Cart</h1>
    @if (count($carts) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>remove</th>
                 
                </tr>
            </thead>
            <tbody>
                @foreach ($carts as $productId => $cartItem)
                    <tr>
                        @php
                            
                    $product = \App\Models\Product::find($cartItem['id']);
                    
                        @endphp
                        <td>
                            <img src="{{asset('storage/'.$product->image)}}" alt="" width="120" height="120">
                        </td>
                        <td>{{ $cartItem['quantity'] }}</td>
                        <td>
                            <form action="{{ route('remove-from-cart', $productId) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">-</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <form action="{{ route('confirm-cart') }}" method="POST">
            @csrf
            <div class="my-3">
                <input class="form-check-input" type="checkbox" value="1" id="form1Example3" checked name="cheked"/>
                <label class="form-check-label" for="form1Example3"> Pour Un Employé </label>
                <input class="form-check-input" type="text" hidden value="{{Auth::id()}}"  name="profile_id"/>

            </div>
            <select class="form-select" aria-label="Default select example" name="employé_id" id="pourEmployéSelect">

                @foreach ($Employes as $pourEmployé)
                <option value="{{$pourEmployé->id}}">{{$pourEmployé->name}}</option>
                @endforeach
            </select>
            <button type="submit" class="btn my-2 btn-primary float-end btn-rounded">Confirm Cart </button>
        </form>
    @else
        <p>Your cart is empty.</p>
    @endif
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const checkbox = document.getElementById('form1Example3');
        const select = document.getElementById('pourEmployéSelect');

        // Initial visibility state based on checkbox's "checked" attribute
        select.style.display = checkbox.checked ? 'block' : 'none';

        // Add an event listener to toggle the select's visibility when the checkbox is clicked
        checkbox.addEventListener('click', function() {
            select.style.display = checkbox.checked ? 'block' : 'none';
        });
    });
</script>

 </div>
</x-master>