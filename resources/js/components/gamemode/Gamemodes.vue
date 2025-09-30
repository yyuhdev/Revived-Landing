<script>
import Footer from "../Footer.vue";
import Header from "../Header.vue";

export default {
    name: "Gamemodes",
    components: {Header, Footer}
}
</script>

<template>
    <Header></Header>
    <div class="p-10 max-w-[1920px]">
        <div class="flex flex-col rounded-sm bg-[#121212] p-4 shadow-md text-white">
            <div class="flex w-1/2">
                <div class="flex flex-row text-2xl gap-3 justify-center">
                    <i class="fa-solid fa-bullseye m-auto"></i>
                    <h1>Practice</h1>
                </div>
            </div>
            <div class="flex w-1/2">

            </div>
        </div>
    </div>
    <Footer></Footer>
</template>

<style scoped>

</style>
