<script setup>
import BaseTable from "../../common/components/BaseTable.vue";
import { ref, onMounted } from "vue";
import { storeToRefs } from "pinia";
import { useUrlStore } from "@/Url/stores/url";
import { Plus } from "@element-plus/icons-vue";
import { useRouter } from "vue-router";

const urlStore = useUrlStore();
const { getAll } = urlStore;
const { urlData } = storeToRefs(urlStore);
const router = useRouter();

const metaData = [
  {
    prop: "id",
    label: "ID",
  },
  {
    prop: "original_url",
    label: "URL d'origine",
  },
  {
    prop: "short_url",
    label: "URL courte",
  },
  {
    prop: "visits_count",
    label: "Nombre de visites",
  },
  {
    prop: "created_at",
    label: "Date de création",
  },
];

const actions = [
  {
    label: "Edit",
    handler(payload) {
      console.log(payload);
    },
  },
  {
    label: "Supprimer",
    handler(payload) {
      console.log(payload);
    },
  },
];

const ToCreate = () => {
  router.push({ path: "/add" });
};

onMounted(async () => {
  await getAll();
});
</script>

<template>
  <div class="card-table">
    <el-card class="rounded-xl mb-5">
      <div class="flex justify-between items-center py-2">
        <h2 class="text-md font-bold text-gray-500"> Page d'accueil / Liste des urls</h2>
      </div>
    </el-card>

    <el-card class="rounded-xl">
      <div class="flex justify-between items-center py-5">
        <h3 class="text-xl font-bold">Liste des urls</h3>
        <div>
          <button
            class="btn-primary !rounded-full flex gap-2 items-center"
            @click="ToCreate"
          >
            <el-icon> <Plus /> </el-icon>
            <span>Ajouter une url</span>
          </button>
        </div>
      </div>
      <hr />

      <BaseTable
        class="pt-10"
        :columns="metaData"
        :tableData="urlData.data"
        :actions="actions"
      />
    </el-card>
  </div>
</template>

<style scoped>
.card-table {
  width: 99%;
  margin: auto;
}
</style>
