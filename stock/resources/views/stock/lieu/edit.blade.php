@props(['lieuStock'])
<x-master title="index" >
   @section('title')
   edit   profiles
   @endsection

<x-alert type="primary">
    edit Lieux {{$lieuStock->name}} 
</x-alert>
@include('partials.flashback')
<div class="">
        <form action="{{route('stockslieu.update',$lieuStock->id)}}" method="POST">
         @csrf
         @method('PUT')
         <div class=" ">
             <div>
             <input type="text" placeholder="lieu" id="form6Example1" class="form-control" name="name" value="{{old('lieu',$lieuStock->name)}}" />
           </div>
           <div class="my-2">
             <textarea type="text" placeholder="city" id="form6Example1" class="form-control" name="city" > {{old('city',$lieuStock->city)}}</textarea>
           </div>
          </div>
           <button type="submit" class="btn btn-primary btn-sm my-2 float-end mb-4">edit</button>
         </form>
          
    
  </div>

</x-master>