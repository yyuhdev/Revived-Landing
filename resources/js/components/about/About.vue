<script>
import Header from "../Header.vue";
import Footer from "../Footer.vue";
import Hero from "./Hero.vue";

export default {
    components: {
        Header,
        Footer,
        Hero
    }
}
</script>

<template>
    <Header></Header>
    <Hero></Hero>
    <div class="text-white flex justify-center flex-col gap-10">
        <div class="flex flex-col justify-center mx-auto text-center">
            <h2 class="text-4xl font-semibold drop-shadow-md">
                Our Mission
            </h2>
            <p class="text-xl max-w-xl drop-shadow-sm text-gray-300">
                What drives us forward?
            </p>
        </div>

        <div class="flex w-1/2 m-auto gap-5">
            <div
                class="flex bg-gray border-1 border-white/30 w-1/2 p-5 rounded-sm hover:bg-white/5 transition-colors">
                <div class="flex flex-col gap-3">
                    <h3 class="text-2xl">Quality for Everyone</h3>
                    <p>We aim to eliminate exclusive PVP servers by creating a high-quality, accessible PVP experience
                        for everyone.</p>
                </div>
            </div>
            <div
                class="flex bg-gray border-1 border-white/30 w-1/2 p-5 rounded-sm hover:bg-white/5 transition-colors">
                <div class="flex flex-col gap-3">
                    <h3 class="text-2xl">Redefining PVP Practice</h3>
                    <p>By utilizing the latest technologies, we are transforming PVP and practice servers while adding
                        our own unique twist.</p>
                </div>
            </div>
        </div>



        <div class="flex flex-col justify-center mx-auto text-center">
            <h2 class="text-4xl font-semibold drop-shadow-md">
                How did we start?
            </h2>
            <p class="text-xl max-w-xl drop-shadow-sm text-gray-300">
                How Revived.club started and why we chose a different path.
            </p>
        </div>

        <div class="max-w-2xl mx-auto text-center text-gray-200">
            <p>
                Revived.club began with a simple vision: to do better. While other servers declined, we built our own
                systems, experimented with new ideas, and focused on creating a PVP experience that truly stands out.
            </p>
        </div>
    </div>
    <Footer></Footer>
</template>

<style scoped>

</style>
