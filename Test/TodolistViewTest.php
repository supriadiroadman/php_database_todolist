<?php

require_once __DIR__ . '/../Entity/Todolist.php';
require_once __DIR__ . '/../Repository/Todolistrepository.php';
require_once __DIR__ . '/../Service/TodolistService.php';
require_once __DIR__ . '/../View/TodolistView.php';
require_once __DIR__ . '/../Helper/InputHelper.php';

use Entity\TodoList;
use Repository\TodolistRepositoryImpl;
use Service\TodoListServiceImpl;
use View\TodoListView;

function testViewShowTodoList()
{
    $todoListRepository = new TodolistRepositoryImpl();
    $todoListService = new TodoListServiceImpl($todoListRepository);
    $todoListView = new TodoListView($todoListService);

    $todoListService->addTodoList("Belajar PHP");
    $todoListService->addTodoList("Belajar OOP PHP");
    $todoListService->addTodoList("Belajar Laravel");

    $todoListView->showTodoList();
}

// testViewShowTodoList();

function testAddShowTodoList()
{
    $todoListRepository = new TodolistRepositoryImpl();
    $todoListService = new TodoListServiceImpl($todoListRepository);
    $todoListView = new TodoListView($todoListService);

    $todoListService->addTodoList("Belajar PHP");
    $todoListService->addTodoList("Belajar OOP PHP");
    $todoListService->addTodoList("Belajar Laravel");

    $todoListService->showTodoList();

    $todoListView->addTodoList();

    $todoListService->showTodoList();

    $todoListView->addTodoList();

    $todoListService->showTodoList();
}

// testAddShowTodoList();

function testRemoveShowTodoList()
{
    $todoListRepository = new TodolistRepositoryImpl();
    $todoListService = new TodoListServiceImpl($todoListRepository);
    $todoListView = new TodoListView($todoListService);

    $todoListService->addTodoList("Belajar PHP");
    $todoListService->addTodoList("Belajar OOP PHP");
    $todoListService->addTodoList("Belajar Laravel");

    $todoListService->showTodoList();

    $todoListView->removeTodoList();

    $todoListService->showTodoList();

    $todoListView->removeTodoList();

    $todoListService->showTodoList();
}

testRemoveShowTodoList();
