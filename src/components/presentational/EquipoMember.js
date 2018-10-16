import React, { Component } from "react";
import "../css/equipo.css";

class EquipoMember extends Component {
  render() {
    return (
      <div className="flip-container">
        <div className="flipper">
          <div className="front">
            <img src="/logoB.png" height="60" alt="" />
          </div>
          <div className="back">
            <h2>Equipazooo!</h2>
          </div>
        </div>
      </div>
    );
  }
}
export default EquipoMember;
