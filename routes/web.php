<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;
class Task
{
    public function __construct(
        public int $id,
        public string $title,
        public string $description,
        public ?string $long_description,
        public bool $completed,
        public string $created_at,
        public string $updated_at
    ) {
    }
}

$tasks = [
    new Task(
        1,
        'Buy groceries',
        'Task 1 description',
        'Task 1 long description',
        false,
        '2023-03-01 12:00:00',
        '2023-03-01 12:00:00'
    ),
    new Task(
        2,
        'Sell old stuff',
        'Task 2 description',
        null,
        false,
        '2023-03-02 12:00:00',
        '2023-03-02 12:00:00'
    ),
    new Task(
        3,
        'Learn programming',
        'Task 3 description',
        'Task 3 long description',
        true,
        '2023-03-03 12:00:00',
        '2023-03-03 12:00:00'
    ),
    new Task(
        4,
        'Take dogs for a walk',
        'Task 4 description',
        null,
        false,
        '2023-03-04 12:00:00',
        '2023-03-04 12:00:00'
    ),
];

Route::get('/', function () {
    return redirect()->route('tasks.index');
});


// Use é para poder acessar variáveis externas dentro de uma função anônima. No caso, estamos usando a variável $tasks que foi definida fora da função anônima para passá-la para a view 'index'.
Route::get('/tasks', function () use ($tasks) {
    return view('index', [
        'tasks' => $tasks
    ]);
})->name('tasks.index');

Route::get('/{id}', function ($id) use ($tasks) {
    # Collect é uma função do Laravel que cria uma coleção a partir de um array. A coleção é uma estrutura de dados que fornece métodos úteis para manipular arrays de forma mais conveniente. No caso, estamos criando uma coleção a partir do array $tasks e usando o método firstWhere para encontrar o primeiro elemento da coleção que tenha o valor do campo 'id' igual ao valor da variável $id.
    $task = collect($tasks)->firstWhere('id', $id);

    if(!$task) {
        abort(Response::HTTP_NOT_FOUND);
    }
    return view('show', ['task' => $task]);
})->name('tasks.show');


Route::get('/about', function () {
    return "About page";
});

Route::get('/hello', function () {
    return "Hello page";
})->name('hello');

Route::get('/hi', function () {
    return redirect()->route('hello');
});

Route::fallback(function () {
    return "404 page not found";
});

Route::get('/users/{id}', function ($id) {
    return "User ID: " . $id;
});


