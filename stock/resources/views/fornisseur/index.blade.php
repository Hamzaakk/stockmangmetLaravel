@props(['fornisseurs'])
<x-master >
    @section('title')
      Stock |Create Products
    @endsection
<x-alert type='primary'>
   Fornisseurs
  </x-alert>
  @include('partials.flashback')
<a href="{{route('fornisseurs.create')}}" class="btn my-2 me-2 btn-primary btn-sm btn-rounded float-end"> 

    <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 50 50" width="30px" height="30px"><path d="M 25 2 C 12.309295 2 2 12.309295 2 25 C 2 37.690705 12.309295 48 25 48 C 37.690705 48 48 37.690705 48 25 C 48 12.309295 37.690705 2 25 2 z M 25 4 C 36.609824 4 46 13.390176 46 25 C 46 36.609824 36.609824 46 25 46 C 13.390176 46 4 36.609824 4 25 C 4 13.390176 13.390176 4 25 4 z M 24 13 L 24 24 L 13 24 L 13 26 L 24 26 L 24 37 L 26 37 L 26 26 L 37 26 L 37 24 L 26 24 L 26 13 L 24 13 z"/></svg>
</a>
<div style="background-color: #eee;">
<div class="d-flex flex-wrap justify-content-center ">
    @foreach ($fornisseurs as $fornisseur)
    <div class=" ms-5 "  style="width: 300px">
          <div class="card  w-100 my-3" style="border-radius: 15px; ">
            <div class="card-body text-center">
              <div class="mt-3 mb-4">
                <img src="{{asset('storage/'.$fornisseur->image)}}"
                  class="rounded-circle img-fluid" style="width: 100px; height:100px" />
              </div>
              <h4 class="mb-2">{{$fornisseur->name}}</h4>
              <p class="text-muted mb-4">@Fornisseur <span class="mx-2">|</span> <a
                  href="#!">{{$fornisseur->company}}</a></p>
              <div class="mb-4 pb-2">
               
                <a href="https://wa.me/{{$fornisseur->phone}}" class="btn btn-outline-primary btn-floating">

                    <svg class="my-1" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16"> <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/> </svg>


                </a>
              </div>
              <button type="button" class="btn btn-primary btn-rounded btn-lg">
                Message now
              </button>
              <div class="d-flex justify-content-center text-center mt-5 mb-2">
               
                <div class="px-3 ">
                  <p class="mb-2 h5">{{$fornisseur->phone}}</p>
                  <p class="text-muted mb-0">FIX:{{$fornisseur->fix}}</p>
                  <p class="text-muted mb-0">{{$fornisseur->email}}</p>
                </div>
              </div>
            </div>
            <div class="d-flex justify-content-center">
            <a href="{{route('fornisseurs.edit',$fornisseur->id)}}" class="btn btn-sm  bg-secondary-subtle ">
                <i class="fas fa-pen"></i>
            </a>
            <form method="POST" action="{{route('fornisseurs.destroy',$fornisseur->id)}}">
                @csrf
                @method('DELETE')
                <button class="btn-sm btn btn-danger ms-3  .bg-danger" onclick="return confirm('are you sure ?')"  type="submit">
                     <i class="fas fa-trash"></i>
                </button>
            </form>
          </div>
          </div>
        </div>
          @endforeach
        </div>
   

</div>
{{$fornisseurs->links()}}
</x-master>
