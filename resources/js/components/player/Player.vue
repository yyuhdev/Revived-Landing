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

            this.name = newName;
            this.getUUID();
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
            loadingError: false,
            skinLink: 'https://visage.surgeplay.com/full/316/',
        }
    },
    methods: {
        getUUID() {
            axios.get('/api/player/profile/' + this.name)
                .then(result => {
                    if (result.data.errorMessage) {
                        this.loadingError = true;
                        return;
                    }
                    this.uuid = result.data.id;
                })
                .catch(() => {
                    this.loadingError = true;
                });
        },
        getStats() {
            axios.get('/api/stats/' + this.uuid)
                .then(result => {
                    this.kills = result.data.kills;
                    this.deaths = result.data.deaths;
                    this.wins = result.data.wins;
                    this.losses = result.data.losses;
                })
        },
    },
    mounted() {
        this.name = this.$route.params.name;
        this.getUUID();
        this.getStats();
    }
}

</script>

<template>
    <Header></Header>
    <div class="text-white flex flex-col gap-10 items-center min-h-[90vh] mt-10">

        <div v-if="uuid && name"
             class="flex bg-[#070707] border border-white/20 rounded-lg p-6 gap-6 w-3/4 md:w-1/2 shadow-lg">
            <div class="flex justify-center items-center">
                <img
                    alt="Skin"
                    class="rounded-md shadow-md"
                    :src="this.skinLink + this.uuid">
            </div>

            <div class="flex flex-col justify-center gap-3 text-lg w-full">
                <p class="flex justify-between border-b border-white/10 pb-1">
                    <span class="text-gray-300">Kills</span>
                    <span class="font-semibold">{{ this.kills }}</span>
                </p>
                <p class="flex justify-between border-b border-white/10 pb-1">
                    <span class="text-gray-300">Deaths</span>
                    <span class="font-semibold">{{ this.deaths }}</span>
                </p>
                <p class="flex justify-between border-b border-white/10 pb-1">
                    <span class="text-gray-300">Wins</span>
                    <span class="font-semibold">{{ this.wins }}</span>
                </p>
                <p class="flex justify-between">
                    <span class="text-gray-300">Losses</span>
                    <span class="font-semibold">{{ this.losses }}</span>
                </p>
            </div>
        </div>
        <div v-else-if="loadingError">
            <div class="flex flex-col justify-center items-center min-h-[90vh] text-white">
                <p class="text-6xl font-extrabold drop-shadow-lg mb-4">
                    503
                </p>
                <p class="text-2xl drop-shadow-md">
                    There has been an Error when trying to fetch Player
                </p>
            </div>
        </div>
        <div v-else>
            <div class="loader"></div>
        </div>
    </div>
    <Footer></Footer>
</template>

<style scoped>
.loader {
    border: 6px solid rgba(255, 255, 255, 0.2);
    border-top: 6px solid white;
    border-radius: 50%;
    width: 48px;
    height: 48px;
    animation: spin 1s linear infinite;
    position: absolute;
    top: 50%;
    left: 50%;
}

@keyframes spin {
    to {
        transform: rotate(360deg);
    }
}
</style>
