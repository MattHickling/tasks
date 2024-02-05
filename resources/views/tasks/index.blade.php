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
            <li>
                {{ $task->name }} - Created by: {{ $task->user->name }}
                @if($tasks->isNotEmpty())
                    <form action="{{ route('tasks.destroy', $tasks->first()) }}" method="post" class="delete-form">
                        @csrf
                        @method('delete')
                        <button type="submit" class="delete-button">Delete First Task</button>
                    </form>
                @endif
            </li>
        @endforeach
    </ul>
    <form action="{{ route('tasks.store') }}" method="post">
        @csrf
        <textarea id="task_description" name="name"></textarea>
        <button type="submit">Add Task</button>
    </form>

    <script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            selector: 'textarea#task_description',
            plugins: 'advlist autolink lists link image charmap print preview anchor',
            toolbar: 'undo redo | bold italic | alignleft aligncenter alignright | link image'
        });
    </script>
</body>
</html>
