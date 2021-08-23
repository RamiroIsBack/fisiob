import React, { Component } from "react";
import { connect } from "react-redux";
import { Container } from "reactstrap";

class AvisoLegalContainer extends Component {
  
  render() {
    if (!this.props.copy.avisoLegalCopy) {
      return <p style={{textAlign:"center"}}>cargando Aviso legal, un momento porfavor ...</p>;
    }
    let avisoLegalObject = this.props.copy.avisoLegalCopy;
    return (
      <Container>
        <p>
          {avisoLegalObject.mensaje}
        </p>
        
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

export default connect(
  stateToProps,
  null
)(AvisoLegalContainer);
