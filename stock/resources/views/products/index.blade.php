@props(['products','category'])
<x-master >
    @section('title')
      Stock | Products
    @endsection
<x-alert type='primary'>
    Products
  </x-alert>
  <a  href="{{route('products.create')}}" class="btn btn-primary float-end btn-sm btn-rounded"><i class="fas fa-plus"></i></a>
  <div class="d-flex flex-wrap justify-content-center">
  @foreach ($products as $product)
   <x-product.productCard :product='$product' :category='$category'>
   </x-product.productCard>
   @endforeach
</div> 
  {{$products->links()}}
</x-master>
