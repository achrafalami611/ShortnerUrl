<script setup>
import SideBar from "@/common/components/SideBar.vue";

</script>

<template>
  <header>
    <div class="bg-black text-white px-20 py-5">
      <h1 class="text-xl font-bold">Shortner Url</h1>
    </div>
  </header>

  <div class="flex items-center justify-between">
    <div>
      <SideBar />
    </div>

    <main class="m-auto p-5">
    <RouterView />
  </main>
  </div>

</template>
<style lang="scss" scoped>
  main{
    width: 95%;
  }
</style>
