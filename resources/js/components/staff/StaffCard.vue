<script>
export default {
    name: "StaffCard",
    props: {
        name: String,
        role: String
    }
}
</script>

<template>
    <div class="bg-[#070707] border border-white/30 rounded-sm overflow-hidden">
        <div class="p-3 pb-0 flex justify-center bg-black/30 border border-white/10 rounded-sm">
            <img
                class="max-w-48"
                :src="`https://visage.surgeplay.com/bust/${name}`"
                :alt="`${name} avatar`"
            >
        </div>
        <div class="p-4">
            <h3 class="text-2xl mb-1 font-semibold">{{ name }}</h3>
            <div class="text-lg text-gray-300">{{ role }}</div>
        </div>
    </div>
</template>
