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
        />
    </Base>
</template>

<script>
import "jquery";
import 'jquery-ui-dist/jquery-ui';
import Base from "../components/layouts/Base";
import Todo from "../components/Todo";
import CreateTodo from "../components/CreateTodo";
import api from "../api";

export default {
    components: {
        Base,
        Todo,
        CreateTodo
    },
    data() {
        return {
            todos: [
                {id: 1, title: 'todo 1', top: 200, left: 300},
                {id: 2, title: 'todo 2', top: 250, left: 222},
                {id: 3, title: 'todo 3', top: 0, left: 700}
            ]
        }
    },
    created() {
        this.getAll();
    },
    mounted() {
        const $draggable = $('.draggable');

        $draggable.draggable({
            containment: 'parent'
        });
        $draggable.on('mouseup', (e) => {

        });
    },
    methods: {
        /**
         * すべてのtodo取得
         */
        getAll() {
            api.todo.getAll()
                .then(response => {
                    console.log('success');
                })
                .catch(() => {
                    console.log('fail')
                });
        }
    }
}
</script>
