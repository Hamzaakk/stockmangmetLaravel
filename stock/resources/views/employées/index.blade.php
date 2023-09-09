<x-master>
<x-alert type='success'>
    Employées
</x-alert>

@include('partials.flashback')

<a href="{{route('employes.create')}}" class="btn btn-sm btn-primary btn-rounded float-end">+</a>
<x-employes :employes="$employes">
</x-employes>







</x-master>