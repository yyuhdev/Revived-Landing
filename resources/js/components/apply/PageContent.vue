<script>
export default {
    data() {
        return {
            form: {
                username: "",
                discord: "",
                age: "",
                reason: "",
                experience: "",
                availability: ""
            },
            submitted: false
        }
    },
    methods: {
        submitForm() {
            this.submitted = true
            console.log("Application submitted:", this.form)
        }
    }
}
</script>

<template>
    <div class="text-white flex justify-center flex-col gap-10">
        <div class="w-1/2 mx-auto bg-[#070707] border border-white/20 rounded-lg p-8">
            <form @submit.prevent="submitForm" class="flex flex-col gap-6">
                <div>
                    <label class="block text-gray-300 mb-2">Minecraft Username</label>
                    <input v-model="form.username" type="text" required
                           class="w-full bg-black/30 border border-white/20 rounded px-3 py-2 focus:outline-none focus:border-white/50">
                </div>

                <div>
                    <label class="block text-gray-300 mb-2">Discord Tag</label>
                    <input v-model="form.discord" type="text" required
                           placeholder="Example#1234"
                           class="w-full bg-black/30 border border-white/20 rounded px-3 py-2 focus:outline-none focus:border-white/50">
                </div>

                <div>
                    <label class="block text-gray-300 mb-2">Age</label>
                    <input v-model="form.age" type="number" required min="16"
                           class="w-full bg-black/30 border border-white/20 rounded px-3 py-2 focus:outline-none focus:border-white/50">
                </div>

                <div>
                    <label class="block text-gray-300 mb-2">Why do you want to join the staff team?</label>
                    <textarea v-model="form.reason" rows="3" required
                              class="w-full bg-black/30 border border-white/20 rounded px-3 py-2 focus:outline-none focus:border-white/50"></textarea>
                </div>

                <div>
                    <label class="block text-gray-300 mb-2">Previous experience</label>
                    <textarea v-model="form.experience" rows="3"
                              class="w-full bg-black/30 border border-white/20 rounded px-3 py-2 focus:outline-none focus:border-white/50"></textarea>
                </div>

                <div>
                    <label class="block text-gray-300 mb-2">How active can you be?</label>
                    <input v-model="form.availability" type="text" required
                           placeholder="e.g. 2-3 hours per day"
                           class="w-full bg-black/30 border border-white/20 rounded px-3 py-2 focus:outline-none focus:border-white/50">
                </div>

                <button type="submit" class="bg-white px-3 py-2 text-black rounded-sm hover:bg-white/90 transition-colors hover:cursor-pointer">
                    Submit Application
                </button>
            </form>

            <div v-if="submitted" class="mt-6 text-center text-green-400 font-semibold">
                ✅ Your application has been submitted!
            </div>
        </div>
    </div>
</template>
