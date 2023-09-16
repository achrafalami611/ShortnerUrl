import axios from "axios";
import { apiBaseUrl } from '../../../environment/environment';

export class UrlService {
  #baseUrl:string = "shortenUrl";
  getAll() {
    return axios.get(apiBaseUrl+'/'+this.#baseUrl).then(res => res.data.data);
  }
  create(url: any) {
    return axios.post(apiBaseUrl+'/'+this.#baseUrl+'/store', url).then(res => res.data);
  }
}
