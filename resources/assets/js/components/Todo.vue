<template>
    <div class="card todo">
        {{ todo.content }}
    </div>
</template>

<script>
export default {
    props: {
        todo: Object
    }
}
</script>

<style lang="scss">
.todo {
    width: 150px;
    height: 150px;
    z-index: 5000;
}
</style>
