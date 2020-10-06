<template>
    <Base id="todo-area">
        <Todo
            v-for="todo in todos"
            :key="todo.id"
            :todo="todo"
            :id="`todo-${todo.id}`"
            class="draggable"
            :style="`top: ${todo.top}px; left: ${todo.left}px`"
            v-draggable="draggableValue"
        />
        <Create @push-todo="pushTodo"/>
        <Delete/>
    </Base>
</template>

<script>
import {Draggable} from 'draggable-vue-directive';
import Base from "../components/layouts/Base";
import Todo from "../components/Todo";
import Create from "../components/todos/Create";
import Delete from "../components/todos/Delete";
import api from "../api";

export default {
    directives: {
        Draggable,
    },
    components: {
        Base,
        Todo,
        Create,
        Delete
    },
    data() {
        return {
            todos: {},
            draggableValue: {
                boundingRect: {
                    top: 0,
                    left: 0,
                    right: 0,
                    bottom: 0,
                }
            }
        }
    },
    created() {
        this.getAll();
    },
    mounted() {
        this.getWidth();
        this.getHeight();
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
        },
        /**
         * 画面の横幅取得
         */
        getWidth() {
            this.draggableValue.boundingRect.right = document.getElementById('todo-area').clientWidth;
        },
        /**
         * 画面の縦幅取得
         */
        getHeight() {
            this.draggableValue.boundingRect.bottom = document.getElementById('todo-area').clientHeight;
        }
    }
}
</script>
