@props(['product'])
<x-master >
    @section('title')
      Stock |edit Products
    @endsection
<x-alert type='primary'>
    Edit  {{$product->name}}
</x-alert>
  @include('partials.flashback')
    <x-product.edit :product='$product' :categories='$categories'>
    </x-product.edit>
</x-master>
