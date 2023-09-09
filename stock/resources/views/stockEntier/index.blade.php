@props(['profile','products','fornisseurs','lieux','stockEntier'])
<x-master title="index" >
   @section('title')
   Stock | Entrées
   @endsection

<x-alert type="primary">
  Les  Entrées
</x-alert>
@include('partials.flashback')


   <!-- Button trigger modal -->
   <button  type="button" data-mdb-toggle="modal" data-mdb-target="#exampleModal" class="btn btn-primary btn-sm float-end  btn-rounded"><i class="fas fa-plus"></i></button>
   <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header ">
           <h5 class="modal-title " id="exampleModalLabel"></h5>
           <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <x-stockEntier.create :lieux='$lieux'  :products='$products' :fornisseurs='$fornisseurs'>
            </x-stockEntier.create>
          
         
         <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
         </div>
       </div>
     </div>
     </div>
     </div>







<x-stockEntier.data :stockEntier='$stockEntier' :products='$products' :fornisseurs='$fornisseurs' :lieux='$lieux'>
</x-stockEntier.data>


</x-master>