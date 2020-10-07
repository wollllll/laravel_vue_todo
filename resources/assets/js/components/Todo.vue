<template>
    <div
        class="card todo shadow-sm"
        @mouseup="getPosition"
        @mousemove="getMovePosition"
    >
        <p>{{ todo.content }}</p>
    </div>
</template>

<script>
import api from "../api";

export default {
    props: {
        todo: Object,
        trashBoxDom: HTMLDivElement
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

            this.collide(e);
        },
        collide(e) {
            const rectA = this.trashBoxDom.getBoundingClientRect();
            const rectB = e.target.getBoundingClientRect();

            console.log(this.check(rectA, rectB));
        },
        getMovePosition(e) {
            let trashBox = this.trashBoxDom.style;
            const rectA = this.trashBoxDom.getBoundingClientRect();
            const rectB = e.target.getBoundingClientRect();

            this.check(rectA, rectB) ? trashBox.background = '#dc3545' : trashBox.background = '';
        },
        check(rectA, rectB) {
            return rectB.top <= rectA.bottom && rectA.top <= rectB.bottom && rectB.left <= rectA.right && rectA.left <= rectB.right;
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
