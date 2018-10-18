import React, { Component } from "react";

import "../css/equipo.css";
import EquipoMember from "../presentational/EquipoMember";
import equipoObject from "../../utils/equipoObject";
import { textoLargoEquipo } from "../../utils/equipoObject";
class EquipoContainer extends Component {
  render() {
    return (
      <div>
        <div className="deck_container">
          {equipoObject.map((person, index) => (
            <div key={index} className="card_container">
              <EquipoMember person={person} />
            </div>
          ))}
        </div>
        <div className="container">
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
