<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
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
                        <button type="submit" class="delete-button">Delete Task</button>
                    </form>
                @endif
            </li>
        @endforeach
    </ul>
    <form action="{{ route('tasks.store') }}" method="post">
        @csrf
        <div id="task_description" class="quill-container" style="height: 200px;"></div> <!-- Adjust height as needed -->
        <textarea id="task_description_input" name="name" style="display: none;"></textarea>
        <button type="submit">Add Task</button>
    </form>
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>

    <script>
        var quill = new Quill('#task_description', {
            theme: 'snow', 
            modules: {
                toolbar: [
                    [{ 'header': [1, 2, 3, false] }],
                    ['bold', 'italic', 'underline'],
                    ['link', 'image'],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    ['clean']
                ]
            },
            placeholder: 'Write your task description here...'
        });

        var form = document.querySelector('form');
        form.onsubmit = function() {
            var input = document.querySelector('#task_description_input');
            input.value = quill.root.innerHTML;
        };
    </script>
</body>
</html>
