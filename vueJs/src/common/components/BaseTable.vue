<script setup>

import { defineProps, ref } from 'vue'

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
  maxHeight: {
    type: Number,
    required: false,
    default: 250,
  },
})

const handleActions = (row, action) => {
  action.handler(row);
}
</script>


<template>
  <el-table :data="tableData" style="width: 100%" :max-height="maxHeight">
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
          @click="handleActions(scope.row, action)">
          {{ action.label }}
        </el-button>
      </template>
    </el-table-column>
  </el-table>
</template>
