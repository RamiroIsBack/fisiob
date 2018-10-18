import React, { Component } from "react";
import { connect } from "react-redux";

import "../css/general.css";
import history from "../../utils/history";

class CookiesAvisoContainer extends Component {
  handleClick(event) {
    window.scrollTo(0, 0);
    history.push("/");
  }
  render() {
    return <div>blabalblablablablalblablabl Cookies blakjbalblbalbla</div>;
  }
}
export default connect(
  null,
  null
)(CookiesAvisoContainer);
