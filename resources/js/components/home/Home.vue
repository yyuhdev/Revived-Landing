<script>
import Header from "../Header.vue";
import Hero from "./Hero.vue";
import Footer from "../Footer.vue";
import swal from "sweetalert";

export default {
    components: {
        Hero,
        Footer,
        Header,
    },
    data() {
        return {
            faqs: [
                {
                    question: "What is Revived.club?",
                    answer: "Revived.club is a PVP Practice Server offering various Gamemodes via Duels and a big Sandbox.",
                    open: false,
                },
                {
                    question: "How can I join the server?",
                    answer: "Simply connect to our server using the IP: revived.club. No mods are required to start!",
                    open: false,
                },
                {
                    question: "Is Revived.club free to play?",
                    answer: "Yes, it is completely free to play!",
                    open: false,
                },
            ]
        }
    },
    methods: {
        toggleFAQ(index) {
            this.faqs[index].open = !this.faqs[index].open;
        },
        copyIP() {
            navigator.clipboard.writeText('Revived.club')
                .then(() => {
                    swal("", "Successfully copied to Clipboard");
                });
        }
    }
}
</script>

<template>
    <Header></Header>

    <Hero></Hero>

    <div class="text-white flex flex-col justify-center gap-10 py-12 px-4">
        <div class="flex flex-col justify-center mx-auto text-center">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-semibold drop-shadow-md mb-2">
                Why Play on Revived.club?
            </h2>
            <p class="text-lg sm:text-xl max-w-xl drop-shadow-sm text-gray-300 mx-auto">
                Discover unique Features and newest Technology.
            </p>
        </div>

        <div class="flex flex-col md:flex-row w-full md:w-1/2 mx-auto gap-5">
            <div
                class="flex bg-[#070707] border border-white/30 w-full md:w-1/3 p-5 rounded-sm hover:bg-white/5 transition-colors">
                <div class="flex flex-col gap-3">
                    <h3 class="text-xl sm:text-2xl font-semibold">Duels, Sandbox & More</h3>
                    <p class="text-gray-300">Practice your skills in duels, sandbox-fights and against PVP Bots.</p>
                </div>
            </div>

            <div
                class="flex bg-[#070707] border border-white/30 w-full md:w-1/3 p-5 rounded-sm hover:bg-white/5 transition-colors">
                <div class="flex flex-col gap-3">
                    <h3 class="text-xl sm:text-2xl font-semibold">Custom Biomes</h3>
                    <p class="text-gray-300">Explore our fully custom-coded biomes and fight others in the cpvp
                        sandbox.</p>
                </div>
            </div>

            <div
                class="flex bg-[#070707] border border-white/30 w-full md:w-1/3 p-5 rounded-sm hover:bg-white/5 transition-colors">
                <div class="flex flex-col gap-3">
                    <h3 class="text-xl sm:text-2xl font-semibold">Newest Technology</h3>
                    <p class="text-gray-300">Revived.club features various new technologies such as ASWM, PWT and
                        cross-server systems.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-col justify-center mx-auto text-center py-12 px-4 text-white">
        <h2 class="text-2xl sm:text-3xl md:text-4xl font-semibold drop-shadow-md mb-2">
            Frequently Asked Questions
        </h2>
        <p class="text-lg sm:text-xl max-w-xl drop-shadow-sm text-gray-300 mx-auto mb-6">
            Ask us anything you want to know.
        </p>

        <div class="w-full sm:w-4/5 md:w-1/2 mx-auto space-y-4">
            <div v-for="(faq, index) in faqs" :key="index"
                 class="bg-[#070707] border-b-2 border-white/10 p-4 rounded-sm text-white">
                <button @click="toggleFAQ(index)"
                        class="flex justify-between w-full text-left text-lg font-medium">
                    {{ faq.question }}
                    <span :class="faq.open ? 'rotate-180 transition-transform' : 'transition-transform'">▼</span>
                </button>
                <p v-if="faq.open" class="mt-3 text-gray-300 text-left">
                    {{ faq.answer }}
                </p>
            </div>
        </div>
    </div>

    <div class="text-white flex flex-col justify-center gap-10 py-12 px-4">
        <div class="flex flex-col justify-center mx-auto text-center">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-semibold drop-shadow-md mb-2">
                Our Server and Gamemodes
            </h2>
            <p class="text-lg sm:text-xl max-w-xl drop-shadow-sm text-gray-300 mx-auto">
                Discover unique Features and newest Technology.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 max-w-4xl w-full mx-auto gap-5">
            <div class="flex bg-[#070707] border border-white/30 w-full p-5 rounded-sm hover:bg-white/5 transition-colors cursor-pointer">
                <div class="flex flex-col gap-3">
                    <h3 class="text-xl sm:text-2xl font-semibold">Duels</h3>
                    <p class="text-gray-300">Compete with others in various Gamemodes.</p>
                </div>
            </div>

            <div class="flex bg-[#070707] border border-white/30 w-full p-5 rounded-sm hover:bg-white/5 transition-colors cursor-pointer">
                <div class="flex flex-col gap-3">
                    <h3 class="text-xl sm:text-2xl font-semibold">Custom Kits</h3>
                    <p class="text-gray-300">Create custom PVP Kits to fight others.</p>
                </div>
            </div>

            <div class="flex bg-[#070707] border border-white/30 w-full p-5 rounded-sm hover:bg-white/5 transition-colors cursor-pointer">
                <div class="flex flex-col gap-3">
                    <h3 class="text-xl sm:text-2xl font-semibold">MCTiers Biomes</h3>
                    <p class="text-gray-300">Fight others in every MCTiers Biome.</p>
                </div>
            </div>

            <div class="flex bg-[#070707] border border-white/30 w-full p-5 rounded-sm hover:bg-white/5 transition-colors cursor-pointer">
                <div class="flex flex-col gap-3">
                    <h3 class="text-xl sm:text-2xl font-semibold">Practice Bots</h3>
                    <p class="text-gray-300">Practice your skills using Practice Bots.</p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 max-w-4xl w-full mx-auto mt-8 pt-8">
            <div class="flex flex-col text-center">
                <h2 class="text-5xl sm:text-6xl md:text-7xl font-bold mb-2">
                    15+
                </h2>
                <p class="text-gray-300 text-lg sm:text-xl">
                    Active Players
                </p>
            </div>

            <div class="flex flex-col text-center">
                <h2 class="text-5xl sm:text-6xl md:text-7xl font-bold mb-2">
                    10+
                </h2>
                <p class="text-gray-300 text-lg sm:text-xl">
                    Different Gamemodes
                </p>
            </div>

            <div class="flex flex-col text-center">
                <h2 class="text-5xl sm:text-6xl md:text-7xl font-bold mb-2">
                    1k+
                </h2>
                <p class="text-gray-300 text-lg sm:text-xl">
                    Played Matches
                </p>
            </div>
        </div>
    </div>

    <Footer></Footer>
</template>

<style scoped>
</style>
