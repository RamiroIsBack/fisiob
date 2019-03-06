import React, { Component } from "react";
import { connect } from "react-redux";
import axios from "axios";

import actions from "../../actions";
import "../css/general.css";
import { Alert } from "reactstrap";

class CookiesAvisoContainer extends Component {
  constructor() {
    super();
    this.state = {
      showAlert: false
    };
    this.handleClick = this.handleClick.bind(this);
  }
  componentDidMount() {
    let urlHerokuPart = "https://stormy-meadow-66204.herokuapp.com";
    axios({
      method: "get",
      url: `${urlHerokuPart}/copy/contacto`
    })
      .then(res => {
        this.props.contactoReceived(res.data.contactoCopy[0]);
      })
      .catch(err => {
        console.log(err);
      });
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
      if (
        !this.props.navigation.showAvisoCookies ||
        !this.props.copy.contactoCopy
      ) {
        return null;
      }
    }
    return (
      <div className="cookies__aviso">
        {this.state.showAlert && (
          <div>
            <Alert color="secundary">
              {this.props.copy.contactoCopy.cookiesTextoLargo}
            </Alert>
          </div>
        )}
        <h6 style={{ display: "inline" }}>
          {this.props.copy.contactoCopy.cookiesTextoCorto}
        </h6>
        <h5
          id="masInfo"
          onClick={this.handleClick}
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
          onClick={this.handleClick}
        >
          Aceptar
        </button>
      </div>
    );
  }
}
const dispatchToProps = dispatch => {
  return {
    cierraCookiesAviso: () => dispatch(actions.cierraCookiesAviso()),
    contactoReceived: contactoCopy =>
      dispatch(actions.contactoReceived(contactoCopy))
  };
};

const stateToProps = state => {
  return {
    navigation: state.navigation,
    copy: state.copy
  };
};

export default connect(
  stateToProps,
  dispatchToProps
)(CookiesAvisoContainer);
