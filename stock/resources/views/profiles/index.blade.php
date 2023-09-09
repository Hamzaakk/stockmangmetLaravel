@props(['profiles' ,'departements'])
<x-master title="index" >
   @section('title')
       profiles
   @endsection
   <x-alert type='primary'>
    Useres
  </x-alert>
    <!-- Button trigger modal -->
    <button  type="button" data-mdb-toggle="modal" data-mdb-target="#exampleModal" class="btn btn-primary float-end btn-sm btn-rounded"><i class="fas fa-plus"></i></button>
    <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header ">
                    <h5 class="modal-title " id="exampleModalLabel">Add new User</h5>
                    <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
    
                    <x-formAddUser :departements="$departements">
                    </x-formAddUser>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
          
  <x-useres :profiles="$profiles" >
  </x-useres>

</x-master>