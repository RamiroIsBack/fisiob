import React, { Component } from "react";
import { connect } from "react-redux";

import "../css/general.css";
import history from "../../utils/history";

class FooterContainer extends Component {
  handleClick(event) {
    window.scrollTo(0, 0);
    history.push("/");
  }
  render() {
    return (
      <div>
        <div>blabalblablablablalblablabl Footer blakjbalblbalbla</div>
        <div>blabalblablablablalblablabl Footer blakjbalblbalbla</div>
        <div>blabalblablablablalblablabl Footer blakjbalblbalbla</div>
      </div>
    );
  }
}
export default connect(
  null,
  null
)(FooterContainer);
