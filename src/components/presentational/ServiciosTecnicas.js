import React from "react";
import { Row, Col } from "reactstrap";

class ServiciosTecnicas extends React.Component {
  constructor() {
    super();
    this.state = {
      tecnicaSelected: "",
      indexTecnicaSelected: 0
    };
  }

  render() {
    let styleSelected = {
      backgroundColor: " #004383",
      color: "white",
      borderRadius: "5px",
      padding: "2px",
      cursor: "pointer",
      textAlign: "center",
      opacity: 1
    };
    let styleNotSelected = {
      backgroundColor: "#6495ed",
      color: "white",
      borderRadius: "5px",
      padding: "2px",
      cursor: "pointer",
      textAlign: "center",
      opacity: 0.8
    };
    return (
      <div>
        {this.props.tecnicas.map((tecnica, index) => (
          <div key={index}>
            <Row>
              <Col sm="auto" style={{ paddingTop: 5, minWidth: "280px" }}>
                <div
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
                  id={tecnica.nombre
                    .toString()
                    .toLowerCase()
                    .replace(/\s/g, "")}
                >
                  {tecnica.nombre}
                </div>
              </Col>
              <Col style={{ minWidth: "320px" }}>
                {tecnica.nombre === this.state.tecnicaSelected && (
                  <Row
                    style={{ paddingTop: 5, borderTop: "1px solid #004383" }}
                  >
                    <Col style={{ minWidth: "220px" }}>{tecnica.texto}</Col>
                    <Col sm="auto">
                      <img
                        alt={tecnica.nombre}
                        src={tecnica.urlPic}
                        style={{ paddingBottom: 10, width: "280px" }}
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
