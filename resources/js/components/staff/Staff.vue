<script>
import Header from "../Header.vue";
import Footer from "../Footer.vue";
import StaffCard from "./StaffCard.vue";

export default {
    name: "Staff",
    components: {Header, Footer, StaffCard},
}

</script>

<template>
    <Header/>

    <div class="flex flex-col max-w-[1920px] mx-auto">
        <div class="flex flex-wrap justify-center gap-10 mx-auto p-4 mt-10 flex-col">
            <div class="flex flex-col gap-5">
                <h1 class="text-3xl font-semibold mx-auto">Management</h1>
                <div class="flex flex-row gap-5">
                    <StaffCard name="yyuh" role="Founder"/>
                    <StaffCard name="xCallumm_" role="Owner"/>
                    <StaffCard name="marvinarchive" role="Manager"/>
                </div>
            </div>
            <div class="flex flex-col gap-5">
                <h1 class="text-3xl font-semibold mx-auto">Administration</h1>
                <div class="flex flex-row gap-5">
                    <StaffCard name="ph1lv" role="Admin"/>
                    <StaffCard name="wsdgamer" role="Admin"/>
                    <StaffCard name="K3YO" role="Admin"/>
                    <StaffCard name="ForeverHowlong" role="Admin"/>
                </div>
            </div>
            <div class="flex flex-col gap-5">
                <h1 class="text-3xl font-semibold mx-auto">Moderation</h1>
                <div class="flex flex-row gap-5">
                    <StaffCard name="67Syn" role="Helper"/>
                    <StaffCard name="Sh1zU_U" role="Helper"/>
                    <StaffCard name="13vn" role="Helper"/>
                    <StaffCard name="Quickify" role="Helper"/>
                </div>
            </div>
        </div>
    </div>
    <Footer/>
</template>
