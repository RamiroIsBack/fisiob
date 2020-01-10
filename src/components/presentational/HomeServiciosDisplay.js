import React, { Component } from "react";
import "../css/home.css";

class HomeServiciosDisplayContainer extends Component {
  handleClick(event) {
    this.props.servicioSectionClicked(event.target.id);
  }
  render() {
    if (!this.props.serviciosObject) {
      return <div>Cargando los servicios... </div>;
    }
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
          {this.props.serviciosObject.servicios.map((servicio, index) => (
            <div
              key={index}
              className="col-xs-4 col-sm-4 col-md-3 col-lg-3 col-xl-3 row"
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
                  alt={servicio.nombre}
                  src={servicio.urlIcono}
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
