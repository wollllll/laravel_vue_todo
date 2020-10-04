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
            todos: {}
        }
    },
    created() {
        // this.getAll();
    },
    mounted() {
        this.getAll();
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
                    this.todos = response.data.todos;
                })
                .catch(() => {
                    console.log('fail')
                });
        }
    }
}
</script>
