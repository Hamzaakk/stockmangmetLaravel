@props(['category'])
<x-master >
    @section('title')
      Stock |Create Products
    @endsection
<x-alert type='primary'>
   add Products 
  </x-alert>
  @include('partials.flashback')
  <!-- Button trigger modal -->


    <x-product.form :category="$category">
    </x-product.form>
</x-master>
