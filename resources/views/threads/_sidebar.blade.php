<a href="{{ url('threads/create') }}" class="btn btn-danger btn-block px-3" aria-label="Left Align">
    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> เขียนกระทู้ใหม่
</a>
<div class="py-3 px-2">
    <ul class="menu-list list-group">
        @foreach ($channels as $channel)
        <li class="list-group-item bg-transparent border-none border-b px-0">
            <a href="/threads/channels/{{ $channel->id }}">
                <i class="fa fa-circle-o text-primary" aria-hidden="true"></i> {{ $channel->name }}
            </a>
        </li>
        @endforeach
    </ul>
</div>