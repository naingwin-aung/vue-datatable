<script setup>
import {ref} from 'vue';
import { Link, router } from "@inertiajs/vue3";

const props = defineProps({
    routeName: String,
    heads: Array,
    columns: Array,
    data: Object,
});

const clickedIndex = ref(null);

const toggleIndex = (index) => {
    if (clickedIndex.value === index) {
        clickedIndex.value = null;
    } else {
        clickedIndex.value = index;
    }
};

const destroyHandler = (id) => {
   let confirmed = confirm('Are u sure you want to delete');
   if(confirmed) {
       router.delete(route(`${routeName}.destroy`, id), {
           preserveScroll: true,
           preserveState: true,
       });
   }
};
</script>
<template>
    <div class="rounded-lg">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table
                class="w-full text-sm text-left rtl:text-right text-gray-500"
            >
                <thead class="text-xs uppercase bg-blue-500 text-white">
                    <tr>
                        <th
                            v-for="(head, headindex) in heads"
                            :key="headindex"
                            scope="col"
                            class="px-6 py-3"
                        >
                            {{ head }}
                        </th>
                        <th scope="col" class="px-6 py-3 text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="(d, index) in data"
                        :key="index"
                        class="odd:bg-white even:bg-gray-50 border-b"
                    >
                        <td
                            v-for="(col, colindex) in columns"
                            :key="colindex"
                            class="px-6 py-4"
                        >
                            {{ d[col] }}
                        </td>
                        <td class="px-6 py-4 text-end">
                            <span
                                v-if="clickedIndex !== index"
                                class="font-medium hover:underline"
                            >
                                <i
                                    class="fa-solid fa-ellipsis cursor-pointer"
                                    @click="toggleIndex(index)"
                                ></i>
                            </span>
                            <span v-else>
                                <Link :href="route(`${routeName}.edit`, d.id)">
                                    <i
                                        class="fa-solid fa-pen-to-square me-4"
                                    ></i>
                                </Link>
                                <button @click.prevent="destroyHandler(d.id)">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
