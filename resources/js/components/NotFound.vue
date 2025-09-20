<script>
import Footer from "./Footer.vue";
import Header from "./Header.vue";

export default {
    name: "Not Found",
    components: {Header, Footer}
}
</script>

<template>
    <Header></Header>
    <div class="flex flex-col justify-center items-center min-h-[80vh] text-white">
        <p class="text-6xl font-extrabold drop-shadow-lg mb-4">
            404
        </p>
        <p class="text-2xl drop-shadow-md">
            Page could not be found
        </p>
    </div>
    <Footer></Footer>
</template>


<style scoped>

</style>
