<template>
  <div class="mt-4">
    <div class="chat-container">
      <div class="text-center">
        <button class="suggestion-btn" @click="fillInput('Bagaimana prosedur mengajukan cuti?')">Bagaimana prosedur mengajukan cuti?</button>
        <button class="suggestion-btn" @click="fillInput('Berapa sisa cuti yang saya miliki?')">Berapa sisa cuti yang saya miliki?</button>
        <button class="suggestion-btn" @click="fillInput('Berapa target KPI saya?')">Berapa target KPI saya?</button>
      </div>
      <div v-for="(msg, index) in messages" :key="index" class="message">
        <p><strong>{{ msg.role }}:</strong> {{ msg.text }}</p>
      </div>
      <div v-if="isLoading" class="loading-indicator">
        Loading...
      </div>
    </div>

    <div class="d-flex">
      <input type="text" class="chat-input" v-model="message" placeholder="Type your message..." />
      <button class="btn-send" @click="sendMessage" :disabled="isLoading">Send</button>
    </div>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue';
import axios from 'axios';
import { usePage } from '@inertiajs/vue3';

const { props } = usePage();

const roleUser = computed(() => props.auth.user.roles[0].name);

const message = ref('');
const messages = ref([
  {
    role: 'baskara',
    text: 'Halo! Ada yang bisa saya bantu?'
  }
]);

const isLoading = ref(false);

const fillInput = (text) => {
  message.value = text;
};

const sendMessage = async () => {
  if (message.value.trim() === '') return;

  // Tambahkan pesan pengguna ke daftar pesan
  messages.value.push({
    role: 'user',
    text: message.value
  });

  isLoading.value = true;

  try {
    const response = await axios.post('https://hilmi.aiva.cathanastari.id/api/ask-baskara', {
      leader: roleUser.value === 'pemimpin',
      messages: messages.value
    });

    // Periksa apakah respons dari API memiliki teks sebelum menambahkannya ke daftar pesan
    console.log('Response:', response.data);
    if (response.data.result) {
      messages.value.push({
        role: 'baskara',
        text: response.data.result.baskara
      });
    }

    // Kosongkan input pesan
    message.value = '';
  } catch (error) {
    console.error('Error sending message:', error);
  } finally {
    isLoading.value = false;
  }
};
</script>

<style scoped>
.chat-container {
  height: 60vh;
  overflow-y: scroll;
  border: 1px solid #ccc;
  padding: 20px;
  background-color: #f8f9fa;
  border-radius: 10px;
  margin-bottom: 20px;
}
.chat-input {
  background-color: #fff;
  border: 1px solid #ccc;
  border-radius: 20px;
  padding: 10px 20px;
  width: 100%;
  margin-right: 10px;
}
.btn-send {
  background-color: #2e3192;
  color: #fff;
  border: none;
  padding: 10px 20px;
  border-radius: 20px;
  cursor: pointer;
}
.btn-send:disabled {
  background-color: #ccc;
  cursor: not-allowed;
}
.suggestion-btn {
  border: 1px solid #2e3192;
  border-radius: 20px;
  padding: 8px 16px;
  margin: 5px;
  color: #2e3192;
  background: none;
  cursor: pointer;
}
.header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 20px;
}
.header img {
  width: 120px;
}
.header span {
  font-size: 18px;
  font-weight: bold;
}
.header i {
  font-size: 24px;
  color: #2e3192;
}
.message {
  margin-bottom: 10px;
}
.loading-indicator {
  text-align: center;
  margin-top: 10px;
  font-size: 16px;
  color: #2e3192;
}
</style>