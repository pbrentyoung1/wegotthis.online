@if (session("status"))
    <div class="mb-5 rounded-lg bg-success/10 p-3 text-sm text-success">
        {{ session("status") }}
    </div>
@endif

@if ($errors->any())
    <div class="mb-5 rounded-lg bg-danger/10 p-3 text-sm text-danger">
        <ul class="space-y-1">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
