<script setup>
import SideBar from "@/common/components/SideBar.vue";

</script>

<template>
  <header>
    <div class="bg-primary text-white px-20 py-5">
      <h1 class="text-xl font-bold">Shortner Url</h1>
    </div>
  </header>

  <div class="flex items-baseline justify-between">
    <div class="pt-8">
      <SideBar />
    </div>

    <main class="m-auto p-8">
    <RouterView />
  </main>
  </div>

</template>
<style lang="scss" scoped>
  main{
    width: 99%;
  }
</style>
