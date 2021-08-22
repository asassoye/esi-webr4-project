import axios, { AxiosRequestConfig } from 'axios'

axios.defaults.baseURL = 'http://localhost:9696'

interface Game {
  'slug': string,
  'cover': {
    'url': string
  },
  'name': string,
  'summary': string,
  'releaseDate': string,
  'platforms': [
    {
      'abbreviation': string
    }]
}

const search = async (name: string) => {
  const config: AxiosRequestConfig = {
    method: 'get',
    url: `search?query=${escape(name)}`,
    headers: {
      Accept: 'application/json'
    }
  }
  return axios(config)
}

export { search, Game }
