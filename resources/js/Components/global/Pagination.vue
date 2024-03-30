<script setup>
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    links: Array,
});
</script>
<template>
    <Link
        v-for="link in links"
        :key="link"
        :href="link.url || ''"
    >
        <span
            class="relative w-1 h-1 rounded-full flex justify-center items-center text-center p-4 text-slate-500"
            :class="{ 'bg-blue-500': link.active }"
        >
            <span
                class="absoulute left-0 top-0"
                :class="{ 'text-white': link.active }"
            >
                {{ link.label }}
            </span>
        </span>
    </Link>
</template>
