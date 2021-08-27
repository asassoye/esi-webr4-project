import '../styles/app.scss'

import '@popperjs/core'
import 'bootstrap'
import ReactDOM from 'react-dom'
import {Game, randomScreenshots, Screenshot, search} from './api/games'
import SearchPage from './pages/SearchPage'
import Screenshots from "./components/Screenshots";

const searchForm: HTMLFormElement | null = document.getElementById(
  'searchForm'
) as HTMLFormElement
const searchInput: HTMLInputElement | null = document.getElementById(
  'searchInput'
) as HTMLInputElement

searchForm?.addEventListener('submit', (e: Event) => {
  e.preventDefault()
})

searchInput?.addEventListener('input', async () => {
  const input: string = searchInput?.value

  const result = await search(input)
  const games: Game[] = result.data as Game[]

  ReactDOM.render(<SearchPage games={games} query={input}/>,
    document.getElementById('base'))
});


(async () => {
  const randomZone: HTMLElement | null = document.getElementById('random-shit')

  if (randomZone !== null) {
    const result = await randomScreenshots()
    const screenshots: Screenshot[] = result.data as Screenshot[]

    ReactDOM.render(<Screenshots screenshots={screenshots}/>, document.getElementById('random-shit'))
  }
})()
