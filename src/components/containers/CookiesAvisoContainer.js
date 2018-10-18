import React, { Component } from "react";
import { connect } from "react-redux";

import actions from "../../actions";
import "../css/general.css";
import { Alert } from "reactstrap";
import { cookiesInfoCorta, cookiesInfoLarga } from "../../utils/contactoCopy";

class CookiesAvisoContainer extends Component {
  constructor() {
    super();
    this.state = {
      showAlert: false
    };
  }
  handleClick(event) {
    if (event.target.id === "masInfo") {
      this.setState({ showAlert: true });
    }
    if (event.target.id === "aceptar") {
      this.props.cierraCookiesAviso();
    }
  }
  render() {
    if (this.props.navigation) {
      if (!this.props.navigation.showAvisoCookies) {
        return null;
      }
    }
    return (
      <div className="cookies__aviso">
        {this.state.showAlert && (
          <div>
            <Alert color="secundary">{cookiesInfoLarga}</Alert>
          </div>
        )}
        <h6 style={{ display: "inline" }}>{cookiesInfoCorta}</h6>
        <h5
          id="masInfo"
          onClick={this.handleClick.bind(this)}
          style={{ display: "inline", fontWeight: "bold", cursor: "pointer" }}
        >
          {" "}
          aquí{" "}
        </h5>
        para más información
        <button
          id="aceptar"
          style={{
            border: "1px solid white",
            display: "inline",
            backgroundColor: "black",
            marginLeft: "5px",
            color: "white",
            cursor: "pointer"
          }}
          onClick={this.handleClick.bind(this)}
        >
          Aceptar
        </button>
      </div>
    );
  }
}
const dispatchToProps = dispatch => {
  return {
    cierraCookiesAviso: () => dispatch(actions.cierraCookiesAviso())
  };
};

const stateToProps = state => {
  return {
    navigation: state.navigation
  };
};

export default connect(
  stateToProps,
  dispatchToProps
)(CookiesAvisoContainer);
