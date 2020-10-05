<template>
    <div class="card todo" @mouseup="mouseUp">
        {{ todo.content }}
    </div>
</template>

<script>
export default {
    props: {
        todo: Object
    },
    methods: {
        mouseUp(e) {
            console.log(e.clientY, e.clientX)
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
