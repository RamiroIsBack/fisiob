import React, { Component } from "react";
import { connect } from "react-redux";

import "../css/home.css";
import history from "../../utils/history";
import Carousel from "../presentational/Carousel";
import { textoCortoHome, textoLargoHome } from "../../utils/homeCopy";
import HomeServiciosDisplayContainer from "./HomeServiciosDisplayContainer";

class HomeContainer extends Component {
  carouselSectionClicked(event) {
    let e = event;
  }
  render() {
    return (
      <div>
        <div className="home__texto__super__container">
          <div className="home__texto__border" />
          <div className="home__texto__corto__container">
            {textoCortoHome.split("\n").map((item, key) => {
              return (
                <span key={key}>
                  {item}
                  <br />
                </span>
              );
            })}
          </div>
          <div />
        </div>

        <div className="carousel__container">
          <Carousel
            carouselSectionClicked={this.carouselSectionClicked.bind(this)}
          />
        </div>

        <div className="home__servicios__container">
          <HomeServiciosDisplayContainer />
        </div>

        <div className="home__texto__super__container">
          <div className="home__texto__largo__container">
            {textoLargoHome.split("\n").map((item, key) => {
              return (
                <span key={key}>
                  {item}
                  <br />
                </span>
              );
            })}
          </div>
        </div>
      </div>
    );
  }
}
export default connect(
  null,
  null
)(HomeContainer);
