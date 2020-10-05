<template>
    <div class="card todo" @mouseup="mouseUp">
        {{ todo.content }}
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
            api.todo.update(this.todo.id, e.clientY, e.clientX)
                .then(()=> {
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
