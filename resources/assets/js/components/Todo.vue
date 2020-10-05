<template>
    <div class="card todo" @mouseup="mouseUp">
        <p>{{ todo.content }}</p>
    </div>
</template>

<script>
import api from "../api";

export default {
    props: {
        todo: Object
    },
    methods: {
        mouseUp(e) {
            api.todo.update(this.todo.id, e.target.style.top, e.target.style.left)
                .then(() => {
                    console.log('success');
                })
                .catch(() => {
                    console.log('fail');
                });
        }
    }
}
</script>

<style lang="scss">
.todo {
    position: absolute;
    width: 150px;
    height: 150px;
    z-index: 1;
}
</style>
