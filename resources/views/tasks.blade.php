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
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Add New Task</div>
                    <div class="card-body">
                        <form id="taskForm" method="POST" action="/tasks">
                            @csrf
                            <div class="input-group">
                                <input type="text" id="task_name" class="form-control" placeholder="What needs to be done?">
                                <button type="submit" class="btn btn-primary">Add Task</button>
                            </div>
                        </form>
                    </div>
                </div>

                <ul class="list-group mt-4" id="taskList">
                    </ul>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#taskForm').on('submit', function(e) {
                e.preventDefault();

                let taskName = $('#task_name').val();

                console.log(taskName);

                $.ajax({
                    url: "/tasks",
                    type: "POST",
                    data: {
                        _token: $('input[name="_token"]').val(),
                        name: taskName
                    },

                    success: function(response) {
                        console.log("Data received", response);

                        $('#taskList').append('<li class="list-group-item">' + response.name + '</li>');

                        $('#task_name').val('');
                    },

                    error: function(xhr) {
                        console.log("There is a error", xhr.responseText);
                    }
                })
            })
        })
    </script>
</body>
</html>