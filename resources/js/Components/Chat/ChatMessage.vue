<script setup>
    import useChat from "@/composables/chat.js";
    import {onMounted} from "vue";
    const props = defineProps({
        user: {
            type: Object,
            required: true,
        }
    })
    const {messages, getMessages} = useChat()
    onMounted(getMessages)

    Echo.private('chat')
        .listen('.message_sent', (e) => {
            const message = JSON.parse(e.message)
            messages.value.push({
                text: message.text,
                user_id: message.user_id
            })
            console.log(messages.value);
        });
</script>

<template>
    <div v-for="message in messages">
        <p :style="{'color: red;' : message.user_id !== props.user.id}">{{ message.text }}</p>
    </div>
</template>

<style scoped>

</style>
