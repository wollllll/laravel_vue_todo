<template>
    <Moveable
        class="moveable"
        v-bind="moveable"
        @drag="handleDrag"
        @resize="handleResize"
    >
        <span>Vue Moveable</span>
    </Moveable>
</template>
<script>
import Moveable from 'vue-moveable';

export default {
    name: 'app',
    components: {
        Moveable,
    },
    data() {
        return {
            moveable: {
                draggable: true,
                throttleDrag: 0,
                resizable: true,
                throttleResize: 1,
                keepRatio: false,
                scalable: false,
                throttleScale: 0,
                rotatable: false,
                throttleRotate: 0,
                pinchable: false,
                origin: false,
            }
        }
    },
    methods: {
        handleDrag({target, transform}) {
            target.style.transform = transform;
        },
        handleResize({target, width, height, delta}) {
            delta[0] && (target.style.width = `${width}px`);
            delta[1] && (target.style.height = `${height}px`);
        },
    }
}
</script>
