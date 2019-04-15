@if($errors->any())
    @foreach ($errors->all() as $error)
        <li style="color:red;">{{ $error }}</li>   
    @endforeach
@endif

@if(session()->has('error'))
<li style="color:red;">{{ session('error') }}</li>
@endif