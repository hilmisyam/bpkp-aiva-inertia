<template>
  <v-select
    :options="options"
    v-model="selected"
    :placeholder="placeholder || 'Pilih opsi...'"
    :multiple="true"
    :styles="customStyles"
    @input="handleChange"
  />
</template>

<script setup>
import { ref, watch } from 'vue';
import vSelect from 'vue-select';
import 'vue-select/dist/vue-select.css';

const props = defineProps({
  options: {
    type: Array,
    required: true
  },
  onChange: {
    type: Function,
    required: true
  },
  placeholder: {
    type: String,
    default: ''
  },
  defaultOptions: {
    type: Array,
    default: () => []
  }
});

const selected = ref(props.defaultOptions);

// Custom Styles
const customStyles = {
  control: (provided, state) => ({
    ...provided,
    borderColor: state.isFocused ? '#4CAF50' : '#ccc', // Warna border saat fokus
    boxShadow: state.isFocused ? '0 0 5px rgba(76, 175, 80, 0.5)' : 'none',
    outline: 'none', // Menghilangkan garis biru
    '&:hover': {
      borderColor: '#4CAF50' // Warna border saat hover
    }
  })
};

const handleChange = (value) => {
  props.onChange(value);
};

watch(selected, (newValue) => {
  handleChange(newValue);
});
</script>

<style>
/* Tambahkan gaya kustom jika diperlukan */
</style>