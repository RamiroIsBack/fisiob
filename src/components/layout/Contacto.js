import React, { Component } from "react";
import { connect } from "react-redux";

import "../css/layout.css";
import actions from "../../actions";

class Contacto extends Component {
  closeMenuIfNeeded() {
    if (this.props.navigation.mobileTopMenu) {
      this.props.toggleMobileTopMenu(false);
    }
  }
  render() {
    let spaceForOpenTopMenu = this.props.navigation.mobileTopMenu
      ? { animationName: "moveDownSlowly" }
      : {
          animationDelay: "0.5s",
          animationName: "moveUpSlowly"
        };
    return (
      <div
        className="layout__container"
        onClick={this.closeMenuIfNeeded.bind(this)}
        style={spaceForOpenTopMenu}
      >
        <h1>Contacta con el super fisioB!!</h1>
      </div>
    );
  }
}
const stateToProps = ({ navigation }) => {
  return {
    navigation
  };
};
const dispatchToProps = dispatch => {
  return {
    toggleMobileTopMenu: open => dispatch(actions.toggleMobileTopMenu(open))
  };
};
export default connect(
  stateToProps,
  dispatchToProps
)(Contacto);