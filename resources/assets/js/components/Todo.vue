<template>
    <div class="card todo">
        {{ todo.title }}
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
}
</style>
