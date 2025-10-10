<script>
import Header from "../Header.vue";
import Footer from "../Footer.vue";

// TODO: Impl Player name getting
export default {
    name: "Leaderboard",
    components: {
        Header,
        Footer,
    },
    data() {
        return {
            leaderboard: null,
            loading: true,
            error: null,
            sortBy: 'kills'
        }
    },
    computed: {
        sortedLeaderboard() {
            if (!this.leaderboard) return [];

            const data = [...this.leaderboard];

            return data.sort((a, b) => {
                if (this.sortBy === 'kills') {
                    return b.kills - a.kills;
                }
                if (this.sortBy === 'wins') {
                    return b.wins - a.wins;
                }
                return 0;
            });
        }
    },
    methods: {
        loadLeaderboard() {
            this.loading = true;
            this.error = null;

            axios.get("/api/stats/global")
                .then(result => {
                    console.log(result);
                    this.leaderboard = result.data;
                    this.loading = false;
                })
                .catch(err => {
                    console.error(err);
                    this.error = "Failed to load leaderboard data";
                    this.loading = false;
                });
        },
        calculateKD(kills, deaths) {
            if (deaths === 0) return kills.toFixed(2);
            return (kills / deaths).toFixed(2);
        },
        setSortBy(sortType) {
            this.sortBy = sortType;
        },
    },
    mounted() {
        this.loadLeaderboard();
    }
}
</script>

<template>
    <Header></Header>

    <div class="min-h-screen">
        <div v-if="!loading" class="text-white flex flex-col justify-center gap-10 py-12 px-4">
            <div v-if="!loading && !error && sortedLeaderboard.length > 0" class="flex flex-wrap justify-center gap-3 max-w-4xl mx-auto w-full">
                <button
                    @click="setSortBy('kills')"
                    :class="sortBy === 'kills' ? 'bg-white/10' : 'bg-[#070707]'"
                    class="border border-white/30 px-6 py-2 rounded-sm hover:bg-white/5 transition-colors">
                    Sort by Kills
                </button>
                <button
                    @click="setSortBy('wins')"
                    :class="sortBy === 'wins' ? 'bg-white/10' : 'bg-[#070707]'"
                    class="border border-white/30 px-6 py-2 rounded-sm hover:bg-white/5 transition-colors">
                    Sort by Wins
                </button>
            </div>

            <div v-if="error" class="text-center text-red-400 text-xl">
                {{ error }}
            </div>

            <div v-if="!loading && !error && sortedLeaderboard.length > 0" class="max-w-6xl w-full mx-auto">
                <div class="bg-[#070707] border border-white/30 rounded-sm overflow-hidden">
                    <div class="grid grid-cols-6 gap-4 p-4 border-b border-white/20 font-semibold text-sm sm:text-base">
                        <div class="text-left">Rank</div>
                        <div class="text-left">Player</div>
                        <div class="text-center">Kills</div>
                        <div class="text-center">Deaths</div>
                        <div class="text-center">K/D</div>
                        <div class="text-center">Wins</div>
                    </div>

                    <div
                        v-for="(player, index) in sortedLeaderboard.slice(0, 10)"
                        :key="player.uuid"
                        class="grid grid-cols-6 gap-4 p-4 border-b border-white/10 hover:bg-white/5 transition-colors items-center"
                    >
                        <div class="text-left font-semibold text-lg">
                            #{{ index + 1 }}
                        </div>
                        <div class="text-left text-gray-300 truncate text-sm sm:text-base">
                            {{ player.uuid.substring(0, 8) }}...
                        </div>
                        <div class="text-center text-green-400 font-semibold">
                            {{ player.kills }}
                        </div>
                        <div class="text-center text-red-400 font-semibold">
                            {{ player.deaths }}
                        </div>
                        <div class="text-center text-blue-400 font-semibold">
                            {{ calculateKD(player.kills, player.deaths) }}
                        </div>
                        <div class="text-center text-yellow-400 font-semibold">
                            {{ player.wins }}
                        </div>
                    </div>

                </div>
            </div>

            <div v-if="!loading && !error && sortedLeaderboard.length === 0" class="text-center text-gray-300 text-xl">
                No players found on the leaderboard.
            </div>

            <div v-if="!loading && !error && sortedLeaderboard.length > 0"
                 class="grid grid-cols-1 sm:grid-cols-3 gap-8 max-w-4xl w-full mx-auto mt-8 pt-8">
                <div class="flex flex-col text-center">
                    <h2 class="text-5xl sm:text-6xl md:text-7xl font-bold mb-2">
                        {{ sortedLeaderboard.length }}
                    </h2>
                    <p class="text-gray-300 text-lg sm:text-xl">
                        Total Players
                    </p>
                </div>

                <div class="flex flex-col text-center">
                    <h2 class="text-5xl sm:text-6xl md:text-7xl font-bold mb-2">
                        {{ sortedLeaderboard.reduce((sum, p) => sum + p.kills, 0) }}
                    </h2>
                    <p class="text-gray-300 text-lg sm:text-xl">
                        Total Kills
                    </p>
                </div>

                <div class="flex flex-col text-center">
                    <h2 class="text-5xl sm:text-6xl md:text-7xl font-bold mb-2">
                        {{ sortedLeaderboard.reduce((sum, p) => sum + p.wins, 0) }}
                    </h2>
                    <p class="text-gray-300 text-lg sm:text-xl">
                        Total Wins
                    </p>
                </div>
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
    0% { background-size: 10px 3px;}
    16% { background-size: 10px 50px, 10px 3px, 10px 3px, 10px 3px, 10px 3px, 10px 3px}
    33% { background-size: 10px 30px, 10px 50px, 10px 3px, 10px 3px, 10px 3px, 10px 3px}
    50% { background-size: 10px 10px, 10px 30px, 10px 50px, 10px 3px, 10px 3px, 10px 3px}
    66% { background-size: 10px 3px, 10px 10px, 10px 30px, 10px 50px, 10px 3px, 10px 3px}
    83% { background-size: 10px 3px, 10px 3px,  10px 10px, 10px 30px, 10px 50px, 10px 3px}
    100% { background-size: 10px 3px, 10px 3px, 10px 3px,  10px 10px, 10px 30px, 10px 50px}
}


</style>
