@extends('layouts.app')

@section('content')
    
    @if(Auth::check())
        
        <h1>タスク一覧</h1>
    
        @if (count($tasks) > 0)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>my task</th>
                        <th>タスク</th>
                        <th>ステータス</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                    <tr>
                        <td>@if(Auth::id() === $task->user_id){!! link_to_route('tasks.show', $task->id, ['task' => $task->id]) !!} @else {{$task->id}} @endif</td>
                        <td>@if(Auth::id() === $task->user_id) {{ "○" }} @endif</td>
                        <td>{{ $task->content }}</td>
                        <td>{{ $task->status }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        {!! link_to_route('tasks.create', '新規タスクの投稿', [], ['class' => 'btn btn-primary']) !!}
        
    @else
        @include('welcome')
    
    @endif

@endsection