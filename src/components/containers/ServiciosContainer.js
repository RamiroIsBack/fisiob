import React, { Component } from "react";
import { connect } from "react-redux";
import { Container, Row, Col } from "reactstrap";

import serviciosObject from "../../utils/serviciosObject";
import ServiciosTecnicas from "../presentational/ServiciosTecnicas";
//import actions from "../../actions";

class ServiciosContainer extends Component {
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
            <div key={index}>
              <div
                ref={el => (this[servicio.nombre] = el)}
                style={{
                  marginTop: "60px",
                  paddingTop: "20px",
                  borderTopLeftRadius: "4px",
                  borderTopRightRadius: "4px",
                  borderTop: "3px solid #fdb813"
                }}
              />
              <Row>
                <div
                  style={{
                    textAlign: "center",
                    margin: "auto"
                  }}
                >
                  <img
                    alt={servicio.urlPic.alt}
                    src={servicio.urlPic.src}
                    style={{
                      height: 50,
                      display: "inline-block",
                      paddingBottom: 10
                    }}
                    id={servicio.nombre}
                  />
                  <h2
                    style={{
                      marginLeft: 10,
                      color: "#004383",
                      display: "inline-block"
                    }}
                  >
                    {servicio.nombre}
                  </h2>
                </div>
              </Row>
              <Row>
                <Col sm="auto" style={{ minWidth: "280px" }}>
                  <img
                    alt={servicio.img.altText}
                    src={servicio.img.src}
                    style={{ width: "280px", paddingBottom: "20px" }}
                    id={servicio.nombre}
                  />
                </Col>
                <Col style={{ minWidth: "320px", paddingBottom: "20px" }}>
                  {servicio.textoLargo}
                </Col>
              </Row>
              <div>
                <ServiciosTecnicas servicio={servicio} />
              </div>
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
)(ServiciosContainer);
