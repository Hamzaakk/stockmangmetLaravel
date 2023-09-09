
@if ($errors->any())
    <x-alert type='danger'>
      @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
      @endforeach
    </x-alert>
@endif

@if(session('loginError'))

        {{ session('loginError') }}
@endif

@if(session('login'))
<div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4" role="alert">
    <p class="font-bold">Error</p>
    <p>  
        {{ session('login') }}
    </p>
</div>
@endif


@if(session('danger'))
<x-alert type='danger'>
    {{ session('danger') }}
</x-alert>
@endif
<!-- Your login form and other content here -->


@if(session('addUser'))
<x-alert type='success'>
    {{ session('addUser') }}
</x-alert>
@endif


@if(session('success'))
<x-alert type='success'>
    {{ session('success') }}
</x-alert>
@endif


@if (session('successModal'))
<x-success>
</x-success>
@endif
@if (session('dangerModal'))
<x-dangerModal>
</x-dangerModal>
@endif
