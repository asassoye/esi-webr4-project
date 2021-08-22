import { Game } from '../api/games'
import { FunctionComponent } from 'react'

export interface GameCardProps {
  'game': Game
}

const GameCard: FunctionComponent<GameCardProps> = (props: GameCardProps) => {
  const releaseDate: Date = new Date(props.game.releaseDate)

  return (
    <div className={'col-6 px-2 py-2 game-card-wrapper'}>
      <a href={`http://localhost:9696/game/${props.game.slug}`}>
        <div className={'game-card'}>
          <div className={'row g-0'}>
            <div className={'col-5'}>
              <img
                src={`https://images.igdb.com/igdb/image/upload/t_cover_big/${props.game.cover.url}.jpg`}
                alt={'props.game.name'} />
            </div>
            <div className={'col-7'}>
              <div className={'game-card-body'}>
                <h5>{props.game.name} ({releaseDate.getFullYear()})</h5>
                {props.game.platforms &&
                props.game.platforms.map((platform) => {
                  return <span key={platform.abbreviation}
                               className={'badge bg-primary mx-1'}>{platform.abbreviation}</span>
                })}
                <p>{props.game.summary.slice(0, 100)}...</p>
              </div>
            </div>
          </div>
        </div>
      </a>
    </div>
  )
}

export default GameCard
