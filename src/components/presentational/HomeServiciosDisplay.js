import React, { Component } from "react";
import { connect } from "react-redux";

import "../css/home.css";
import history from "../../utils/history";
import serviciosObject from "../../utils/serviciosObject";

class HomeServiciosDisplayContainer extends Component {
  handleClick(event) {
    window.scrollTo(0, 0);
    history.push("/");
  }
  render() {
    return (
      <div>
        <div
          className="container"
          style={{ paddingBottom: "30px", textAlign: "center" }}
        >
          <h2 style={{ color: "#004383" }}>Servicios</h2>
          <div className="home__texto__border" />
        </div>
        <div className="row" style={{ margin: 0 }}>
          {serviciosObject.servicios.map((servicio, index) => (
            <div key={index} className="col-sm-4 row" style={{ width: "auto" }}>
              <div
                className="col-xs-3 col-sm-3 col-md-6 col-lg-6 col-xl-6"
                style={{ width: "auto" }}
              >
                <img
                  alt={servicio.urlPic.alt}
                  src={servicio.urlPic.src}
                  className="home__servicios__img"
                />
              </div>
              <div
                className="col-xs-9 col-sm-9 col-md-6 col-lg-6 col-xl-6"
                style={{ width: "auto" }}
              >
                <h4 style={{ color: "#004383" }}>{servicio.nombre}</h4>
              </div>
            </div>
          ))}
        </div>
      </div>
    );
  }
}
export default connect(
  null,
  null
)(HomeServiciosDisplayContainer);
