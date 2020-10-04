<template>
    <div>
        <Todo
            v-for="todo in todos"
            :key="todo.id"
            :todo="todo"
        />
    </div>
</template>

<script>
import Todo from "../../components/Todo";

export default {
    components: {
        Todo
    },
    data() {
        return {
            todos: [
                {id: 1, title: 'todo 1'},
                {id: 2, title: 'todo 2'},
                {id: 3, title: 'todo 3'}
            ]
        }
    }
}
</script>
