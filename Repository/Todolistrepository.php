<?php

namespace Repository;

use Entity\TodoList;

interface TodolistRepository
{
    function save(TodoList $todoList): void;
    function remove(int $number): bool;
    function findAll(): array;
}

class TodolistRepositoryImpl implements TodolistRepository
{
    public array $todoList = array();

    function save(TodoList $todoList): void
    {
        $number = count($this->todoList) + 1;
        $this->todoList[$number] = $todoList;
    }


    function remove(int $number): bool
    {
        if ($number > count($this->todoList)) {
            return false;
        }

        for ($i = $number; $i < count($this->todoList); $i++) {
            $this->todoList[$i] = $this->todoList[$i + 1];
        }

        unset($this->todoList[count($this->todoList)]);
        return true;
    }
    function findAll(): array
    {
        return $this->todoList;
    }
}
