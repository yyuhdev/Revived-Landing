<script>
export default {
    data() {
        return {
            searchQuery: null,
            menuOpen: false
        }
    },
    methods: {
        search() {
            this.searchQuery = document.getElementById('searchBar').value;

            if (this.menuOpen) {
                this.searchQuery = document.getElementById('mobileSearchBar').value;
            }

            if (this.searchQuery) this.$router.push('/player/' + this.searchQuery);
        },
        toggleMenu() {
            this.menuOpen = !this.menuOpen;
        }
    }
}
</script>

<template>
    <div class="border-b border-gray-200/10 text-white sticky top-0 bg-black z-50">
        <div class="max-w-[1950px] m-auto flex flex-row p-3 justify-between items-center relative">
            <div :class="{'hidden': menuOpen}" class="flex items-center gap-5">
                <router-link to="/">
                    <img src="./img/logo.png" class="max-h-10" alt="Revived.club Logo">
                </router-link>

                <div class="relative hidden sm:flex items-center">
                    <input
                        v-on:keyup.enter="search"
                        id="searchBar"
                        autofocus
                        class="border-2 border-gray-200/10 rounded-xl h-8 p-4 pl-9 focus:outline-none font-sm"
                        placeholder="Search for Player..."
                    >
                    <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-gray-200/40"></i>
                </div>
            </div>

            <button
                @click="toggleMenu"
                class="sm:hidden text-white text-xl"
                :class="menuOpen ? 'absolute top-3 left-3 z-50' : ''"
            >
                <i :class="menuOpen ? 'fa-solid fa-xmark' : 'fa-solid fa-bars'"></i>
            </button>

            <div
                :class="{'flex': menuOpen, 'hidden': !menuOpen}"
                class="flex-col sm:flex-row sm:flex gap-2 w-full sm:w-auto mt-3 sm:mt-0 sm:items-center ml-auto"
            >

                <router-link to="/"
                             class="hover:text-white px-3 py-1 rounded-sm hover:bg-[#d6ebfd30] text-white/90 transition-colors w-full sm:w-auto text-center">
                    Home
                </router-link>

                <router-link to="/leaderboard"
                             class="hover:text-white px-3 py-1 rounded-sm hover:bg-[#d6ebfd30] text-white/90 transition-colors w-full sm:w-auto text-center">
                    Leaderboard
                </router-link>

                <router-link to="/apply"
                             class="hover:text-white px-3 py-1 rounded-sm hover:bg-[#d6ebfd30] text-white/90 transition-colors w-full sm:w-auto text-center">
                    Apply
                </router-link>

                <button onclick="window.open('https://discord.gg/8AdP3b6WBU')"
                        class="bg-white px-3 py-1 text-black rounded-sm hover:bg-white/90 transition-colors w-full sm:w-auto text-center">
                    <i class="fa-brands fa-discord"></i> Discord
                </button>
            </div>
        </div>

        <div class="sm:hidden relative p-3" :class="{'flex': menuOpen, 'hidden': !menuOpen}">
            <input
                v-on:keyup.enter="search"
                id="mobileSearchBar"
                class="border-2 border-gray-200/10 rounded-xl h-8 w-full p-4 pl-9 focus:outline-none font-sm"
                placeholder="Search for Player..."
            >
            <i class="fa-solid fa-magnifying-glass absolute left-6 top-1/2 -translate-y-1/2 text-gray-200/40"></i>
        </div>
    </div>
</template>


<style scoped>
</style>
