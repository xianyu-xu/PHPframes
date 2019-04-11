<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>index视图</title>
</head>
<body>
    <h3>index视图</h3>
    <p>{{ $data['name'] }}</p>
    <p>{{$data['age']}}</p>
    
    <p>{{ $data['sex'] or '没有性别' }}</p>

    <h1>条件判断</h1>
    
    @if($data['age']<=10)
    <h4>小孩</h4>
    @elseif($data['age']<=20)
    <h4>青少年</h4>
    @else
    <h4>成年</h4>
    @endif



    <h1>foreach循环</h1>

    @foreach($people as $key=>$value)
        <li>{{  $key }}</li>
        <li>{{ $value['title'] }}</li>
    @endforeach
    <hr>
    <h1>forelse循环  (可以知道是否传的空数组)</h1>
    @forelse($people as $key=>$value)
        <li>{{ $value['title'] }}</li>
    @empty
        <li>没有数据</li>
    @endforelse
    <br>
    @forelse($user as $key=>$value)
        <li>{{ $value['title'] }}</li>
    @empty
        <li>没有数据</li>
    @endforelse
</body>
</html>