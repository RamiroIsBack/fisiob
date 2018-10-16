import React, { Component } from "react";
import { Provider } from "react-redux";
import { BrowserRouter as Router, Route } from "react-router-dom";
import "bootstrap/dist/css/bootstrap.css";

import store from "./stores";
import { AsyncHome, AsyncEquipo } from "./components/AsyncComponents";
import NavbarFisioB from "./components/containers/NavbarFisioB";
class App extends Component {
  render() {
    return (
      <Provider store={store.configure(null)}>
        <Router>
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
