@props(['profile','departements'])
<x-master title="index" >
   @section('title')
   edit   profiles
   @endsection

<x-alert type="primary">
    edit User 
</x-alert>
@include('partials.flashback')
<x-editUser :profile="$profile" :departements='$departements'>
</x-editUser>

</x-master>