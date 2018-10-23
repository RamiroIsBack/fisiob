import React, { Component } from "react";
import "../css/home.css";
import serviciosObject from "../../utils/serviciosObject";

class HomeServiciosDisplayContainer extends Component {
  handleClick(event) {
    this.props.servicioSectionClicked(event.target.id);
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
            <div
              key={index}
              className="col-sm-4 row"
              id={servicio.nombre}
              onClick={this.handleClick.bind(this)}
              style={{ width: "auto", cursor: "pointer" }}
            >
              <div
                className="col-xs-3 col-sm-3 col-md-6 col-lg-6 col-xl-6"
                style={{ width: "auto" }}
                id={servicio.nombre}
              >
                <img
                  alt={servicio.urlPic.alt}
                  src={servicio.urlPic.src}
                  className="home__servicios__img"
                  id={servicio.nombre}
                />
              </div>
              <div
                className="col-xs-9 col-sm-9 col-md-6 col-lg-6 col-xl-6"
                style={{ width: "auto" }}
                id={servicio.nombre}
              >
                <h4 id={servicio.nombre} style={{ color: "#004383" }}>
                  {servicio.nombre}
                </h4>
              </div>
            </div>
          ))}
        </div>
      </div>
    );
  }
}
export default HomeServiciosDisplayContainer;
