<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<body>
    <a href="{{ url('/dashboard') }}" class="dashboard-button">Dashboard</a>

    <h1>Task List</h1>
    <ul>
        @foreach ($tasks as $task)
            <li>{{ $task->name }} - Created by: {{ $task->user->name }}</li>
        @endforeach
    </ul>
    <form action="/tasks" method="post">
        @csrf
        <input type="text" name="name" placeholder="Enter task name">
        <button type="submit">Add Task</button>
    </form>
</body>
</html>
