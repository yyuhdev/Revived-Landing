<script>
import Header from "../Header.vue";
import Footer from "../Footer.vue";

export default {
    components: {
        Header,
        Footer
    },
    watch: {
        '$route.params.name'(newName) {
            this.kills = null;
            this.deaths = null;
            this.wins = null;
            this.losses = null;
            this.uuid = null;
            this.loadingError = false;
            this.loaded = false;
            this.punishments = [];

            this.name = newName;
            this.getStats();
        }
    },
    data() {
        return {
            kills: null,
            deaths: null,
            wins: null,
            losses: null,
            kda: null,
            uuid: null,
            name: null,
            loaded: false,
            loadingError: false,
            punishments: [],
            skinLink: 'https://visage.surgeplay.com/full/316/',
            headLink: 'https://visage.surgeplay.com/face/60/',
        }
    },
    computed: {
        kdRatio() {
            if (!this.deaths || this.deaths === 0) return this.kills || 0;
            return (this.kills / this.deaths).toFixed(2);
        },
        wlRatio() {
            if (!this.losses || this.losses === 0) return this.wins || 0;
            return (this.wins / this.losses).toFixed(2);
        },
        totalGames() {
            return (this.wins || 0) + (this.losses || 0);
        },
        winRate() {
            if (this.totalGames === 0) return 0;
            return ((this.wins / this.totalGames) * 100).toFixed(1);
        }
    },
    methods: {
        getStats() {
            axios.get('/api/player/profile/' + this.name)
                .then(result => {
                    if (result.data.errorMessage) {
                        this.loadingError = true;
                        return;
                    }
                    this.uuid = this.formatUUID(result.data.id);
                    axios.get('/api/stats/' + this.uuid)
                        .then(result => {
                            this.kills = result.data.kills;
                            this.deaths = result.data.deaths;
                            this.wins = result.data.wins;
                            this.losses = result.data.losses;
                            this.loaded = true;
                        });

                    axios.get('/api/punishments/' + this.uuid)
                        .then(result => {
                            this.punishments = result.data;
                        });
                })
                .catch(() => {
                    this.loadingError = true;
                });
        },
        formatUUID(uuid) {
            if (uuid.length !== 32) {
                return null;
            }
            return (
                uuid.substring(0, 8) + '-' +
                uuid.substring(8, 12) + '-' +
                uuid.substring(12, 16) + '-' +
                uuid.substring(16, 20) + '-' +
                uuid.substring(20)
            );
        },
    },
    mounted() {
        this.name = this.$route.params.name;
        this.getStats();
    }
}
</script>

