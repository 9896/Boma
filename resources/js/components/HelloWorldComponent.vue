<template>
<div class="hello-world">
<p>{{ getGreeting }}</p>
<p class="hello-world"> Yeez tunaanza SFC hehehe</p>
</div>
</template>

<script>
export default {
    name: 'HelloWorldComponent',
    data(){
        return {
            kuriaGreeting: 'warae',
        }
    },

    computed: {
        getGreeting(){
            return this.kuriaGreeting;
        }
    },

    mounted(){
        console.log("component mounted.HelloWorldComponent")
        window.Echo.channel('chat-room.1')
    .listen('ChatMessageWasReceived', (e) => {
        console.log(e.user, e.chatMessage);
    });

    }
}
</script>
<style>

</style>

