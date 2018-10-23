import React, { Component } from "react";
import { connect } from "react-redux";

import "../css/home.css";
import actions from "../../actions";
import history from "../../utils/history";
import Carousel from "../presentational/Carousel";
import { textoCortoHome, textoLargoHome } from "../../utils/homeCopy";
import HomeServiciosDisplay from "../presentational/HomeServiciosDisplay";

class HomeContainer extends Component {
  servicioSectionClicked(id) {
    if (id === "servicios") {
      this.props.moveToSection("");
    } else if (id === "equipo") {
      history.push("/equipo");
      this.props.moveToSection("");
    } else if (id === "instalaciones") {
      history.push("/instalaciones");
      this.props.moveToSection("");
    } else {
      history.push("/servicios");
      let whereTo = id;
      setTimeout(() => {
        this.props.moveToSection(whereTo);
      }, 400);
    }
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
          <Carousel />
        </div>

        <div className="home__servicios__container">
          <HomeServiciosDisplay
            servicioSectionClicked={this.servicioSectionClicked.bind(this)}
          />
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
const stateToProps = ({ navigation }) => {
  return {
    navigation
  };
};
const dispatchToProps = dispatch => {
  return {
    moveToSection: section => dispatch(actions.moveToSection(section))
  };
};

export default connect(
  stateToProps,
  dispatchToProps
)(HomeContainer);
