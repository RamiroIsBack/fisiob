import React, { Component } from "react";
import { connect } from "react-redux";
import actions from "../../actions";

class Home extends Component {
  closeMenuIfNeeded() {
    if (this.props.navigation.mobileTopMenu) {
      this.props.toggleMobileTopMenu(false);
    }
  }
  render() {
    let spaceForOpenTopMenu = this.props.navigation.mobileTopMenu
      ? { paddingTop: "110px" }
      : { paddingTop: 0 };
    return (
      <div
        onClick={this.closeMenuIfNeeded.bind(this)}
        style={spaceForOpenTopMenu}
      >
        <h1>Hola fisioB!!</h1>
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
)(Home);
