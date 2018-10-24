import React from "react";
import { Row, Col, Tooltip } from "reactstrap";

class ServiciosTecnicas extends React.Component {
  constructor() {
    super();
    this.state = {
      tecnicaSelected: "",
      indexTecnicaSelected: 0
    };
  }
  componentDidMount() {
    this.setState({
      tecnicaSelected: this.props.servicio.tecnicas[0].nombre,
      indexTecnicaSelected: 0
    });
  }
  render() {
    let servicio = this.props.servicio;
    let styleSelected = {
      borderBottom: "1px solid green",
      borderTop: "1px solid green",
      opacity: 1
    };
    let styleNotSelected = { opacity: 0.5 };
    return (
      <div>
        {servicio.tecnicas.map((tecnica, index) => (
          <div key={index}>
            <Row>
              <Col
                sm="auto"
                style={{ minWidth: "280px" }}
                style={
                  tecnica.nombre === this.state.tecnicaSelected
                    ? styleSelected
                    : styleNotSelected
                }
                onClick={() => {
                  this.setState({
                    tecnicaSelected: tecnica.nombre,
                    indexTecnicaSelected: index
                  });
                }}
              >
                {tecnica.nombre}
              </Col>
              <Col style={{ minWidth: "320px" }}>
                {tecnica.nombre === this.state.tecnicaSelected && (
                  <Row>
                    <Col style={{ minWidth: "220px" }}>{tecnica.texto}</Col>
                    <Col sm="auto">
                      <img
                        alt={tecnica.img.altText}
                        src={tecnica.img.src}
                        style={{ width: "280px" }}
                      />
                    </Col>
                  </Row>
                )}
              </Col>
            </Row>
          </div>
        ))}
      </div>
    );
  }
}

export default ServiciosTecnicas;
