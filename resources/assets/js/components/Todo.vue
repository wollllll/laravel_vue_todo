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

            this.isTodoOnTrashBox(e);
        },
        /**
         * ゴミ箱の上にTODOが見る
         */
        isTodoOnTrashBox(e) {
            const rectA = this.trashBoxDom.getBoundingClientRect();
            const rectB = e.target.getBoundingClientRect();

            // todo delete処理はDeleteコンポーネントに移した方がいいかも

            /**
             * TODOがゴミ箱に重なったら削除処理実行
             */
            if (this.isOverlap(rectA, rectB)) {
                api.todo.delete(this.todo.id)
                    .then(response => {
                        console.log('success');
                        this.$emit('get-delete-todo', response.data.todo);
                    })
                    .catch(() => {
                        console.log('fail');
                    });
            }
        },
        /**
         * 移動中の座標取得
         */
        getMovePosition(e) {
            let trashBox = this.trashBoxDom.style;
            const rectA = this.trashBoxDom.getBoundingClientRect();
            const rectB = e.target.getBoundingClientRect();

            this.isOverlap(rectA, rectB) ? trashBox.background = '#dc3545' : trashBox.background = '';
        },
        /**
         * TODOがゴミ箱の上に重なってるか判定
         *
         * @param rectA
         * @param rectB
         * @returns {boolean}
         */
        isOverlap(rectA, rectB) {
            return rectB.top <= rectA.bottom &&
                rectA.top <= rectB.bottom &&
                rectB.left <= rectA.right &&
                rectA.left <= rectB.right;
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
