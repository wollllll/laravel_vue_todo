<template>
    <Base>
        <CreateTodo @push-todo="pushTodo"/>
        <Todo
            v-for="todo in todos"
            :key="todo.id"
            :todo="todo"
            :id="`todo-${todo.id}`"
            class="draggable"
            :style="`top: ${todo.top}px; left: ${todo.left}px`"
            v-draggable
        />
    </Base>
</template>

<script>
import {Draggable} from 'draggable-vue-directive';
import Base from "../components/layouts/Base";
import Todo from "../components/Todo";
import CreateTodo from "../components/CreateTodo";
import api from "../api";

export default {
    directives: {
        Draggable,
    },
    components: {
        Base,
        Todo,
        CreateTodo
    },
    data() {
        return {
            todos: {}
        }
    },
    created() {
        this.getAll();
    },
    methods: {
        /**
         * すべてのTODO取得
         */
         getAll() {
            api.todo.getAll()
                .then(response => {
                    console.log('success');
                    this.todos = response.data.todos;
                })
                .catch(() => {
                    console.log('fail')
                });
        },
         /**
         * 追加したtodoをオブジェクトに追加
         *
         * @param todo
         */
        pushTodo(todo) {
            this.todos.push(todo);
        }
    }
}
</script>
