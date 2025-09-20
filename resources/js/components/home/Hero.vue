<script>
import swal from "sweetalert";
export default {
    methods: {
        copyIP() {
            navigator.clipboard.writeText('Revived.club')
                .then(result => {
                    swal("", "Successfully copied to Clipboard")
                })
        }
    }
}
</script>

<template>
    <div class="h-[60vh] flex flex-col justify-center items-center bg-gradient-to-r text-white px-6 text-center">
        <div class="max-w-4xl">
            <h1 class="text-6xl font-extrabold mb-4 drop-shadow-lg">
                Revived.club
            </h1>
            <h2 class="text-4xl font-semibold mb-6 drop-shadow-md">
                Next Generation PVP Practice
            </h2>
            <p class="text-xl mb-8 max-w-xl mx-auto drop-shadow-sm">
                Practice your PVP skills anytime, anywhere — sharpen your reflexes, master new strategies, and dominate the arena.
            </p>

            <div class="flex flex-row gap-4 justify-center">

                <button onclick="window.open('https://discord.gg/8AdP3b6WBU')" class="bg-white px-8 py-3 text-black rounded-sm hover:bg-white/90 transition-colors hover:cursor-pointer">
                    <i class="fa-brands fa-discord"></i>
                    Discord
                </button>

                <button
                    @click="copyIP"
                    class="bg-transparent border-1 border-white/30 px-8 py-3 text-white rounded-sm hover:bg-white/5 transition-colors hover:cursor-pointer">
                    <i class="fa-solid fa-paste"></i>
                    Revived.club
                </button>

            </div>
        </div>
    </div>
</template>

<style scoped></style>
