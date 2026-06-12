@extends("shared.base", ["title" => "Add task"])
@section("content")
<div class="wrapper">@include("shared.partials.topbar", ["subtitle" => $deliverable->title, "title" => "Add task"]) @include("shared.partials.sidenav")
<div class="page-content"><main><div class="container-fluid py-6"><div class="card mx-auto max-w-4xl"><div class="card-header"><h4 class="card-title">Add task to {{ $deliverable->title }}</h4></div><div class="card-body">
<form action="{{ route('tasks.store', [$project, $deliverable]) }}" method="POST">@csrf @include('tasks.partials.form', ['submitLabel' => 'Add task'])</form>
</div></div></div></main>@include("shared.partials.footer")</div></div>
@endsection
