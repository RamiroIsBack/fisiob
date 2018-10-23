import React, { Component } from "react";
import { connect } from "react-redux";

import history from "../../utils/history";
import MapaContainer from "./MapaContainer";
import {
  telCopy,
  emailCopy,
  horario,
  direccion
} from "../../utils/contactoCopy";
import { Container, Row, Col } from "reactstrap";

class ContactoContainer extends Component {
  handleClick(event) {
    window.scrollTo(0, 0);
    history.push("/");
  }
  getLeftPart() {
    return (
      <div>
        <div className="contacto__tel__container">
          <div style={{ display: "inline-block" }}>
            <div style={{ display: "inline-block" }}>
              <img
                style={{ margin: "2px", height: 30 }}
                src={telCopy.urlPic}
                alt="mail"
              />
            </div>
            <div style={{ display: "inline-block" }}>
              <a href={"mailto:" + telCopy.urlLink} style={{ color: "black" }}>
                {telCopy.urlLink}
              </a>
            </div>
          </div>
        </div>
        <div className="contacto__mail__container">
          <div style={{ display: "inline-block" }}>
            <div style={{ display: "inline-block" }}>
              <img
                style={{ margin: "2px", height: 30 }}
                src={emailCopy.urlPic}
                alt="mail"
              />
            </div>
            <div style={{ display: "inline-block" }}>
              <a
                href={"mailto:" + emailCopy.urlLink}
                style={{ color: "black" }}
              >
                {emailCopy.urlLink}
              </a>
            </div>
          </div>
        </div>
        <div style={{ display: "inline-block" }}>
          <div style={{ display: "inline-block" }}>
            <p style={{ margin: "5px" }}>{horario.nombre}</p>
          </div>
          <div style={{ display: "inline-block" }}>
            <p>{horario.info}</p>
          </div>
        </div>

        <div className="contacto__direccion__container">
          <a
            href={direccion.urlLink}
            style={{
              marginLeft: "5px",
              textAlign: "left",
              color: "black"
            }}
          >
            {direccion.nombre}
          </a>
        </div>
      </div>
    );
  }
  getRightPart() {
    return direccion.detalles.split("\n").map((item, key) => {
      return (
        <span style={{ margin: "10px 0 0 5px" }} key={key}>
          {item}
          <br />
        </span>
      );
    });
  }
  render() {
    let leftJSX = this.getLeftPart();
    let rightJSX = this.getRightPart();
    return (
      <div className="contacto__container">
        <div
          className="contacto__map__container"
          style={{
            marginLeft: "2%",
            marginRight: "2%"
          }}
        >
          <MapaContainer
            googleMapURL="https://maps.googleapis.com/maps/api/js?key=AIzaSyClcb4B5oRktWDQWGU8Ev4hgYm5p_NXgL4&v=3.exp&libraries=geometry,drawing,places"
            mapHeigth={window.innerHeight / 2}
            normalColor={true}
            loadingElement={<div style={{ height: "100%" }} />}
          />
        </div>
        <Container>
          <Row>
            <Col xs="auto">{leftJSX}</Col>
            <Col>
              <div>
                <p style={{ margin: "5px" }}>detalles de la zona:</p>
              </div>
              <div
                style={{ minWidth: "320px" }}
                className="contacto__direccion__detalles__container"
              >
                {rightJSX}
              </div>
            </Col>
          </Row>
        </Container>
      </div>
    );
  }
}
export default connect(
  null,
  null
)(ContactoContainer);
