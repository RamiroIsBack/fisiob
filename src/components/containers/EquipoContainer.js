import React, { Component } from "react";
import { connect } from "react-redux";
import axios from "axios";

import actions from "../../actions";
import history from "../../utils/history";
import "../css/equipo.css";
import EquipoMember from "../presentational/EquipoMember";

class EquipoContainer extends Component {
  componentDidMount() {
    let urlHerokuPart = "https://stormy-meadow-66204.herokuapp.com";
    axios({
      method: "get",
      url: `${urlHerokuPart}/copy/equipo`
    })
      .then(res => {
        this.props.equipoReceived(res.data.equipoCopy[0]);
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
    if (!this.props.copy.equipoCopy) {
      return <div> Cargando...</div>;
    }
    return (
      <div>
        <div className="deck__container">
          {this.props.copy.equipoCopy.equipo.map((person, index) => (
            <div key={index} className="card__supercontainer">
              <div className="card__container">
                <EquipoMember
                  person={person}
                  servicioSectionClicked={this.servicioSectionClicked}
                />
              </div>
              <div key={index} className="card__side" style={{ width: "90%" }}>
                <p style={{ fontWeight: "bold" }}>
                  {person.nombre} {person.apellido}
                </p>
                <p>{person.textoPersona}</p>
              </div>
            </div>
          ))}
        </div>
        <div className="container" style={{ marginTop: 20 }}>
          {this.props.copy.equipoCopy.equipoTextoLargo
            .split("\n")
            .map((item, key) => {
              return (
                <span key={key}>
                  {item}
                  <br />
                </span>
              );
            })}
        </div>
      </div>
    );
  }
}
const stateToProps = ({ copy, navigation }) => {
  return {
    navigation,
    copy
  };
};
const dispatchToProps = dispatch => {
  return {
    moveToSection: section => dispatch(actions.moveToSection(section)),
    equipoReceived: equipoCopy => dispatch(actions.equipoReceived(equipoCopy))
  };
};

export default connect(
  stateToProps,
  dispatchToProps
)(EquipoContainer);
