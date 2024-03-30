<script setup>
const props = defineProps({
  text: String,
});
</script>
<template>
  <button class="bg-blue-500 text-white rounded-md px-4 py-2.5 text-sm outline-none focus:bg-blue-400">
    {{ text }}
  </button>
</template>
