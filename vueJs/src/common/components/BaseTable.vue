<script setup>
import { ref } from "vue";
import { useUrlStore } from "@/Url/stores/url";
import { storeToRefs } from "pinia";
import { useRouter } from "vue-router";
const router = useRouter();

const urlStore = useUrlStore();
const { redirect,getAll } = urlStore;
const { originalUrl } = storeToRefs(urlStore);

const props = defineProps({
  columns: {
    type: Array,
    required: true,
  },
  tableData: {
    type: Array,
    required: true,
  },
  actions: {
    type: Array,
    required: false,
    default: () => [],
  },
});

const handleActions = (row, action) => {
  action.handler(row);
};
const handleShortUrlClick = async (shortUrl) => {
  await redirect(shortUrl);
  await getAll();
  await window.open(originalUrl.value.data, '_blank');
  
};

</script>

<template>
  <el-table :data="tableData" style="width: 100%">
    <el-table-column label="URL courte" width="200">
      <template #default="scope">
        <a @click="handleShortUrlClick(scope.row.short_url)" class="text-secondary underline hover:underline-offset-4 cursor-pointer">
          {{ scope.row.short_url }}
        </a>
      </template>
    </el-table-column>

    <el-table-column
      v-for="column in columns"
      :key="column.prop"
      :prop="column.prop"
      :label="column.label"
      :width="column.width"
    />

    <el-table-column fixed="right" label="Operations">
      <template #default="scope">
        <el-button
          v-for="action in actions"
          :key="action.label"
          link
          type="primary"
          size="small"
          @click="handleActions(scope.row, action)"
        >
          {{ action.label }}
        </el-button>
      </template>
    </el-table-column>
  </el-table>
</template>
