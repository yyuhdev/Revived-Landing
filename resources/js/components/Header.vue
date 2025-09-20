<script setup>

</script>

<template>
    <div class="border-b-1 border-gray-200/10 text-white sticky top-0 bg-black z-1 mb-10">
        <div class="max-w-[1950px] flex flex-row p-3 justify-center">
            <div class="flex flex-row w-1/2 gap-5">
                <img src="./img/logo.png" class="max-h-10" alt="Revived.club Logo">
                <div class="relative flex items-center">
                    <input
                        class="border-2 border-gray-200/10 rounded-xl h-8 p-4 pl-9 focus:outline-none font-sm relative"
                        placeholder="Search for Player..."
                    >
                    <i class="fa-solid fa-magnifying-glass absolute left-3 top-[20px] text-gray-200/40 -translate-y-1/2"></i>
                </div>

            </div>
            <div class="flex flex-row-reverse w-1/2 gap-2 m-auto">
                <button onclick="window.open('https://discord.gg/8AdP3b6WBU')" class="bg-white px-3 py-1 text-black rounded-sm hover:bg-white/90 transition-colors hover:cursor-pointer">
                    <i class="fa-brands fa-discord"></i>
                    Discord
                </button>

                <router-link to="/about" class="hover:text-white px-3 py-1 rounded-sm hover:bg-[#d6ebfd30] text-white/90 transition-colors hover:cursor-pointer">
                    About Us
                </router-link>

                <router-link class="hover:text-white px-3 py-1 rounded-sm hover:bg-[#d6ebfd30] text-white/90 transition-colors hover:cursor-pointer" to="/apply">
                    Apply
                </router-link>

                <router-link to="/" class="hover:text-white px-3 py-1 rounded-sm hover:bg-[#d6ebfd30] text-white/90 transition-colors hover:cursor-pointer">
                    Home
                </router-link>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
