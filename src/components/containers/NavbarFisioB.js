import React from "react";
import { NavLink as NavlinkRouter } from "react-router-dom";
import {
  Collapse,
  Navbar,
  NavbarBrand,
  NavbarToggler,
  Nav,
  NavItem,
  NavLink,
  UncontrolledDropdown,
  DropdownToggle,
  DropdownMenu,
  DropdownItem
} from "reactstrap";
import { connect } from "react-redux";

import actions from "../../actions";
import history from "../../utils/history";
import TelAndMailContainer from "../containers/TelAndMailContainer";

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
      history.push("/servicios");
      this.props.moveToSection("");
    } else if (e.target.id === "equipo") {
      history.push("/equipo");
      this.props.moveToSection("");
    } else if (e.target.id === "contacto") {
      history.push("/contacto");
      this.props.moveToSection("");
    } else {
      this.props.moveToSection(e.target.id);
    }
  }
  render() {
    // <NavlinkRouter className="navbar-brand" to="/">
    //   <img src="/logoB.png" height="60" alt="" />
    // </NavlinkRouter>
    return (
      <div>
        <Navbar
          fixed={`top`}
          style={{ paddingBottom: 1 }}
          color="white"
          light
          expand="sm"
        >
          <NavbarToggler
            style={{ backgroundColor: "#fdb813" }}
            onClick={this.toggle}
          />
          <div
            style={{
              padding: "2px 5px 0 5px",
              borderRadius: "20px",
              backgroundColor: "#004383"
            }}
          >
            <TelAndMailContainer />
          </div>

          <Collapse
            isOpen={this.props.navigation.mobileTopMenu}
            navbar
            style={{ borderRadius: "5px", backgroundColor: "#fdb813" }}
          >
            <Nav className="navbar-nav w-100 justify-content-around">
              <NavItem>
                <NavLink
                  style={{ paddingLeft: "6px", cursor: "pointer" }}
                  id="equipo"
                  onClick={this.handleOnClick.bind(this)}
                >
                  EQUIPO
                </NavLink>
              </NavItem>
              <NavItem>
                <NavLink
                  style={{ paddingLeft: "6px", cursor: "pointer" }}
                  id="contacto"
                  onClick={this.handleOnClick.bind(this)}
                >
                  CONTACTO
                </NavLink>
              </NavItem>
              <UncontrolledDropdown nav inNavbar>
                <DropdownToggle
                  nav
                  caret
                  id="servicios"
                  style={{ paddingLeft: "6px", cursor: "pointer" }}
                  onClick={this.handleOnClick.bind(this)}
                >
                  SERVICIOS
                </DropdownToggle>
                <DropdownMenu right>
                  <DropdownItem
                    id="fisioterapia"
                    onClick={this.handleOnClick.bind(this)}
                  >
                    Fisioterapia
                  </DropdownItem>
                  <DropdownItem
                    id="osteopatia"
                    onClick={this.handleOnClick.bind(this)}
                  >
                    Osteopatia
                  </DropdownItem>
                  <DropdownItem divider />
                  <DropdownItem
                    id="pilates"
                    onClick={this.handleOnClick.bind(this)}
                  >
                    Pilates
                  </DropdownItem>
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
    toggleMobileTopMenu: open => dispatch(actions.toggleMobileTopMenu(open)),
    moveToSection: section => dispatch(actions.moveToSection(section))
  };
};

export default connect(
  stateToProps,
  dispatchToProps
)(NavbarFisioB);
