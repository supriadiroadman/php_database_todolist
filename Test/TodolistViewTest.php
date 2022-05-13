<?php

require_once __DIR__ . '/../Entity/Todolist.php';
require_once __DIR__ . '/../Repository/TodolistRepository.php';
require_once __DIR__ . '/../Service/TodolistService.php';
require_once __DIR__ . '/../View/TodolistView.php';
require_once __DIR__ . '/../Helper/InputHelper.php';
require_once __DIR__ . '/../Config/Database.php';

use Config\Database;
use Repository\TodolistRepositoryImpl;
use Service\TodoListServiceImpl;
use View\TodoListView;

function testViewShowTodoList()
{
    $connection = Database::getConnection();
    $todoListRepository = new TodolistRepositoryImpl($connection);
    $todoListService = new TodoListServiceImpl($todoListRepository);
    $todoListView = new TodoListView($todoListService);

    $todoListView->showTodoList();
}

function testAddShowTodoList()
{
    $connection = Database::getConnection();
    $todoListRepository = new TodolistRepositoryImpl($connection);
    $todoListService = new TodoListServiceImpl($todoListRepository);
    $todoListView = new TodoListView($todoListService);

    $todoListView->addTodoList();
}

function testRemoveShowTodoList()
{
    $connection = Database::getConnection();
    $todoListRepository = new TodolistRepositoryImpl($connection);
    $todoListService = new TodoListServiceImpl($todoListRepository);
    $todoListView = new TodoListView($todoListService);

    $todoListView->removeTodoList();
}

//testViewShowTodoList();
//testAddShowTodoList();
testRemoveShowTodoList();
