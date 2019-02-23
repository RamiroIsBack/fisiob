import React, { Component } from "react";
import { connect } from "react-redux";
import axios from "axios";

import "../css/home.css";
import actions from "../../actions";
import history from "../../utils/history";
import Carousel from "../presentational/Carousel";
import { textoCortoHome, textoLargoHome } from "../../utils/homeCopy";
import HomeServiciosDisplay from "../presentational/HomeServiciosDisplay";

class HomeContainer extends Component {
  componentDidMount() {
    let urlHerokuPart = "https://stormy-meadow-66204.herokuapp.com";
    axios({
      method: "get",
      url: `${urlHerokuPart}/copy/inicio`
    })
      .then(res => {
        this.props.inicioReceived(res.data.inicioCopy[0]);
        axios({
          method: "get",
          url: `${urlHerokuPart}/copy/servicios`
        }).then(res => {
          this.props.serviciosReceived(res.data.serviciosCopy[0]);
          axios({
            method: "get",
            url: `${urlHerokuPart}/copy/tecnicas`
          }).then(res => {
            this.props.tecnicasReceived(res.data.tecnicasCopy[0]);
          });
        });
      })
      .catch(err => {
        console.log(err);
      });
  }
  servicioSectionClicked = id => {
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
  };
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
            servicioSectionClicked={this.servicioSectionClicked}
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
    moveToSection: section => dispatch(actions.moveToSection(section)),
    inicioReceived: inicioCopy => dispatch(actions.inicioReceived(inicioCopy)),
    serviciosReceived: serviciosCopy =>
      dispatch(actions.serviciosReceived(serviciosCopy)),
    tecnicasReceived: tecnicasCopy =>
      dispatch(actions.tecnicasReceived(tecnicasCopy))
  };
};

export default connect(
  stateToProps,
  dispatchToProps
)(HomeContainer);
