<script setup>
import {computed, toRefs} from 'vue';

const emit = defineEmits(["update:input"]);

const props = defineProps([
    'input',
]);
const { input } = toRefs(props);

const inputComputed = computed({
  get: () => input.value,
  set: (val) => emit("update:input", val),
});
</script>

<template>
    <input
        type="text"
        class="w-[300px] py-2.5 px-3 rounded-lg focus:outline-none shadow-lg border-none focus:ring-0"
        placeholder="search..."
        v-model="inputComputed"
    />
</template>
