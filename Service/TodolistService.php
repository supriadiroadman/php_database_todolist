<?php

namespace Service;

require_once __DIR__ . "/../Repository/Todolistrepository.php";

use Entity\TodoList;
use Repository\TodolistRepository;

interface TodoListService
{
    function showTodoList(): void;
    function addTodoList(string $todo): void;
    function removeTodolist(int $number): void;
}

class TodoListServiceImpl implements TodoListService
{
    private TodolistRepository $todolistRepository;

    public function __construct(TodolistRepository $todolistRepository)
    {
        $this->todolistRepository = $todolistRepository;
    }


    function showTodoList(): void
    {
        echo "TODOLIST" . PHP_EOL;

        $todoList = $this->todolistRepository->findAll();

        foreach ($todoList as $number => $value) {
            echo "$number." . $value->getTodo() . PHP_EOL;
        }
    }

    function addTodoList(string $todo): void
    {
        $todoList = new TodoList($todo);
        $this->todolistRepository->save($todoList);
        echo "Sukses menambah TodoList" . PHP_EOL;
    }
    function removeTodolist(int $number): void
    {
        if ($this->todolistRepository->remove($number)) {
            echo "Sukses menghapus TodoList" . PHP_EOL;
        } else {
            echo "Gagal menghapus TodoList" . PHP_EOL;
        }
    }
}
