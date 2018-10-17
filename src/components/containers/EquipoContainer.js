import React, { Component } from "react";

import "../css/equipo.css";
import EquipoMember from "../presentational/EquipoMember";
import equipoObject from "../../utils/equipoObject";
class EquipoContainer extends Component {
  render() {
    return (
      <div className="deck_container">
        {equipoObject.map((person, index) => (
          <div key={index} className="card_container">
            <EquipoMember person={person} />
          </div>
        ))}
      </div>
    );
  }
}
export default EquipoContainer;
