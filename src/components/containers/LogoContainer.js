import React, { Component } from "react";
import { connect } from "react-redux";

import "../css/general.css";
import history from "../../utils/history";

class LogoContainer extends Component {
  handleClick(event) {
    window.scrollTo(0, 0);
    history.push("/");
  }
  render() {
    return (
      <div>
        <img
          className="logo__top__img"
          src="/logoB.png"
          onClick={this.handleClick.bind(this)}
          alt="logo"
        />
      </div>
    );
  }
}
export default connect(
  null,
  null
)(LogoContainer);
