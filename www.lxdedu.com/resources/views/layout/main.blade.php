{{-- 头部 --}}
@include('public/_header')


{{-- 侧边栏 --}}
@include('public/_aside')

@yield('css')

@yield('centent')

@yield('js')

{{-- js脚本 --}}
@include('public/_footer')

