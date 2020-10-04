<template>
    <div>
        <Todo
            v-for="todo in todos"
            :key="todo.id"
            :todo="todo"
            :id="`todo-${todo.id}`"
            class="todo"
        />
    </div>
</template>

<script>
import "jquery";
import "jquery-ui";
import 'jquery-ui-dist/jquery-ui';
import Todo from "../../components/Todo";

export default {
    components: {
        Todo
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
    mounted() {
        $('.todo').draggable();
        this.setInitialPosition();
    },
    methods: {
        /**
         * 初期位置を設定
         */
        setInitialPosition() {
            this.todos.forEach(todo => {
                $(`#todo-${todo.id}`).css({
                    top: `${todo.top}px`,
                    left: `${todo.left}px`
                });
            });
        }
    }
}
</script>

<style>
.todo {
    width: 150px;
    height: 150px;
    background: gray;
}
</style>
