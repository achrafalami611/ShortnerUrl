<script setup>

import { ref } from 'vue'

const tableData = ref([
  {
    date: '2016-05-01',
    name: 'Tom',
    state: 'California',
    city: 'Los Angeles',
    address: 'No. 189, Grove St, Los Angeles',
    zip: 'CA 90036',
  },
  {
    date: '2016-05-02',
    name: 'Tom',
    state: 'California',
    city: 'Los Angeles',
    address: 'No. 189, Grove St, Los Angeles',
    zip: 'CA 90036',
  },
  {
    date: '2016-05-03',
    name: 'Tom',
    state: 'California',
    city: 'Los Angeles',
    address: 'No. 189, Grove St, Los Angeles',
    zip: 'CA 90036',
  },
])

const deleteRow = (index) => {
  tableData.value.splice(index, 1)
}
</script>

<template>

<el-table :data="tableData" style="width: 100%" max-height="250">
    <el-table-column fixed prop="date" label="Date" />
    <el-table-column prop="name" label="Name" />
    <el-table-column prop="state" label="State"/>
    <el-table-column prop="city" label="City" />
    <el-table-column prop="address" label="Address" width="500"/>
    <el-table-column fixed="right" label="Operations">
      <template #default="scope">
        <el-button
          link
          type="primary"
          size="small"
          @click="deleteRow">
          Remove
        </el-button>
      </template>
    </el-table-column>
  </el-table>
</template>