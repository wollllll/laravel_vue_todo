<template>
    <div class="search-box">
        <input
            type="text"
            class="form-control"
            placeholder="検索"
            @keyup="search"
        >
    </div>
</template>

<script>
export default {
    methods: {
        /**
         * 入力した文字を取得
         * @param e
         */
        search(e) {
            this.$emit('search', e.target.value);
        }
    }
}
</script>

<style lang="scss">
.search-box {
    position: absolute;
    top: 16px;
    left: 50%;
    transform: translateX(-50%);
    width: 20%;
    z-index: 10;
}
</style>
