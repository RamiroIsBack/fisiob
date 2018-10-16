import React from "react";
import { NavLink as NavlinkRouter } from "react-router-dom";
import {
  Collapse,
  Navbar,
  NavbarToggler,
  Nav,
  NavItem,
  UncontrolledDropdown,
  DropdownToggle,
  DropdownMenu,
  DropdownItem
} from "reactstrap";

import { connect } from "react-redux";
import actions from "../../actions";

class NavbarFisioB extends React.Component {
  constructor(props) {
    super(props);

    this.toggle = this.toggle.bind(this);
  }
  toggle() {
    if (this.props.navigation) {
      this.props.ToggleMobileTopMenu(!this.props.navigation.mobileTopMenu);
    }
  }
  render() {
    return (
      <div>
        <Navbar fixed={`top`} color="white" light expand="sm">
          <NavbarToggler onClick={this.toggle} />

          <NavlinkRouter className="navbar-brand" to="/">
            <img src="/logoB.png" height="60" alt="" />
          </NavlinkRouter>

          <Collapse isOpen={this.props.navigation.mobileTopMenu} navbar>
            <Nav className="navbar-nav w-100 justify-content-around">
              <NavItem>
                <NavlinkRouter className="nav-link" to="/Equipo">
                  Equipo
                </NavlinkRouter>
              </NavItem>
              <NavItem>
                <NavlinkRouter className="nav-link" to="/Equipo">
                  Equipo
                </NavlinkRouter>
              </NavItem>
              <UncontrolledDropdown nav inNavbar>
                <DropdownToggle nav caret>
                  Options
                </DropdownToggle>
                <DropdownMenu right>
                  <DropdownItem>Option 1</DropdownItem>
                  <DropdownItem>Option 2</DropdownItem>
                  <DropdownItem divider />
                  <DropdownItem>Reset</DropdownItem>
                </DropdownMenu>
              </UncontrolledDropdown>
            </Nav>
          </Collapse>
        </Navbar>
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
    ToggleMobileTopMenu: open => dispatch(actions.ToggleMobileTopMenu(open))
  };
};

export default connect(
  stateToProps,
  dispatchToProps
)(NavbarFisioB);
