import { acceptHMRUpdate, defineStore } from 'pinia'
import { UrlService } from '../services/url';
import { ref } from 'vue';

const urlData = ref([]);
const urlService = new UrlService();
export const useUrlStore = defineStore('url', () => {

  const getAll = () => {
    urlService.getAll().then((res) => {
      urlData.value = res;      
    });
  };

  // const create = (url:StatusDTO) => {
  //   return urlService.create(url).then((res) => {
  //     return Promise.resolve(res);
  //   })
  // }
  return {getAll,urlData}
});

if (import.meta.hot)
  import.meta.hot.accept(acceptHMRUpdate(useUrlStore, import.meta.hot))
