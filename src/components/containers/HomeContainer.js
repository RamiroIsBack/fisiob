import React, { Component } from "react";
import { connect } from "react-redux";

import "../css/home.css";
import actions from "../../actions";
import history from "../../utils/history";
import Carousel from "../presentational/Carousel";
//import { textoCortoHome, textoLargoHome } from "../../utils/homeCopy";
import HomeServiciosDisplay from "../presentational/HomeServiciosDisplay";

class HomeContainer extends Component {
  servicioSectionClicked = id => {
    history.push("/servicios");
    let whereTo = id;
    setTimeout(() => {
      this.props.moveToSection(whereTo);
    }, 400);
  };
  render() {
    return (
      <div>
        <div className="home__texto__super__container">
          <div className="home__texto__border" />
          <div className="home__texto__corto__container">
            {this.props.copy.inicioCopy ? (
              this.props.copy.inicioCopy.inicioTextoCorto
                .split("\n")
                .map((item, key) => {
                  return (
                    <span key={key}>
                      {item}
                      <br />
                    </span>
                  );
                })
            ) : (
              <div />
            )}
          </div>
          <div />
        </div>

        <div className="carousel__container">
          <Carousel
            items={
              this.props.copy.inicioCopy ? this.props.copy.inicioCopy.items : []
            }
          />
        </div>

        <div className="home__servicios__container">
          <HomeServiciosDisplay
            serviciosObject={this.props.copy.serviciosCopy}
            servicioSectionClicked={this.servicioSectionClicked}
          />
        </div>

        <div className="home__texto__super__container">
          <div className="home__texto__largo__container">
            {this.props.copy.inicioCopy ? (
              this.props.copy.inicioCopy.inicioTextoLargo
                .split("\n")
                .map((item, key) => {
                  return (
                    <span key={key}>
                      {item}
                      <br />
                    </span>
                  );
                })
            ) : (
              <div />
            )}
          </div>
        </div>
      </div>
    );
  }
}
const stateToProps = ({ navigation, copy }) => {
  return {
    navigation,
    copy
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
