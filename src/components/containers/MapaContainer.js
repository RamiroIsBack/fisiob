import React, { Component } from "react";
import { connect } from "react-redux";
import Mapa from "../presentational/Mapa";
import { withScriptjs } from "react-google-maps";
class MapaContainer extends Component {
  render() {
    return (
      <div>
        <Mapa
          normalColor={this.props.normalColor ? true : false}
          containerElement={
            <div
              style={{
                height: this.props.mapHeigth || "260px"
              }}
            />
          }
          mapElement={<div style={{ height: "100%" }} />}
        />
      </div>
    );
  }
}

const stateToProps = state => {
  return {
    section: state.section,
    copy: state.copy
  };
};

export default connect(
  stateToProps,
  null
)(withScriptjs(MapaContainer));
