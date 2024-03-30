<script setup>
const props = defineProps({
    from: Number,
    to: Number,
    total: Number,
});
</script>
<template>
    <div class="text-slate-500">
        {{ from }} to {{ to }} of {{ total }} records
    </div>
</template>
