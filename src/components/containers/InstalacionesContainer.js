import React, { Component } from "react";
//import actions from "../../actions";
import { connect } from "react-redux";

import history from "../../utils/history";
import "../css/instalaciones.css";
import {
  textoLargoInstalaciones,
  items as instalacionesCopy
} from "../../utils/instalacionesCopy";
class InstalacionesContainer extends Component {
  constructor() {
    super();
    this.state = {
      fotoLoaded: false
    };
    this.handleClick = this.handleClick.bind(this);
  }
  componentWillMount() {
    //make it start at the top of the page every time
    window.scrollTo(0, 0);
  }
  handleClick() {
    history.push("/");
  }

  render() {
    return (
      <div className="instalaciones__container">
        {instalacionesCopy.map((instalacion, index) => {
          return (
            <div
              key={index}
              className={`instalaciones__foto${index + 1}__container`}
            >
              {!this.state.fotoLoaded && (
                <div className="loader">Cargando...</div>
              )}
              <img
                className="instalaciones__foto"
                alt={instalacion.alt}
                src={instalacion.src}
                onLoad={() => {
                  if (!this.state.fotoLoaded)
                    this.setState({ fotoLoaded: true });
                }}
              />
            </div>
          );
        })}

        <div className="instalaciones__descripcion__container">
          <p> {textoLargoInstalaciones}</p>
        </div>
        <div className="instalaciones__logo__container">
          <img
            onClick={this.handleClick}
            className="instalaciones__foto"
            alt="logoFisioB"
            src="/logoB.png"
          />
        </div>
        <div />
      </div>
    );
  }
}

const dispatchToProps = dispatch => {
  return {};
};

const stateToProps = state => {
  return {
    navigation: state.navigation
  };
};

export default connect(
  stateToProps,
  dispatchToProps
)(InstalacionesContainer);
