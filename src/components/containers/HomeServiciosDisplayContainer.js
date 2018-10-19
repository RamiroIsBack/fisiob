import React, { Component } from "react";
import { connect } from "react-redux";

import "../css/home.css";
import history from "../../utils/history";

class HomeServiciosDisplayContainer extends Component {
  handleClick(event) {
    window.scrollTo(0, 0);
    history.push("/");
  }
  render() {
    return (
      <div>
        <div className="container" style={{ textAlign: "center" }}>
          <h2>Servicios</h2>
        </div>
        <div className="row">
          <div className="col-sm-4 row" style={{ width: "auto" }}>
            <div
              className="col-xs-3 col-sm-3 col-md-6 col-lg-6 col-xl-6"
              style={{ width: "auto" }}
            >
              <img
                alt="fisioterapia"
                src="/fisioterapia.png"
                className="home__servicios__img"
              />
            </div>
            <div
              className="col-xs-9 col-sm-9 col-md-6 col-lg-6 col-xl-6"
              style={{ width: "auto" }}
            >
              <h4 style={{ right: 2, top: 2 }}>Fisioterapia</h4>
            </div>
          </div>
          <div className="col-sm-4 row" style={{ width: "auto" }}>
            <div
              className="col-xs-3 col-sm-3 col-md-6 col-lg-6 col-xl-6"
              style={{ width: "auto" }}
            >
              <img
                alt="osteopatia"
                src="/osteopatia.png"
                className="home__servicios__img"
              />
            </div>
            <div
              className="col-xs-9 col-sm-9 col-md-6 col-lg-6 col-xl-6"
              style={{ width: "auto" }}
            >
              <h4>Osteopatia </h4>
            </div>
          </div>
          <div className="col-sm-4 row" style={{ width: "auto" }}>
            <div
              className="col-xs-3 col-sm-3 col-md-6 col-lg-6 col-xl-6"
              style={{ width: "auto" }}
            >
              <img
                alt="pilates"
                src="/pilates.png"
                className="home__servicios__img"
              />
            </div>
            <div
              className="col-xs-9 col-sm-9 col-md-6 col-lg-6 col-xl-6"
              style={{ textAlign: "center", width: "auto" }}
            >
              <h4>Pilates </h4>
            </div>
          </div>
        </div>
      </div>
    );
  }
}
export default connect(
  null,
  null
)(HomeServiciosDisplayContainer);
