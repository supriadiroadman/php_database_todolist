<?php

namespace View;

use Helper\InputHelper;
use Service\TodoListService;

class TodoListView
{
    private TodoListService $todoListService;

    public function __construct(TodoListService $todoListService)
    {
        $this->todoListService = $todoListService;
    }

    function showTodoList(): void
    {
        while (true) {
            $this->todoListService->showTodoList();

            echo "MENU" . PHP_EOL;
            echo "1. Tambah todo" . PHP_EOL;
            echo "2. Hapus todo" . PHP_EOL;
            echo "x. Keluar" . PHP_EOL;

            $pilihan = InputHelper::input('Pilih');

            if ($pilihan == "1") {
                $this->addTodoList();
            } else if ($pilihan == "2") {
                $this->removeTodoList();
            } else if ($pilihan == "x") {
                break;
            } else {
                echo "Pilihan tidak dimengerti" . PHP_EOL;
            }
        }
        echo "Sampai jumpa lagi" . PHP_EOL;
    }

    function addTodoList(): void
    {
        echo "Menambah todo" . PHP_EOL;
        $todo = InputHelper::input("Todo (x untuk batal) ");

        if ($todo == "x") {
            echo "Batal menambah todo" . PHP_EOL;
        } else {
            $this->todoListService->addTodoList($todo);
        }
    }

    function removeTodoList(): void
    {
        echo "MENGHAPUS TODO" . PHP_EOL;

        $pilihan = InputHelper::input("Nomor (x untuk batalkan)");

        if ($pilihan == "x") {
            echo "Batal menghapus todo" . PHP_EOL;
        } else {
            $this->todoListService->removeTodolist($pilihan);
        }
    }
}
