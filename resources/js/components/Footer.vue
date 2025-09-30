<script>
</script>

<template>
    <footer class="border-t border-gray-700/50 text-white mt-10">
        <div
            class="max-w-[1950px] mx-auto flex flex-col md:flex-row justify-between items-start md:items-center p-3 gap-5 relative">
            <div class="flex flex-col gap-2">
                <div class="flex flex-col">
                    <p class="text-lg font-bold">Revived.club</p>
                    <p class="text-gray-400 text-sm">Next Generation PVP Practice</p>
                </div>
            </div>

            <div class="absolute left-1/2 bottom-1 transform -translate-x-1/2 text-gray-400 text-sm">
                <p>{{ new Date().getFullYear() }} © Revived.club</p>
            </div>


            <div class="flex flex-row gap-2">
                <router-link to="/"
                             class="hover:text-white px-3 py-1 rounded-sm hover:bg-[#d6ebfd30] text-white/90 transition-colors hover:cursor-pointer">
                    Home
                </router-link>

                <router-link to="/apply"
                             class="hover:text-white px-3 py-1 rounded-sm hover:bg-[#d6ebfd30] text-white/90 transition-colors hover:cursor-pointer">
                    Apply
                </router-link>

                <router-link to="/about"
                             class="hover:text-white px-3 py-1 rounded-sm hover:bg-[#d6ebfd30] text-white/90 transition-colors hover:cursor-pointer">
                    About Us
                </router-link>

                <button onclick="window.open('https://discord.gg/8AdP3b6WBU')"
                        class="bg-white px-3 py-1 text-black rounded-sm hover:bg-white/90 transition-colors hover:cursor-pointer">
                    <i class="fa-brands fa-discord"></i>
                    Discord
                </button>
            </div>
        </div>
    </footer>
</template>
