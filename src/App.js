import React, { Component } from "react";
import { Provider } from "react-redux";
import { BrowserRouter as Router, Route } from "react-router-dom";
import "./App.css";
import "bootstrap/dist/css/bootstrap.css";

import store from "./stores";
import { AsyncHome, AsyncEquipo } from "./components/AsyncComponents";
import NavbarFisioB from "./components/containers/NavbarFisionB";
class App extends Component {
  render() {
    return (
      <Provider store={store.configure(null)}>
        <Router>
          <div>
            <NavbarFisioB />
            <Route exact path="/" component={AsyncHome} />
            <Route path="/Equipo" component={AsyncEquipo} />
          </div>
        </Router>
      </Provider>
    );
  }
}

export default App;
