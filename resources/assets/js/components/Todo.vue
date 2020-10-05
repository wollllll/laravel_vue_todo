<template>
    <div class="card todo shadow-sm" @mouseup="getPosition">
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
        /**
         * 現在の座標取得して更新
         *
         * @param e
         */
        getPosition(e) {
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
    padding: 8px;
    z-index: 1;

    &:hover {
        cursor: grab;
    }

    &:active {
        cursor: grabbing;
    }
}
</style>
