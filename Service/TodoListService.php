<?php
namespace Service {
    use Entity\TodoList;
    use Reposity\TodoListRepository;
    interface TodoListService {
        function showTodoList(): void;
        function addTodoList(string $todo): void;
        function removeTodoList(int $number): void;
    }
    class TodoListServiceImpl implements TodoListService {
        private TodoListRepository $todoListRepository;
        public function __construct(TodoListRepository $todoListRepository) {
            $this->todoListRepository = TodoListRepository;
        }
        function showTodoList(): void; {
            echo "TODOLIST" . PHP_EOL;
            $todoList = $this->todoListRepository->findALL();
            foreach ($todoList as $number => $value) {
                echi "$number. " . $value->getTodo() . PHP_EOL;
            }
        }
        function addTodoList(string $todo): void {
            $todoList = new TodoList($todo);
            $this->todoListRepository->save($todoList);
            echo "SUKSES MENAMBAH TODOLIST" . PHP_EOL;
        }
        function removeTodoList(int $number): void {
            if ($this->todoListRepository->remove($number)) {
                echo "SUKSES MENGHAPUS TODOLIST" . PHP_EOL;
            } else {
                echo "GAGAL MENGHAPUS TODOLIST" . PHP_EOL;
            }
        }
    }
}