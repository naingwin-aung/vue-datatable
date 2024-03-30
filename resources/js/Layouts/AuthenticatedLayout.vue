<script setup>
import Sidebar from "@/Shared/Sidebar.vue";

</script>
<template>
  <section class="flex w-full h-[100vh] overflow-y-scroll no-scroll">
    <Sidebar/>
    <div class="flex-grow h-full overflow-y-scroll no-scroll">
      <!-- <div class="flex justify-between items-center h-[50px] px-8 bg-white">
        <div></div>
        <div></div>
      </div> -->
      <div class="px-7 py-7 bg-slate-100 h-full">
        <slot/>
      </div>
    </div>
  </section>
</template>

<style lang="scss" scoped></style>
