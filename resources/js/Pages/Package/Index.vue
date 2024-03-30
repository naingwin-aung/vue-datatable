<script setup>
import { ref, watch } from "vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import FormButton from "@/Components/global/FormButton.vue";
import Searchbox from "../../Components/global/Searchbox.vue";
import Pagination from "../../Components/global/Pagination.vue";
import { router } from "@inertiajs/vue3";
import { debounce } from "lodash";
import { Link } from "@inertiajs/vue3";
import ShowRecord from "../../Components/global/ShowRecord.vue";
import DataTable from "../../Components/global/DataTable.vue";

const props = defineProps({
    data: Object,
    search: String,
});

const search = ref(props.search);

const routeName = ref("packages");

const heads = ref([
  "name", 
  "price"
]);

const columns = ref([
  "name", 
  "price"
]);

watch(
    search,
    debounce((value) => {
        router.get(
            "/packages",
            { search: value },
            { preserveState: true, replace: true }
        );
    }, 500)
);
</script>
<template>
    <AuthenticatedLayout>
        <div class="flex justify-between items-center mb-8">
            <Searchbox v-model:input="search" />
            <Link :href="route(`${routeName}.create`)">
                <FormButton text="Create Category" />
            </Link>
        </div>

        <DataTable
            :routeName="routeName"
            :heads="heads"
            :columns="columns"
            :data="data.data"
        />

        <!-- Pagination -->
        <div class="mt-3 flex justify-between items-center">
            <div class="flex gap-1">
                <Pagination :links="data.links"/>
            </div>
            <ShowRecord :from="data.from" :to="data.to" :total="data.total" />
        </div>
    </AuthenticatedLayout>
</template>
