export type UrlResponse = {
  id: string;
  original_url: string;
  short_url: string;
  url_description: string;
  visits_count: number;
  created_at: Date | string;
  updated_at: Date | string;
}
export type UrlDTO = {
  original_url: string;
  url_description: string;
}
