import React, { Component } from "react";
import { connect } from "react-redux";

import MapaContainer from "./MapaContainer";
import "../css/footer.css"; // eslint-disable-line no-unused-vars

class FooterContainer extends Component {
  render() {
    if (!this.props.contactoCopy) {
      return null;
    }
    let { telCopy, emailCopy, horario, direccion } = this.props.contactoCopy;
    let gMapURL = `https://maps.googleapis.com/maps/api/js?key=${direccion.apiKey}.exp&libraries=geometry,drawing,places`;
    return (
      <div className="footer__container">
        <div className="footer__map__container">
          <MapaContainer
            googleMapURL={gMapURL}
            loadingElement={<div style={{ height: "100%" }} />}
          />
        </div>
        <div className="footer__tel__container">
          <div className="footer__tel__pic">
            <a href={"tel:" + telCopy.urlLink} style={{ color: "white" }}>
              <img
                className="footer__picPhoto"
                alt="tel"
                src={telCopy.urlPic}
              />
            </a>
          </div>
          <div className="footer__tel">
            <a href={"tel:" + telCopy.urlLink} style={{ color: "white" }}>
              {telCopy.urlLink}
            </a>
          </div>
        </div>
        <div className="footer__mail__container">
          <div className="footer__mail__pic">
            <a href={"mailto:" + emailCopy.urlLink} style={{ color: "white" }}>
              <img
                className="footer__picPhoto"
                src={emailCopy.urlPic}
                alt="mail"
              />
            </a>
          </div>
          <div className="footer__mail">
            <a href={"mailto:" + emailCopy.urlLink} style={{ color: "white" }}>
              {emailCopy.urlLink}
            </a>
          </div>
        </div>
        <div className="footer__horario__container">
          <div
            style={{
              marginLeft: "5px",
              color: "white"
            }}
          >
            {horario}
          </div>
        </div>

        <div className="footer__direccion__container">
          <a
            href={direccion.urlLink}
            style={{
              marginLeft: "5px",
              textAlign: "left",
              color: "white"
            }}
          >
            {direccion.nombre}
          </a>
        </div>
      </div>
    );
  }
}
const stateToProps = ({ copy }) => copy;
export default connect(stateToProps, null)(FooterContainer);
