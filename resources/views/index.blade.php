<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>To-Do List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@latest/css/pico.min.css">
</head>
<body>
<main class="container">
    <h1>To-Do List</h1>

    <form method="POST" action="/tasks">
        @csrf
        <input type="text" name="title" placeholder="Tambah tugas..." required>
        <button type="submit">Tambah</button>
    </form>

    <ul>
        @foreach ($tasks as $task)
            <li>
                <form action="/tasks/{{ $task->id }}" method="POST" style="display:inline;">
                    @csrf @method('PUT')
                    <button style="background:none; border:none; color:inherit; cursor:pointer;"
                        onclick="this.closest('form').submit();">
                        {{ $task->completed ? '✅' : '⬜' }}
                        {{ $task->title }}
                    </button>
                </form>

                <form action="/tasks/{{ $task->id }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button style="background: red; color: white;">Hapus</button>
                </form>
            </li>
        @endforeach
    </ul>
</main>
</body>
</html>
