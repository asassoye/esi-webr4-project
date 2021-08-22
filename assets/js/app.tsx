import '../styles/app.scss'

import '@popperjs/core'
import 'bootstrap'
import ReactDOM from 'react-dom'

const searchForm: HTMLFormElement | null = document.getElementById(
  'searchForm'
) as HTMLFormElement
const searchInput: HTMLInputElement | null = document.getElementById(
  'searchInput'
) as HTMLInputElement

searchForm?.addEventListener('submit', (e: Event) => {
  e.preventDefault()
})

searchInput?.addEventListener('input', () => {
  const input: string = searchInput?.value
  ReactDOM.render(<h1>{input}</h1>, document.getElementById('base'))
})
