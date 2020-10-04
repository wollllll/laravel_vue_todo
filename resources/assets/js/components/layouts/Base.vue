<template>
    <div class="content">
        <Header/>
        <slot></slot>
        <Footer/>
    </div>
</template>

<script>
import Header from "./Header";
import Footer from "./Footer";

export default {
    components: {
        Header,
        Footer
    }
}
</script>

<style lang="scss">
.content {
    position: relative;
    height: 100vh;
    color: #252525;
}
</style>
