<?php
require_once __DIR__ . "/../Entity/TodoList.php";
require_once __DIR__ . "/../Repository/TodoListRepository.php";
require_once __DIR__ . "/../Service/TodoListService.php";
use Entity\TodoList;
use Service\TodoListServiceImpl;
use Repository\TodoListRepositoryImpl;
function testShowTodoList(): void {
    $todoListRepository = new TodoListRepositoryImpl();
    $todoListRepository->todoList[1] = new TodoList("Belajar PHP");
    $todoListRepository->todoList[2] = new TodoList("Belajar PHP OPP");
    $todoListService = new TodoListServiceImpl($todoListRepository);
    $todoListService->showTodoList();
}
function testAddTodoList(): void {
    $todoListRepository = new TodoListRepositoryImpl();
    $todoListService = new TodoListServiceImpl($todoListRepository);
    $todoListService->addTodoList("BELAJAR PHP");
    $todoListService->addTodoList("BELAJAR PHP OOP"); 
    $todoListService->showTodoList();
}
function testRemoveTodoList(): void {
    $todoListRepository = new TodoListRepositoryImpl();
    $todoListService = new TodoListServiceImpl($todoListRepository);
    $todoListService->addTodoList("BELAJAR PHP");
    $todoListService->addTodoList("BELAJAR PHP OOP");
    $todoListService->showTodoList();
    $todoListService->removeTodoList(1);
    $todoListService->showTodoList();
    $todoListService->removeTodoList(4);
    $todoListService->showTodoList();
}
testShowTodoList();
testAddTodoList();
testRemoveTodoList();