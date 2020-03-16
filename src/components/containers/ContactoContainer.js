import React, { Component } from "react";
import { connect } from "react-redux";

import MapaContainer from "./MapaContainer";

import { Container, Row, Col } from "reactstrap";

class ContactoContainer extends Component {
  getLeftPart({ telCopy, emailCopy, horario, direccion }) {
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
            <p style={{ margin: "5px" }}>horario:</p>
          </div>
          <div style={{ display: "inline-block" }}>
            <p>{horario}</p>
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
  getRightPart(direccion) {
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
    let leftJSX = "";
    let rightJSX = "";
    let apiKey = "";
    if (this.props.contactoCopy) {
      leftJSX = this.getLeftPart(this.props.contactoCopy);
      rightJSX = this.getRightPart(this.props.contactoCopy.direccion);
      apiKey = this.props.contactoCopy.direccion.apiKey;
    }
    let gMapURL = `https://maps.googleapis.com/maps/api/js?key=${apiKey}.exp&libraries=geometry,drawing,places`;
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
            googleMapURL={gMapURL}
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
              <div style={{ minWidth: "320px" }}>{rightJSX}</div>
            </Col>
          </Row>
        </Container>
      </div>
    );
  }
}
const stateToProps = ({ copy }) => copy;
export default connect(stateToProps, null)(ContactoContainer);
