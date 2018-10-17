import React, { Component } from "react";
import { Provider } from "react-redux";
import { Router, Route } from "react-router-dom";
import history from "./utils/history";
import "bootstrap/dist/css/bootstrap.css";

import store from "./stores";
import { AsyncHome, AsyncEquipo } from "./components/AsyncComponents";
import NavbarFisioB from "./components/containers/NavbarFisioB";
class App extends Component {
  render() {
    return (
      <Provider store={store.configure(null)}>
        <Router history={history}>
          <div>
            <NavbarFisioB />
            <div style={{ marginTop: "100px" }}>
              <Route exact path="/" component={AsyncHome} />
              <Route path="/Equipo" component={AsyncEquipo} />
            </div>
          </div>
        </Router>
      </Provider>
    );
  }
}

export default App;
