@extends('layouts.app')

@section('title')
  {{ $task->title }}
@endsection

@section('content')
<div>
  <p>{{ $task->description }}</p>

  @if ($task->long_description)
    <p>{{ $task->long_description }}</p>
  @endif

  <p>
    @if ($task->completed)
      Completed
    @else
      Not completed
    @endif
  </p>

  <dl>
    <dt>Created at</dt>
    <dd>{{ $task->created_at }}</dd>

    <dt>Updated at</dt>
    <dd>{{ $task->updated_at }}</dd>
  </dl>
</div>

<div>
  <a href="{{ route('tasks.index') }}">Back to list</a>
</div>
@endsection