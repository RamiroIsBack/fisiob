import React from "react";
import { Col, Tooltip } from "reactstrap";

class ServiciosTecnicas extends React.Component {
  constructor() {
    super();
    this.state = {
      tecnicaSelected: ""
    };
  }
  render() {
    let servicio = this.props.servicio;
    let styleSelected = {
      borderBottom: "1px solid green",
      borderTop: "1px solid green"
    };
    let styleNotSelected = {};
    return (
      <div>
        <Col sm="auto" style={{ minWidth: "280px" }}>
          {servicio.tecnicas.map((tecnica, index) => (
            <div
              style={
                tecnica.nombre === this.state.tecnicaSelected
                  ? styleSelected
                  : styleNotSelected
              }
              key={index}
            >
              {tecnica.nombre}
            </div>
          ))}
          <img
            alt={servicio.img.altText}
            src={servicio.img.src}
            style={{ width: "280px" }}
            id={servicio.nombre}
          />
        </Col>
        <Col style={{ minWidth: "320px" }}>{servicio.textoLargo}</Col>
      </div>
    );
  }
}

export default ServiciosTecnicas;