<template>
    <Header></Header>

    <div class="text-white min-h-[100vh] py-8 px-4">
        <div v-if="loaded" class="max-w-6xl mx-auto">

            <div class="flex flex-col gap-5">

                <div class="flex-shrink-0 flex gap-5">
                    <img
                        alt="Head"
                        class="rounded-md shadow-lg h-auto"
                        :src="this.headLink + this.uuid">

                    <div class="flex flex-col my-auto">
                        <p class="text-2xl font-semibold">{{ this.name }}</p>
                        <p class="text-gray-400 text-sm">{{ this.uuid }}</p>
                    </div>
                </div>

                <div>
                    <div class="bg-[#070707] border border-white/30 rounded-sm p-6 mb-6">
                        <div class="flex flex-col md:flex-row gap-8 items-center md:items-start">
                            <div class="flex-shrink-0">
                                <img
                                    alt="Skin"
                                    class="rounded-md shadow-lg w-48 h-auto"
                                    :src="this.skinLink + this.uuid">
                            </div>

                            <div class="flex-grow w-full">
                                <h3 class="text-2xl font-semibold mb-4 text-center md:text-left">Combat Statistics</h3>
                                <div class="grid grid-cols-2 gap-4">
                                    <div
                                        class="bg-black/30 border border-white/10 p-4 rounded-sm hover:bg-white/5 transition-colors">
                                        <p class="text-gray-400 text-sm mb-1">Kills</p>
                                        <p class="text-3xl font-bold">{{ this.kills ?? 0 }}</p>
                                    </div>
                                    <div
                                        class="bg-black/30 border border-white/10 p-4 rounded-sm hover:bg-white/5 transition-colors">
                                        <p class="text-gray-400 text-sm mb-1">Deaths</p>
                                        <p class="text-3xl font-bold">{{ this.deaths ?? 0 }}</p>
                                    </div>
                                    <div
                                        class="bg-black/30 border border-white/10 p-4 rounded-sm hover:bg-white/5 transition-colors">
                                        <p class="text-gray-400 text-sm mb-1">Wins</p>
                                        <p class="text-3xl font-bold">{{ this.wins ?? 0 }}</p>
                                    </div>
                                    <div
                                        class="bg-black/30 border border-white/10 p-4 rounded-sm hover:bg-white/5 transition-colors">
                                        <p class="text-gray-400 text-sm mb-1">Losses</p>
                                        <p class="text-3xl font-bold">{{ this.losses ?? 0 }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                        <div
                            class="bg-[#070707] border border-white/30 p-5 rounded-sm hover:bg-white/5 transition-colors text-center">
                            <p class="text-gray-400 text-sm mb-2">K/D Ratio</p>
                            <p class="text-4xl font-bold">{{ kdRatio }}</p>
                        </div>
                        <div
                            class="bg-[#070707] border border-white/30 p-5 rounded-sm hover:bg-white/5 transition-colors text-center">
                            <p class="text-gray-400 text-sm mb-2">W/L Ratio</p>
                            <p class="text-4xl font-bold">{{ wlRatio }}</p>
                        </div>
                        <div
                            class="bg-[#070707] border border-white/30 p-5 rounded-sm hover:bg-white/5 transition-colors text-center">
                            <p class="text-gray-400 text-sm mb-2">Total Games</p>
                            <p class="text-4xl font-bold">{{ totalGames }}</p>
                        </div>
                        <div
                            class="bg-[#070707] border border-white/30 p-5 rounded-sm hover:bg-white/5 transition-colors text-center">
                            <p class="text-gray-400 text-sm mb-2">Win Rate</p>
                            <p class="text-4xl font-bold">{{ winRate }}%</p>
                        </div>
                    </div>

                    <div v-if="punishments.length" class="bg-[#070707] border border-white/30 rounded-sm p-6">
                        <h3 class="text-2xl font-semibold mb-4 text-center md:text-left">Punishment History</h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div
                                v-for="punishment in punishments"
                                :key="punishment.id"
                                class="bg-black/30 border border-white/10 rounded-sm p-4 hover:bg-white/5 transition-colors"
                            >
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-gray-300 font-semibold">{{ punishment.reason }}</span>
                                    <span
                                        class="px-2 py-1 text-xs rounded-sm font-medium"
                                        :class="punishment.active ? 'bg-red-600/70 text-white' : 'bg-green-600/70 text-white'"
                                    >
                    {{ punishment.active ? 'Active' : 'Removed' }}
                </span>
                                </div>

                                <p class="text-sm text-gray-400 mb-1">
                                    <span class="font-medium text-gray-300">Banned by:</span>
                                    {{ punishment.banned_by_name }}
                                </p>

                                <p class="text-sm text-gray-400 mb-1">
                                    <span class="font-medium text-gray-300">From:</span>
                                    {{ new Date(punishment.time).toLocaleString() }}
                                </p>

                                <p class="text-sm text-gray-400 mb-1">
                                    <span class="font-medium text-gray-300">Until:</span>
                                    {{ new Date(punishment.until).toLocaleString() }}
                                </p>

                                <div v-if="punishment.removed_by_reason" class="mt-2 text-xs text-gray-500 italic">
                                    Removed by {{ punishment.removed_by_name }}: {{ punishment.removed_by_reason }}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div v-else-if="loadingError" class="flex flex-col justify-center items-center min-h-[60vh] max-w-2xl mx-auto">
            <div class="text-center">
                <p class="text-6xl font-extrabold drop-shadow-lg mb-4">
                    503
                </p>
                <p class="text-2xl drop-shadow-md mb-2">
                    Unable to Fetch Player Data
                </p>
                <p class="text-gray-400">
                    There was an error retrieving the player profile. Please try again later.
                </p>
            </div>
        </div>

        <div v-else class="flex justify-center items-center min-h-[60vh]">
            <div class="loader"></div>
        </div>
    </div>

    <Footer></Footer>
</template>

<style scoped>

.loader {
    position: relative;
    width: 85px;
    height: 50px;
    background-repeat: no-repeat;
    background-image: linear-gradient(#FFF 50px, transparent 0),
    linear-gradient(#FFF 50px, transparent 0),
    linear-gradient(#FFF 50px, transparent 0),
    linear-gradient(#FFF 50px, transparent 0),
    linear-gradient(#FFF 50px, transparent 0),
    linear-gradient(#FFF 50px, transparent 0);
    background-position: 0px center, 15px center, 30px center, 45px center, 60px center, 75px center, 90px center;
    animation: rikSpikeRoll 0.65s linear infinite alternate;
}

@keyframes rikSpikeRoll {
    0% {
        background-size: 10px 3px;
    }
    16% {
        background-size: 10px 50px, 10px 3px, 10px 3px, 10px 3px, 10px 3px, 10px 3px
    }
    33% {
        background-size: 10px 30px, 10px 50px, 10px 3px, 10px 3px, 10px 3px, 10px 3px
    }
    50% {
        background-size: 10px 10px, 10px 30px, 10px 50px, 10px 3px, 10px 3px, 10px 3px
    }
    66% {
        background-size: 10px 3px, 10px 10px, 10px 30px, 10px 50px, 10px 3px, 10px 3px
    }
    83% {
        background-size: 10px 3px, 10px 3px, 10px 10px, 10px 30px, 10px 50px, 10px 3px
    }
    100% {
        background-size: 10px 3px, 10px 3px, 10px 3px, 10px 10px, 10px 30px, 10px 50px
    }
}


</style>
