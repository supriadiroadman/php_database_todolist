<?php

use Repository\TodolistRepositoryImpl;
use Service\TodoListServiceImpl;
use View\TodoListView;

require_once __DIR__ . '/Entity/Todolist.php';
require_once __DIR__ . '/Helper/InputHelper.php';
require_once __DIR__ . '/Repository/Todolistrepository.php';
require_once __DIR__ . '/Service/TodolistService.php';
require_once __DIR__ . '/View/TodolistView.php';

echo "Aplikasi todoList" . PHP_EOL;

$todoListRepository = new TodolistRepositoryImpl();
$todoListService =  new TodoListServiceImpl($todoListRepository);
$todoListView =  new TodoListView($todoListService);

$todoListView->showTodoList();
