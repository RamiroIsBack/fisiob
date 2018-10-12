import React, { Component } from "react";
import { Provider } from "react-redux";
import { BrowserRouter as Router, Route } from "react-router-dom";
//import "bootstrap/dist/css/bootstrap.css";
import "./App.css";

import store from "./stores";
import { AsyncHome } from "./components/AsyncComponents";

class App extends Component {
  render() {
    return (
      <Provider store={store.configure(null)}>
        <Router>
          <div>
            <Route exact path="/" component={AsyncHome} />
          </div>
        </Router>
      </Provider>
    );
  }
}

export default App;
