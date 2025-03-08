<template>
  <LeaderLayout>
    <div class="container mt-4">

      <div class="chat-container">
        <div class="text-center">
          <button class="suggestion-btn" @click="fillInput('Bagaimana prosedur mengajukan cuti?')">Bagaimana prosedur mengajukan cuti?</button>
          <button class="suggestion-btn" @click="fillInput('Berapa sisa cuti yang saya miliki?')">Berapa sisa cuti yang saya miliki?</button>
          <button class="suggestion-btn" @click="fillInput('Berapa target KPI saya?')">Berapa target KPI saya?</button>
        </div>
      </div>

      <div class="d-flex">
        <input type="text" class="chat-input" v-model="message" placeholder="Type your message..." />
        <button class="btn-send" @click="sendMessage">Send</button>
      </div>
    </div>
  </LeaderLayout>
</template>

<script setup>
import { ref } from 'vue';
import LeaderLayout from '@/Layouts/LeaderLayout.vue';

const message = ref('');

const fillInput = (text) => {
  message.value = text;
};

const sendMessage = () => {
  console.log('Message sent:', message.value);
  // Add your send message logic here
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
</style>