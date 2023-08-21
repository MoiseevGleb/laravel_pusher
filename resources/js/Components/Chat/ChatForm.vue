<script setup>
import {reactive} from 'vue';
import useChat from '@/composables/chat';
import ChatForm from "@/Components/Chat/ChatForm.vue";


const form = reactive({
    text: '',
})

const {errors, addMessage} = useChat()

const sendMessage = async () => {
    await addMessage(form)
    form.text = ''
};
</script>

<template>
    <div v-if="errors">
        <div v-for="message in errors.message">
            <p>{{ message }}</p>
        </div>
    </div>
    <input @keyup.enter="sendMessage" v-model="form.text" type="text" placeholder="Ваше сообщение...">
    <button @click="sendMessage" type="submit">Отправить</button>
</template>

<style scoped>

</style>
