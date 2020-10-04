<template>
    <div class="content">
        <Header/>
        <main>
            <slot></slot>
        </main>
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
    color: #252525;

    main {
        background: #fff;
        height: 100vh;
    }
}
</style>
