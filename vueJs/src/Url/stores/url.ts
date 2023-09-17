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

  const create = (url:any) => {
    return urlService.create(url).then((res:any) => {
      return Promise.resolve(res);
    })
  }

  const destroy = (id:number) => {
    return urlService.destroy(id).then((res) => {
    })
  }
  return {getAll, create, destroy, urlData}
});

if (import.meta.hot)
  import.meta.hot.accept(acceptHMRUpdate(useUrlStore, import.meta.hot))
