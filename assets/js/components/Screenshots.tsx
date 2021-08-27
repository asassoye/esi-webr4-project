import {FunctionComponent, useState} from "react";
import {randomScreenshots, Screenshot} from "../api/games";

export interface ScreenshotsProps {
  screenshots: Screenshot[]
}

const Screenshots : FunctionComponent<ScreenshotsProps> = (props) => {
  const [screenshots, setScreenshots] = useState(props.screenshots)

  console.log(screenshots);

  const surpriseHandler = async () => {
    const result = await randomScreenshots()
    setScreenshots(result.data as Screenshot[])
  }

  return (
    <div className={"screenshots"}>
      <h3>Random Screenshots <a className={"btn btn-sm btn-primary"} onClick={surpriseHandler}>Surprise me</a></h3>

      <div id="screenshots-carousel" className="carousel slide" data-bs-ride="carousel">
        <div className="carousel-inner">
          {screenshots && screenshots.map((screenshot) => {
            const itemClass = screenshot === screenshots[0] ? "carousel-item active" : "carousel-item"

            return (
              <div className={itemClass} key={screenshot.id}>
                <a href={`http://localhost:9696/game/${screenshot.game}`}>
                  <img src={`https://images.igdb.com/igdb/image/upload/t_720p/${screenshot.url}.jpg`}
                       className="d-block w-100" draggable="false" alt={screenshot.game}/>
                </a>
              </div>
            );
          })}
        </div>
        <button className="carousel-control-prev" type="button" data-bs-target="#screenshots-carousel"
                data-bs-slide="prev">
          <span className="carousel-control-prev-icon" aria-hidden="true"/>
          <span className="visually-hidden">Previous</span>
        </button>
        <button className="carousel-control-next" type="button" data-bs-target="#screenshots-carousel"
                data-bs-slide="next">
          <span className="carousel-control-next-icon" aria-hidden="true"/>
          <span className="visually-hidden">Next</span>
        </button>
      </div>


    </div>

  )
}

export default Screenshots
