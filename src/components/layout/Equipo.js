import React, { Component } from "react";
import { connect } from "react-redux";

import actions from "../../actions";
import EquipoContainer from "../containers/EquipoContainer";
import "../css/layout.css";

class Equipo extends Component {
  closeMenuIfNeeded = () => {
    if (this.props.navigation.mobileTopMenu) {
      this.props.toggleMobileTopMenu(false);
    }
  };
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
        onClick={this.closeMenuIfNeeded}
        style={spaceForOpenTopMenu}
      >
        <EquipoContainer />
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
)(Equipo);
