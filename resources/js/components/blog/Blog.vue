<script>
import Header from "../Header.vue";
import Footer from "../Footer.vue";

export default {
    name: "Blog",
    components: {Header, Footer}
}
</script>

<template>
    <Header></Header>
    <div class="flex flex-row justify-center min-h-[90vh] p-10 gap-5 text-white max-w-[1920px] m-auto">
        <div class="w-3/4 border-2 border-white/30 rounded-sm p-5">
            <div class="flex flex-col">
                <h1 class="text-2xl">Das hier ist ein epischer Titel</h1>
                <div class="flex flex-row text-gray-400 text-sm gap-1">
                    <i class="fa-solid fa-clock my-auto"></i>
                    <p>Geschrieben am 02.02.2009</p>
                </div>
            </div>
            <p>
                Ich saß heute Morgen in der Küche. 07:43 Uhr. Der Toaster starrte mich an.
                Oder… ich ihn?
                Schwer zu sagen, wer hier wen beobachtet, wenn der Kaffee noch nicht in den Blutkreislauf gekickt hat.

                Ich drückte den Knopf runter, und das Gerät machte dieses kleine “klick”, das so klingt, als würde es sagen: “Okay, Bro, let’s do this.”
                Und da wurde mir klar:
                Wir sind alle ein bisschen wie Toaster.
                Manchmal kalt, manchmal überhitzt, und immer nur eine Millisekunde davon entfernt, das Brot des Lebens zu verbrennen.

                Dann kam der Toast raus.
                Zu dunkel.
                Wie immer.
                Ich biss trotzdem rein.
                Schmeckte nach bitterer Erkenntnis und Supermarktbutter.

                Während ich kaute, dachte ich:
                Wir jagen Likes, wir scrollen durch Existenzen, wir posten Bilder von Avocados — aber wer postet noch über Toast?
                Niemand.
                Und genau da liegt das Problem.

                #ToastedSociety

                Ich hab dann aus Trotz ein Stück Toast auf Insta hochgeladen.
                Zwei Likes.
                Eins davon von einem Bot namens „CryptoQueen_88“.
                Ich fühlte mich gesehen.
                Oder wenigstens leicht angewärmt.
            </p>
        </div>
        <div class="w-1/4 border-2 border-white/30 rounded-sm p-5">
            <h1 class="text-2xl">Recent Posts</h1>
        </div>
    </div>
    <Footer></Footer>
</template>

<style scoped>

</style>
