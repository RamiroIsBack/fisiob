import React, { Component } from "react";
import { connect } from "react-redux";

import serviciosObject from "../../utils/serviciosObject";
//import actions from "../../actions";

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
      <div>
        {serviciosObject.servicios.map((servicio, index) => {
          return (
            <div
              className="container"
              key={index}
              ref={el => (this[servicio.nombre] = el)}
            >
              <h1>{servicio.nombre}</h1>
              <p>{servicio.precio} Euros</p>
              <p>{servicio.duracion} minutos</p>
              <p>Tipo de bono:</p>
              <p>{servicio.bono.modalidad}</p>
              <p>{servicio.bono.numero} sesiones</p>
              <p>{servicio.bono.precio} euros</p>
              {servicio.horario && <p>horario:</p>}
              <p>{servicio.horario}</p>
            </div>
          );
        })}
      </div>
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
