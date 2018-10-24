import React from "react";
import {
  Collapse,
  Navbar,
  NavbarToggler,
  Nav,
  NavItem,
  NavLink,
  UncontrolledDropdown,
  DropdownToggle,
  DropdownMenu
} from "reactstrap";
import { connect } from "react-redux";

import actions from "../../actions";
import history from "../../utils/history";
import TelAndMailContainer from "../containers/TelAndMailContainer";
import serviciosObject from "../../utils/serviciosObject";

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
  closeMenu() {
    if (this.props.navigation) {
      if (this.props.navigation.mobileTopMenu) {
        this.props.toggleMobileTopMenu(false);
      }
    }
  }
  handleOnClick(e) {
    if (e.target.id === "servicios") {
      this.props.moveToSection("");
    } else if (e.target.id === "equipo") {
      history.push("/equipo");
      this.props.moveToSection("");
    } else if (e.target.id === "instalaciones") {
      history.push("/instalaciones");
      this.props.moveToSection("");
    } else if (e.target.id === "tarifas") {
      history.push("/tarifas");
      this.props.moveToSection("");
    } else if (e.target.id === "contacto") {
      history.push("/contacto");
      this.props.moveToSection("");
    } else {
      history.push("/servicios");
      let whereTo = e.target.id;
      setTimeout(() => {
        this.props.moveToSection(whereTo);
      }, 400);
    }
    if (e.target.id !== "servicios") {
      window.scrollTo(0, 0);
      this.closeMenu();
    }
  }
  render() {
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
                  id="instalaciones"
                  onClick={this.handleOnClick.bind(this)}
                >
                  INSTALACIONES
                </NavLink>
              </NavItem>
              <NavItem>
                <NavLink
                  style={{ paddingLeft: "6px", cursor: "pointer" }}
                  id="tarifas"
                  onClick={this.handleOnClick.bind(this)}
                >
                  TARIFAS
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
                  {serviciosObject.servicios.map((servicio, index) => (
                    <div
                      key={index}
                      id={servicio.nombre}
                      onClick={this.handleOnClick.bind(this)}
                      style={{ cursor: "pointer", padding: 3 }}
                    >
                      <div key={index} className="row">
                        <div
                          className="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-6"
                          style={{ width: "auto" }}
                        >
                          <img
                            alt={servicio.urlPic.alt}
                            src={servicio.urlPic.src}
                            style={{ height: 38 }}
                            id={servicio.nombre}
                            onClick={this.handleOnClick.bind(this)}
                          />
                        </div>
                        <div
                          className="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-6"
                          style={{ padding: 0, width: "auto" }}
                          id={servicio.nombre}
                          onClick={this.handleOnClick.bind(this)}
                        >
                          {servicio.nombre}
                        </div>
                      </div>
                    </div>
                  ))}
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
