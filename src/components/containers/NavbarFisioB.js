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
import history from "../../utils/history";

class NavbarFisioB extends React.Component {
  constructor(props) {
    super(props);

    this.toggle = this.toggle.bind(this);
  }
  toggle() {
    if (this.props.navigation) {
      this.props.toggleMobileTopMenu(!this.props.navigation.mobileTopMenu);
    }
  }
  handleOnClick(e) {
    if (e.target.id === "servicios") {
      console.log("servicios pressed");
      history.push("/");
    }
    if (e.target.id === "fisioterapia") {
      console.log("fisioterapia pressed");
    }
    if (e.target.id === "ostiopatia") {
      console.log("ostiopatia pressed");
    }
    if (e.target.id === "pilates") {
      console.log("pilates pressed");
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
                  Contacto
                </NavlinkRouter>
              </NavItem>
              <UncontrolledDropdown nav inNavbar>
                <DropdownToggle
                  nav
                  caret
                  id="servicios"
                  onClick={this.handleOnClick.bind(this)}
                >
                  Servicios
                </DropdownToggle>
                <DropdownMenu right>
                  <DropdownItem>Fisioterapia</DropdownItem>
                  <DropdownItem>Ostiopatia</DropdownItem>
                  <DropdownItem divider />
                  <DropdownItem>Pilates</DropdownItem>
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
    toggleMobileTopMenu: open => dispatch(actions.toggleMobileTopMenu(open))
  };
};

export default connect(
  stateToProps,
  dispatchToProps
)(NavbarFisioB);
