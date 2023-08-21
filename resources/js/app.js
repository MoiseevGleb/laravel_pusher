import './bootstrap';
import { createApp } from 'vue/dist/vue.esm-bundler';
import ChatMessage from "./Components/Chat/ChatMessage.vue";
import ChatForm from "./Components/Chat/ChatForm.vue";


const app = createApp({
    components: {
        ChatForm,
        ChatMessage
    }
})

app.mount('#app')
