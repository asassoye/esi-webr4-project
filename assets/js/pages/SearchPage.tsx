import { Game } from '../api/games'
import { Fragment } from 'react'
import GameCard from '../components/GameCard'

interface Props {
  'query': string
  'games': Game[]
}

const SearchPage = (props: Props) => {
  const title: string = `Résultats pour "${props.query}"`

  return (
    <Fragment>
      <h3>{title}</h3>
      {props.games && props.games.map(
        (game: Game) => <GameCard key={game.slug} game={game} />)}
    </Fragment>

  )
}

export default SearchPage
