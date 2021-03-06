import React from "react";
import axios from "axios";
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

class NavbarFisioB extends React.Component {
  constructor(props) {
    super(props);

    this.toggle = this.toggle.bind(this);
    this.closeMenu = this.closeMenu.bind(this);
    this.handleOnClick = this.handleOnClick.bind(this);
  }
  componentDidMount() {
    let urlHerokuPart = "https://stormy-meadow-66204.herokuapp.com";
    axios({
      method: "get",
      url: `${urlHerokuPart}/copy/inicio`
    })
      .then(res => {
        this.props.inicioReceived(res.data.inicioCopy[0]);
        axios({
          method: "get",
          url: `${urlHerokuPart}/copy/servicios`
        }).then(res => {
          this.props.serviciosReceived(res.data.serviciosCopy[0]);
          axios({
            method: "get",
            url: `${urlHerokuPart}/copy/tecnicas`
          }).then(res => {
            this.props.tecnicasReceived(res.data.tecnicasCopy[0]);
          });
        });
      })
      .catch(err => {
        console.log(err);
      });
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
        this.props.moveToSection(whereTo.toLowerCase());
      }, 400);
    }
    if (e.target.id !== "servicios") {
      window.scrollTo(0, 0);
      this.closeMenu();
    }
  }
  render() {
    let serviciosObject = undefined;
    if (this.props.copy) {
      if (this.props.copy.serviciosCopy) {
        serviciosObject = this.props.copy.serviciosCopy;
      }
    }

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
                  onClick={this.handleOnClick}
                >
                  EQUIPO
                </NavLink>
              </NavItem>
              <NavItem>
                <NavLink
                  style={{ paddingLeft: "6px", cursor: "pointer" }}
                  id="instalaciones"
                  onClick={this.handleOnClick}
                >
                  INSTALACIONES
                </NavLink>
              </NavItem>
              <NavItem>
                <NavLink
                  style={{ paddingLeft: "6px", cursor: "pointer" }}
                  id="tarifas"
                  onClick={this.handleOnClick}
                >
                  TARIFAS
                </NavLink>
              </NavItem>
              <NavItem>
                <NavLink
                  style={{ paddingLeft: "6px", cursor: "pointer" }}
                  id="contacto"
                  onClick={this.handleOnClick}
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
                  onClick={this.handleOnClick}
                >
                  SERVICIOS
                </DropdownToggle>
                <DropdownMenu right>
                  {serviciosObject ? (
                    serviciosObject.servicios.map((servicio, index) => (
                      <div
                        key={index}
                        id={servicio.nombre}
                        onClick={this.handleOnClick}
                        style={{
                          cursor: "pointer",
                          padding: 3,
                          width: "fit-content"
                        }}
                      >
                        <div key={index} style={{ display: "inline-block" }}>
                          <div style={{ display: "inline-block" }}>
                            <img
                              alt={servicio.nombre}
                              src={servicio.urlIcono}
                              style={{ height: 38 }}
                              id={servicio.nombre}
                              onClick={this.handleOnClick}
                            />
                          </div>
                          <div
                            style={{
                              display: "inline-block",
                              paddingLeft: "8px"
                            }}
                            id={servicio.nombre}
                            onClick={this.handleOnClick}
                          >
                            {servicio.nombre}
                          </div>
                        </div>
                      </div>
                    ))
                  ) : (
                    <div />
                  )}
                </DropdownMenu>
              </UncontrolledDropdown>
            </Nav>
          </Collapse>
        </Navbar>
      </div>
    );
  }
}
const stateToProps = ({ copy, navigation }) => {
  return {
    navigation,
    copy
  };
};
const dispatchToProps = dispatch => {
  return {
    toggleMobileTopMenu: open => dispatch(actions.toggleMobileTopMenu(open)),
    moveToSection: section => dispatch(actions.moveToSection(section)),
    inicioReceived: inicioCopy => dispatch(actions.inicioReceived(inicioCopy)),
    serviciosReceived: serviciosCopy =>
      dispatch(actions.serviciosReceived(serviciosCopy)),
    tecnicasReceived: tecnicasCopy =>
      dispatch(actions.tecnicasReceived(tecnicasCopy))
  };
};

export default connect(stateToProps, dispatchToProps)(NavbarFisioB);
