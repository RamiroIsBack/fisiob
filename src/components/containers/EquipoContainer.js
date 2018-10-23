import React, { Component } from "react";

import "../css/equipo.css";
import EquipoMember from "../presentational/EquipoMember";
import equipoObject from "../../utils/equipoObject";
import { textoLargoEquipo } from "../../utils/equipoObject";
class EquipoContainer extends Component {
  render() {
    return (
      <div>
        <div className="deck__container">
          {equipoObject.map((person, index) => (
            <div className="card__supercontainer">
              <div key={index} className="card__container">
                <EquipoMember person={person} />
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
          {textoLargoEquipo.split("\n").map((item, key) => {
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
export default EquipoContainer;
