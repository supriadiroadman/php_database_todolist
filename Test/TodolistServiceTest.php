<?php
require_once __DIR__ . "/../Entity/Todolist.php";
require_once __DIR__ . "/../Repository/TodolistRepository.php";
require_once __DIR__ . "/../Service/TodolistService.php";

use Entity\TodoList;
use Repository\TodolistRepositoryImpl;
use Service\TodoListServiceImpl;

function testShowTodoList(): void
{
    $todoListRepository = new TodolistRepositoryImpl();
    $todoListRepository->todoList[1] = new TodoList("Belajar PHP");
    $todoListRepository->todoList[2] = new TodoList("Belajar OOP");
    $todoListRepository->todoList[3] = new TodoList("Laravel");

    $todoListService = new TodoListServiceImpl($todoListRepository);

    $todoListService->showTodoList();
}

function addShowTodoList(): void
{
    $todoListRepository = new TodolistRepositoryImpl();

    $todoListService = new TodoListServiceImpl($todoListRepository);

    $todoListService->addTodoList("PHP");
    $todoListService->addTodoList("OOP PHP");
    $todoListService->addTodoList("Laravel");

    $todoListService->showTodoList();
}


function removeShowTodoList(): void
{
    $todoListRepository = new TodolistRepositoryImpl();

    $todoListService = new TodoListServiceImpl($todoListRepository);

    $todoListService->addTodoList("PHP");
    $todoListService->addTodoList("OOP PHP");
    $todoListService->addTodoList("Laravel");

    $todoListService->showTodoList();

    $todoListService->removeTodolist(1);
    $todoListService->showTodoList();

    $todoListService->removeTodolist(4);
    $todoListService->showTodoList();

    $todoListService->removeTodolist(2);
    $todoListService->showTodoList();

    $todoListService->removeTodolist(1);
    $todoListService->showTodoList();
}

removeShowTodoList();
