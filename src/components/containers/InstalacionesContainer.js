import React, { Component } from "react";
import actions from "../../actions";
import { connect } from "react-redux";
import axios from "axios";

import history from "../../utils/history";
import "../css/instalaciones.css";

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
    let urlHerokuPart = "https://stormy-meadow-66204.herokuapp.com";
    axios({
      method: "get",
      url: `${urlHerokuPart}/copy/instalaciones`
    })
      .then(res => {
        this.props.instalacionesReceived(res.data.instalacionesCopy[0]);
      })
      .catch(err => {
        console.log(err);
      });

    window.scrollTo(0, 0);
  }
  handleClick() {
    history.push("/");
  }

  render() {
    let instalacionesObject = undefined;
    if (this.props.copy) {
      if (this.props.copy.instalacionesCopy) {
        instalacionesObject = this.props.copy.instalacionesCopy;
      }
    }
    if (!instalacionesObject) {
      return <div />;
    }
    return (
      <div className="instalaciones__container">
        {instalacionesObject.items.map((instalacion, index) => {
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
          <p> {instalacionesObject.instalacionesTextoLargo}</p>
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
  return {
    instalacionesReceived: instalacionesCopy =>
      dispatch(actions.instalacionesReceived(instalacionesCopy))
  };
};

const stateToProps = state => {
  return {
    copy: state.copy,
    navigation: state.navigation
  };
};

export default connect(
  stateToProps,
  dispatchToProps
)(InstalacionesContainer);
