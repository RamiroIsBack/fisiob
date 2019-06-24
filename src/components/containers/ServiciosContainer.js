import React, { Component } from "react";
import { connect } from "react-redux";
import { Container, Row, Col } from "reactstrap";

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
  showTecnicasSinServicio = () => {
    let tecnicasSinServicio = this.props.copy.tecnicasCopy.tecnicas.filter(
      tecnica =>
        !this.props.copy.serviciosCopy.servicios.find(
          servicio =>
            servicio.nombre.toLowerCase() ===
            tecnica.servicioNombre.toLowerCase()
        )
    );
    if (tecnicasSinServicio.length !== 0) {
      return (
        <div>
          <div
            style={{
              textAlign: "center",
              margin: "auto"
            }}
          >
            <h2
              style={{
                marginLeft: 50,
                color: "#004383"
              }}
            >
              Diferentes Tecnicas
            </h2>
          </div>
          <ServiciosTecnicas tecnicas={tecnicasSinServicio} />
        </div>
      );
    } else {
      return <div />;
    }
  };

  render() {
    if (!this.props.copy.serviciosCopy) {
      return `cargando servicios, un momento porfavor ...`;
    }
    let serviciosObject = this.props.copy.serviciosCopy;
    return (
      <Container>
        {serviciosObject.servicios.map((servicio, index) => {
          let styleWithBorderTop = {
            paddingTop: "160px",
            borderTopLeftRadius: "4px",
            borderTopRightRadius: "4px",
            borderTop: "3px solid #fdb813"
          };
          let styleToAply =
            index !== 0 ? styleWithBorderTop : { paddingTop: "130px" };
          return (
            <div key={index}>
              <div
                ref={el => (this[servicio.nombre] = el)}
                style={styleToAply}
              />
              <Row>
                <div
                  style={{
                    textAlign: "center",
                    margin: "auto"
                  }}
                >
                  <img
                    alt={servicio.nombre}
                    src={servicio.urlIcono}
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
                    alt={servicio.nombre}
                    src={servicio.urlPic}
                    style={{ width: "280px", paddingBottom: "20px" }}
                    id={servicio.nombre}
                  />
                </Col>
                <Col style={{ minWidth: "320px", paddingBottom: "20px" }}>
                  {servicio.servicioTextoLargo}
                </Col>
              </Row>
              <div style={{ marginBottom: "20px" }}>
                {this.props.copy.tecnicasCopy ? (
                  <ServiciosTecnicas
                    tecnicas={this.props.copy.tecnicasCopy.tecnicas.filter(
                      tecnica =>
                        tecnica.servicioNombre.toLowerCase() ===
                        servicio.nombre.toLowerCase()
                    )}
                  />
                ) : (
                  <div />
                )}
              </div>
            </div>
          );
        })}
        {this.props.copy.tecnicasCopy ? this.showTecnicasSinServicio() : null}
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
// const dispatchToProps = dispatch => {
//   return {
//     movetoSection: section => dispatch(actions.movetoSection(section))
//   };
// };
export default connect(
  stateToProps,
  null
)(ServiciosContainer);
