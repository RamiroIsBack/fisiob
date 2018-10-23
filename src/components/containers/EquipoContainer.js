import React, { Component } from "react";
import { connect } from "react-redux";

import actions from "../../actions";
import history from "../../utils/history";
import "../css/equipo.css";
import EquipoMember from "../presentational/EquipoMember";
import { equipoObject } from "../../utils/equipoObject";

class EquipoContainer extends Component {
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
        <div className="deck__container">
          {equipoObject.equipo.map((person, index) => (
            <div key={index} className="card__supercontainer">
              <div className="card__container">
                <EquipoMember
                  person={person}
                  servicioSectionClicked={this.servicioSectionClicked.bind(
                    this
                  )}
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
          {equipoObject.textoLargoEquipo.split("\n").map((item, key) => {
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
)(EquipoContainer);
