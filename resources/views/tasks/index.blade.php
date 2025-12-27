<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>AJAX CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <h2>All Tasks</h2>
        <a href="{{ route('tasks.create') }}" class="btn btn-success mb-3">Add New Task</a>

        <ul class="list-group">
            @foreach ($tasks as $task)
                <li class="list-group-item">{{ $task->name }}</li>
            @endforeach
        </ul>
    </div>
</body>

</html>
