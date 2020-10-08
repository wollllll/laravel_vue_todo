<template>
    <Base id="todo-area">
        <Todo
            v-for="todo in todos"
            :key="todo.id"
            :todo="todo"
            :trashBoxDom="trashBoxDom"
            :id="`todo-${todo.id}`"
            class="draggable"
            :style="`top: ${todo.top}px; left: ${todo.left}px`"
            v-draggable="draggableValue"
            @get-delete-todo="filterDeleteTodo"
        />
        <Search @search="setSearch"/>
        <Create @push-todo="pushTodo"/>
        <div id="trash-box" class="icon-trash">
            <i class="fas fa-trash"></i>
        </div>
    </Base>
</template>

<script>
import {Draggable} from 'draggable-vue-directive';
import Base from "../components/layouts/Base";
import Todo from "../components/Todo";
import Create from "../components/CreateTodo";
import Search from "../components/Search";
import api from "../api";

export default {
    directives: {
        Draggable,
    },
    components: {
        Base,
        Todo,
        Create,
        Search
    },
    data() {
        return {
            todos: {},
            search: '',
            trashBoxDom: HTMLDivElement,
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
        // todo 修正
        // this.initialUrl();
        this.getAll();
    },
    mounted() {
        this.getWidth();
        this.getHeight();
        this.trashBoxDom = document.getElementById('trash-box');
    },
    watch: {
        search() {
            const router = this.$router;

            this.search ? router.replace({name: "Top", query: {search: this.search}}) : router.replace({name: "Top"});
        }
    },
    methods: {
        /**
         * クエリーを取り除いたURLにする
         */
        initialUrl() {
            this.$router.replace({name: "Top"});
        },
        /**
         * すべてのTODO取得
         */
        getAll() {
            api.todo.getAll(this.search)
                .then(response => {
                    console.log('success');
                    this.todos = response.data.todos;
                })
                .catch(() => {
                    console.log('fail')
                });
        },
        /**
         * 検索ワードをdataにセット
         */
        setSearch(search) {
            this.search = search;
            this.getAll();
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
        },
        /**
         * 削除したTODOを配列から除外
         *
         * @param targetTodo
         */
        filterDeleteTodo(targetTodo) {
            this.todos = this.todos.filter(todo => todo.id !== targetTodo.id);

            this.changeDefaultTrashBox();
        },
        changeDefaultTrashBox() {
            this.trashBoxDom.style.background = '';
        }
    }
}
</script>

<style lang="scss">
.icon-trash {
    border: 1px solid #dc3545;
    position: absolute;
    left: 8px;
    bottom: 8px;
    width: 150px;
    height: 150px;
    font-size: 70px;
    text-align: center;
    line-height: 150px;
}
</style>
