@if($errors->any())
    @foreach ($errors->all() as $error)
        <div class="Huialert Huialert-danger"><i class="Hui-iconfont">&#xe6a6;</i>{{ $error }}</div>
    @endforeach
@endif

@if(session()->has('error'))
<div class="Huialert Huialert-danger"><i class="Hui-iconfont">&#xe6a6;</i>{{ session('error') }}</div>
@endif

@if(session()->has('msg'))
<div class="Huialert Huialert-danger"><i class="Hui-iconfont">&#xe6a6;</i>{{ session('msg') }}</div>
@endif