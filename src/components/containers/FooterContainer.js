import React, { Component } from "react";
import { connect } from "react-redux";

import "../css/general.css";
import history from "../../utils/history";
import MapaContainer from "./MapaContainer";
import "../css/footer.css"; // eslint-disable-line no-unused-vars
import {
  telCopy,
  emailCopy,
  horario,
  direccion
} from "../../utils/contactoCopy";

class FooterContainer extends Component {
  handleClick(event) {
    window.scrollTo(0, 0);
    history.push("/");
  }
  render() {
    return (
      <div className="footer__container">
        <div className="footer__map__container">
          <MapaContainer
            googleMapURL="https://maps.googleapis.com/maps/api/js?key=AIzaSyClcb4B5oRktWDQWGU8Ev4hgYm5p_NXgL4&v=3.exp&libraries=geometry,drawing,places"
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
        <div className="row footer__horario__container">
          <div className="col-sm-3">
            <p
              style={{
                margin: "0 0 0 5px"
              }}
            >
              {horario.nombre}
            </p>
          </div>
          <div className="footer__horario col-sm-9">{horario.info}</div>
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
export default connect(
  null,
  null
)(FooterContainer);
