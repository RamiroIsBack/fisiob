import React, { Component } from "react";
import { connect } from "react-redux";

import "../css/telMail.css";
import { telCopy, emailCopy } from "../../utils/contactoCopy";

class TelAndMailContainer extends Component {
  render() {
    return (
      <div>
        <div className="tel__container">
          <div className="tel__pic">
            <a
              href={"tel:" + telCopy.urlLink}
              style={{ color: "white", fontWeight: "bold" }}
            >
              <img className="picPhoto" alt="tel" src={telCopy.urlPic} />
            </a>
          </div>
          <div className="tel">
            <a
              href={"tel:" + telCopy.urlLink}
              style={{ color: "white", fontWeight: "bold" }}
            >
              {telCopy.urlLink}
            </a>
          </div>
        </div>
        <div
          style={{
            width: "80%",
            cursor: "default",
            textAlign: "center",
            color: "white",
            fontWeight: "lighter",
            margin: "auto"
          }}
        >
          <p
            style={{
              padding: 0,
              margin: 0
            }}
          >
            consultas y citas
          </p>
        </div>
        <div className="mail__container">
          <div className="mail__pic">
            <a
              href={"mailto:" + emailCopy.urlLink}
              style={{ color: "white", fontWeight: "bold" }}
            >
              <img className="picPhoto" src={emailCopy.urlPic} alt="mail" />
            </a>
          </div>
          <div className="mail">
            <a
              href={"mailto:" + emailCopy.urlLink}
              style={{ color: "white", fontWeight: "bold" }}
            >
              {emailCopy.urlLink}
            </a>
          </div>
        </div>
      </div>
    );
  }
}
export default connect(
  null,
  null
)(TelAndMailContainer);
