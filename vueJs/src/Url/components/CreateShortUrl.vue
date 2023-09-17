<script setup>

import { ref, onMounted } from "vue";
import { useRoute } from "vue-router";
import { storeToRefs } from "pinia";
import { useUrlStore } from "@/Url/stores/url";
import { useRouter } from "vue-router";
import BaseToast from "@/common/components/BaseToast.vue";


const urlStore = useUrlStore();
const { create } = urlStore;
const { urlData } = storeToRefs(urlStore);

const route = useRoute();
const router = useRouter();
const id = route.params.id;

const props = defineProps({
  title: {
    type: String,
    required: true,
  },
  buttonText: {
    type: String,
    required: true,
  },
  isEdit: {
    type: Boolean,
    required: true,
  },
});

const urlFormRef = ref();
const formUrl = ref({
  original_url: "",
  description: "",
});

const rules = ref({
  original_url: [
    { required: true, message: "Veuillez saisir le libellé", trigger: "blur" },
    {
      type: "url",
      message: "Veuillez saisir une url valide",
      trigger: "blur",
    },
  ],
});

const submitForm = async () => {
  if (!urlFormRef.value) return;
  if (props.isEdit) {
    await urlFormRef.value.validate(async (valid, fields) => {
      if (valid) {
        await edit(id, formUrl.value);
        router.push('/');
        BaseToast.open(
          true,
          "L'élément a été modifié avec succès",
          "success",
          "el-notification--success",
          "Modification effectuée"
        );
      }
    });
  } else {
    await urlFormRef.value.validate(async (valid, fields) => {
      if (valid) {
        await create(formUrl.value);
        router.push('/');
        BaseToast.open(
          true,
          "L'élément a été créé avec succès",
          "success",
          "el-notification--success",
          "Création effectuée"
        );
      }
    });
  }
};

onMounted(async () => {
  if (props.isEdit && id) {
    await get(id);
    formUrl.value = urlData.value;
  }
});
</script>
<template>
  <el-card class="rounded-xl mb-5">
    <div class="flex justify-between items-center py-2">
      <h2 class="text-md font-bold text-gray-500">
        Page d'accueil / Liste des urls / Création
      </h2>
    </div>
  </el-card>

  <div class="w-2/4 m-auto">
    <el-form
      ref="urlFormRef"
      :model="formUrl"
      :rules="rules"
      :isEdit="props.isEdit"
      class="form__contract"
    >
      <el-card class="form__contract-card rounded-xl">
        <h1 class="text-3xl text-center font-bold text-black">
          {{ props.title }}
        </h1>

        <div class="mt-5">
          <el-form-item label="Libellé" prop="original_url">
            <el-input
              type="text"
              placeholder="Libellé"
              v-model="formUrl.original_url"
            />
          </el-form-item>

          <el-form-item label="Description" prop="description">
            <el-input
              type="textarea"
              placeholder="Description"
              v-model="formUrl.description"
              :rows="3"
            />
          </el-form-item>
        </div>
        <div class="flex justify-center mt-6">
          <button
            class="btn-primary !rounded-full"
            round
            @click.prevent="submitForm()"
          >
            {{ props.buttonText }}
          </button>
        </div>
      </el-card>
    </el-form>
  </div>
</template>

<style scoped>
.el-form-item {
  display: block;
}
</style>
