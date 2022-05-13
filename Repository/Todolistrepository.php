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

    private \PDO $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    function save(TodoList $todoList): void
    {
        $sql = "INSERT INTO todolist (todo) VALUES (?)";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$todoList->getTodo()]);
    }


    function remove(int $number): bool
    {
        /*if ($number > count($this->todoList)) {
            return false;
        }

        for ($i = $number; $i < count($this->todoList); $i++) {
            $this->todoList[$i] = $this->todoList[$i + 1];
        }

        unset($this->todoList[count($this->todoList)]);
        return true;*/

        // Cek apakah ada id yg akan di hapus
        // Karena fungsi ini mengembalikan bool, jadi harus true / false
        $sql = "SELECT id FROM todolist WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$number]);

        if ($statement->fetch()) {
            // todolist ada
            $sql = "DELETE FROM todolist WHERE id = ?";
            $statement = $this->connection->prepare($sql);
            $statement->execute([$number]);
            return true;
        } else {
            // todolist tidak ada
            return false;
        }


    }

    function findAll(): array
    {
        return $this->todoList;
    }
}
