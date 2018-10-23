import React, { Component } from "react";
import { connect } from "react-redux";

import serviciosObject from "../../utils/serviciosObject";
//import actions from "../../actions";
import { Container, Row, Col } from "reactstrap";

class TarifasContainer extends Component {
  componentDidMount() {
    if (this.props.navigation.serviceSelected === "") {
      window.scroll(0, 0);
    }
  }
  componentWillReceiveProps(newProps) {
    if (
      this.props.navigation.serviceSelected !==
        newProps.navigation.serviceSelected &&
      newProps.navigation.serviceSelected !== ""
    ) {
      this.focusDiv(newProps.navigation.serviceSelected);
    }
  }

  focusDiv(servicio) {
    if (this[servicio]) {
      this[servicio].scrollIntoView({ blok: "start", behavior: "smooth" });
    }
  }
  render() {
    return (
      <Container>
        {serviciosObject.servicios.map((servicio, index) => {
          return (
            <div key={index} ref={el => (this[servicio.nombre] = el)}>
              <Row style={{ borderBottom: "2px solid #004383" }}>
                <h3 style={{ color: "#004383" }}>{servicio.nombre}</h3>
              </Row>
              <Row>
                <Col
                  style={{ minWidth: "183px" }}
                  xs={{ offset: 0, size: "auto" }}
                  md={{ size: "auto", offset: 3 }}
                >
                  Una sesion
                </Col>
                <Col size="auto">
                  <p>{servicio.precio} Euros</p>
                </Col>
              </Row>
              <Row>
                <Col
                  style={{ minWidth: "183px" }}
                  xs={{ offset: 0, size: "auto" }}
                  md={{ size: "auto", offset: 3 }}
                >
                  {`${servicio.bono.modalidad} ${
                    servicio.bono.numero
                  } sesiones`}
                </Col>
                <Col size="auto">
                  <p>{servicio.bono.precio} Euros</p>
                </Col>
              </Row>
              <Row>
                <Col
                  style={{ minWidth: "183px" }}
                  xs={{ offset: 0, size: "auto" }}
                  md={{ size: "auto", offset: 3 }}
                >
                  Bono 20 sesiones
                </Col>
                <Col size="auto">
                  <p>600 Euros</p>
                </Col>
              </Row>

              {servicio.horario && (
                <Row>
                  <Col
                    style={{ minWidth: "183px" }}
                    xs={{ offset: 0, size: "auto" }}
                    md={{ size: "auto", offset: 3 }}
                  >
                    <p>horario</p>
                  </Col>
                  <Col size="auto">
                    <p>{servicio.horario}</p>
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
const stateToProps = ({ navigation }) => {
  return {
    navigation
  };
};
// const dispatchToProps = dispatch => {
//   return {
//     movetoSection: section => dispatch(actions.movetoSection(section))
//   };
// };
export default connect(
  stateToProps,
  null
)(TarifasContainer);
