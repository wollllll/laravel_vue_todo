<template>
    <div
        @mousedown="clickTarget"
        style="height: 150px; width: 150px; background: red">
        aaaaa
    </div>
</template>
<script>

export default {
    name: 'app',
    data() {
        return {
            isMoving: false,
            positionX: 0,
            positionY: 0
        }
    },
    methods: {
        clickTarget: (e) => {
            
        }
    }
}
</script>
