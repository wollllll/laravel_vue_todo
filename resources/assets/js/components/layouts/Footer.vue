<template>
    <footer class="shadow-sm">
        &copy;俺のTODO 2020 <span v-if="2020 !== year">- {{ year }}</span>
    </footer>
</template>

<script>
export default {
    data() {
        return {
            year: ''
        }
    },
    created() {
        const date = new Date();

        this.year = date.getFullYear();
    }
}
</script>

<style lang="scss">
footer {
    border-radius: 8px;
    background: #f7fff7;
    position: absolute;
    left: 50%;
    bottom: -8px;
    transform: translate(-50%, -50%);
    width: 300px;
    height: 50px;
    text-align: center;
    line-height: 50px;
    z-index: 0;
}
</style>
