<script>


export default {
    methods: {
        toggleFAQ(index) {
            this.faqs[index].open = !this.faqs[index].open
        },
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
    }
}

</script>

<template>
    <div class="text-white flex justify-center flex-col gap-10">
        <div class="flex flex-col justify-center mx-auto text-center">
            <h2 class="text-4xl font-semibold drop-shadow-md">
                Why Play on Revived.club?
            </h2>
            <p class="text-xl max-w-xl drop-shadow-sm text-gray-300">
                Discover unique Features and newest Technology.
            </p>
        </div>
        <div class="flex w-1/2 m-auto gap-5">
            <div
                class="flex bg-[#070707] border-1 border-white/30 w-1/3 p-5 rounded-sm hover:bg-white/5 transition-colors">
                <div class="flex flex-col gap-3">
                    <h3 class="text-2xl">Duels, Sandbox & More</h3>
                    <p>Practice your skills in duels, sandbox-fights and against PVP Bots. </p>
                </div>
            </div>
            <div
                class="flex bg-gray-[#070707] border-1 border-white/30 w-1/3 p-5 rounded-sm hover:bg-white/5 transition-colors">
                <div class="flex flex-col gap-3">
                    <h3 class="text-2xl">Custom Biomes</h3>
                    <p>Explore our fully custom-coded biomes and fight others in the cpvp sandbox</p>
                </div>
            </div>
            <div
                class="flex bg-[#070707] border-1 border-white/30 w-1/3 p-5 rounded-sm hover:bg-white/5 transition-colors">
                <div class="flex flex-col gap-3">
                    <h3 class="text-2xl">Newest Technology</h3>
                    <p>Revived.club features various new technologies such as ASWM, PWT and cross-server systems</p>
                </div>
            </div>
        </div>
        <div>
        </div>

        <div class="flex flex-col justify-center mx-auto text-center">
            <h2 class="text-4xl font-semibold drop-shadow-md">
                Frequently Asked Questions
            </h2>
            <p class="text-xl max-w-xl drop-shadow-sm text-gray-300">
                Ask us anything you want to know.
            </p>
        </div>

        <div class="w-1/2 mx-auto space-y-4">
            <div
                v-for="(faq, index) in faqs"
                :key="index"
                class="bg-[#070707] border-b-2 border-white/10 p-4">
                <button
                    @click="toggleFAQ(index)"
                    class="flex justify-between w-full text-left text-lg font-medium">
                    {{ faq.question }}
                    <span
                        class="transition-transform"
                        :class="faq.open ? 'rotate-180' : ''">
            ▼
          </span>
                </button>
                <p v-if="faq.open" class="mt-3 text-gray-300">
                    {{ faq.answer }}
                </p>
            </div>
        </div>
    </div>
</template>
