<form action="{{ route('admin.user.addrole',$user) }}" method="post">
    @csrf
    <ul>
        @foreach ($roles as $item)
            <li>
                
                <input type="radio" @if ($item->id == $user->role_id)
                    checked
                @endif name='ids' value="{{ $item->id }}" >{{ $item->role_name }}
            </li>
            
        @endforeach
    </ul>

    <input type="submit" value="分配角色">
</form>