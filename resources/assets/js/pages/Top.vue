<template>
    <Base>
        <CreateTodo/>
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
import { Draggable } from 'draggable-vue-directive';
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
            todos: [
                {id: 1, content: 'content', top: 123, left: 233},
                {id: 2, content: 'content', top: 222, left: 423},
                {id: 3, content: 'content', top: 153, left: 325}
            ]
        }
    },
    created() {
        // this.getAll();
    },
    methods: {
        /**
         * すべてのtodo取得
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
        }
    }
}
</script>
