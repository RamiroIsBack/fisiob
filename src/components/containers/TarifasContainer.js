import React, { Component } from "react";
import { connect } from "react-redux";
import history from "../../utils/history";
import actions from "../../actions";
import { Container, Row, Col } from "reactstrap";

class TarifasContainer extends Component {
  constructor(props) {
    super(props);
    this.moveToServicio = this.moveToServicio.bind(this);
  }
  componentDidMount() {
    if (this.props.navigation.serviceSelected === "") {
      window.scroll(0, 0);
    }
  }
  moveToServicio(e) {
    history.push("/servicios");
    let whereTo = e.target.id;
    setTimeout(() => {
      this.props.moveToSection(whereTo.toLowerCase());
    }, 400);
  }

  render() {
    if (!this.props.copy.serviciosCopy) {
      return `cargando tarifas, un momento porfavor ...`;
    }
    let serviciosObject = this.props.copy.serviciosCopy;
    return (
      <Container>
        {serviciosObject.servicios.map((servicio, index) => {
          return (
            <div
              style={{ paddingBottom: "40px" }}
              key={index}
              ref={el => (this[servicio.nombre] = el)}
            >
              <Row>
                <Col sm="4">
                  <div
                    style={{ cursor: "pointer" }}
                    id={servicio.nombre}
                    onClick={this.moveToServicio}
                  >
                    <h3 id={servicio.nombre} style={{ color: "#004383" }}>
                      {servicio.nombre}
                    </h3>
                  </div>
                </Col>
                <Col style={{ margin: "auto" }} sm="8">
                  <p style={{ display: "inline" }}>Duración: </p>
                  <h5 style={{ display: "inline", fontWeight: "bolder" }}>
                    {servicio.duracion}
                  </h5>{" "}
                  <p style={{ display: "inline" }}>minutos</p>
                </Col>
              </Row>
              <div
                style={{
                  width: "60%",
                  textAlign: "left",
                  borderRadius: "20",
                  borderBottom: "2px solid #004383",
                  margin: "3px 0 3px 0"
                }}
              />
              {servicio.precio === 0 || servicio.precio === "0" ? (
                <div />
              ) : (
                <Row style={{ marginBottom: "6px" }}>
                  <Col
                    style={{ minWidth: "183px" }}
                    xs={{ offset: 0, size: "auto" }}
                    md={{ size: "auto", offset: 4 }}
                  >
                    <p style={{ display: "inline" }}>precio por sesión: </p>
                    <h5 style={{ display: "inline", fontWeight: "bolder" }}>
                      {servicio.precio}
                    </h5>{" "}
                    <p style={{ display: "inline" }}>Euros</p>
                  </Col>
                </Row>
              )}
              {servicio.bono.modalidad === "sin bono" ? (
                <div />
              ) : (
                <Row style={{ marginBottom: "6px" }}>
                  <Col
                    style={{ minWidth: "183px" }}
                    xs={{ offset: 0, size: "auto" }}
                    md={{ size: "auto", offset: 4 }}
                  >
                    <p style={{ display: "inline" }}>
                      {servicio.bono.modalidad}{" "}
                    </p>
                    <p style={{ display: "inline" }}>
                      {servicio.bono.dias} días :{" "}
                    </p>
                    <h5 style={{ display: "inline", fontWeight: "bolder" }}>
                      {servicio.bono.precio}
                    </h5>{" "}
                    <p style={{ display: "inline" }}>Euros</p>
                  </Col>
                </Row>
              )}
            </div>
          );
        })}
      </Container>
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
    moveToSection: section => dispatch(actions.moveToSection(section))
  };
};
export default connect(
  stateToProps,
  dispatchToProps
)(TarifasContainer);
