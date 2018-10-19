import React, { Component } from "react";
import { connect } from "react-redux";

import "../css/general.css";
import history from "../../utils/history";
import MapaContainer from "./MapaContainer";
import "../css/footer.css"; // eslint-disable-line no-unused-vars
import { telCopy, emailCopy } from "../../utils/contactoCopy";

class FooterContainer extends Component {
  handleClick(event) {
    window.scrollTo(0, 0);
    history.push("/");
  }
  render() {
    let downloadCopy = {};
    let connectList = [];
    return (
      <div className="footer__container">
        <div className="footer__map__container">
          <MapaContainer
            googleMapURL="https://maps.googleapis.com/maps/api/js?key=AIzaSyClcb4B5oRktWDQWGU8Ev4hgYm5p_NXgL4&v=3.exp&libraries=geometry,drawing,places"
            loadingElement={<div style={{ height: "100%" }} />}
          />
        </div>
        <div className="footer__tel__container">
          <div className="footer__tel">
            <a
              href={"tel:" + telCopy.urlLink}
              style={{ color: "white", fontWeight: "bold" }}
            >
              {telCopy.urlLink}
            </a>
          </div>
          <div className="footer__tel__pic">
            <img className="footer__picPhoto" alt="tel" src={telCopy.urlPic} />
          </div>
        </div>
        <div className="footer__mail__container">
          <div className="footer__mail">
            <a
              href={"mailto:" + emailCopy.urlLink}
              style={{ color: "white", fontWeight: "bold" }}
            >
              {emailCopy.urlLink}
            </a>
          </div>
          <div className="footer__mail__pic">
            <img
              className="footer__picPhoto"
              src={emailCopy.urlPic}
              alt="mail"
            />
          </div>
        </div>
      </div>
    );
  }
}
export default connect(
  null,
  null
)(FooterContainer);
