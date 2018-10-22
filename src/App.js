import React, { Component } from "react";
import { Provider } from "react-redux";
import { Router, Route } from "react-router-dom";
import history from "./utils/history";
import "bootstrap/dist/css/bootstrap.css";

import store from "./stores";
import {
  AsyncHome,
  AsyncEquipo,
  AsyncInstalaciones,
  AsyncServicios
} from "./components/AsyncComponents";
import NavbarFisioB from "./components/containers/NavbarFisioB";
import LogoContainer from "./components/containers/LogoContainer";
import CookiesAvisoContainer from "./components/containers/CookiesAvisoContainer";
import FooterContainer from "./components/containers/FooterContainer";
import "./components/css/general.css";

class App extends Component {
  render() {
    let settingMinHigthToScreen = {
      minHeight: window.innerHeight
    };
    return (
      <Provider store={store.configure(null)}>
        <Router history={history}>
          <div className="general__container" style={settingMinHigthToScreen}>
            <div className="sticky__navbar__contanier">
              <NavbarFisioB />
            </div>
            <div className="logo__top__container">
              <LogoContainer />
            </div>
            <div className="main__container">
              <Route exact path="/" component={AsyncHome} />
              <Route path="/Equipo" component={AsyncEquipo} />
              <Route path="/Servicios" component={AsyncServicios} />
              <Route path="/Instalaciones" component={AsyncInstalaciones} />
            </div>
            <div className="cookies__aviso__container">
              <CookiesAvisoContainer />
            </div>

            <div className="footer__container__general">
              <FooterContainer />
            </div>
          </div>
        </Router>
      </Provider>
    );
  }
}

export default App;
