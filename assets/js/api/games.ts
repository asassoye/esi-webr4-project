import axios, { AxiosRequestConfig } from 'axios'

axios.defaults.baseURL = 'http://localhost:9696'

interface Game {
  'id': number
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

interface Screenshot {
  id: number,
  url: string,
  game: string
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

const randomScreenshots = async () => {
  const config: AxiosRequestConfig = {
    method: 'get',
    url: `screenshot/random`,
    headers: {
      Accept: 'application/json'
    }
  }

  return axios(config)
}

export { search, randomScreenshots, Game, Screenshot }
