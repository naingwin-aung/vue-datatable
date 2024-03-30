<script setup>
import { ref } from "vue";
import { Link } from "@inertiajs/vue3";

const links = ref([
    {
        icon: "fa-solid fa-cubes",
        name: "Dashboard",
        url: "/dashboard",
    },
    {
        icon: "fa-solid fa-suitcase",
        name: "Package",
        url: "/packages",
    },
]);
</script>
<template>
    <div
        class="min-w-[220px] h-full flex flex-col gap-9 bg-gradient-to-t from-blue-300 to-blue-500 text-white px-1 py-3"
    >
        <div class="text-center">Sample</div>
        <ul
            class="flex flex-col gap-1 h-[74.3vh] overflow-y-scroll no-scrollbar"
        >
            <!-- bg-blue-200 text-black active state -->
            <li
                v-for="(link, index) in links"
                :key="index"
                class="w-full cursor-pointer rounded-lg transition ease-in delay-75 hover:bg-slate-100 hover:text-black"
                :class="{
                    'bg-slate-100 text-black': $page.component.startsWith(
                        link.name
                    ),
                }"
            >
                <Link :href="link.url" class="flex gap-5 px-7 py-2.5">
                    <div>
                        <i :class="link.icon"></i>
                    </div>
                    <div>
                        {{ link.name }}
                    </div>
                </Link>
            </li>
        </ul>
        <div>
            <div class="w-full cursor-pointer rounded-lg transition ease-in delay-75 hover:bg-slate-100 hover:text-black">
                <Link
                    :href="route('logout')"
                    method="post"
                    as="button"
                    class="flex gap-5 px-7 py-2.5"
                >
                    <div>
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    </div>
                    <div>Logout</div>
                </Link>
            </div>
        </div>
    </div>
</template>
