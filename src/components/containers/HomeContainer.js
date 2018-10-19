import React, { Component } from "react";
import { connect } from "react-redux";

import "../css/home.css";
import history from "../../utils/history";
import CarouselContainer from "../containers/CarouselContainer";

class HomeContainer extends Component {
  handleClick(event) {
    window.scrollTo(0, 0);
    history.push("/");
  }
  render() {
    return (
      <div>
        <h1>Hola fisioB!!</h1>
        <div className="carousel__container">
          <CarouselContainer />
        </div>
      </div>
    );
  }
}
export default connect(
  null,
  null
)(HomeContainer);
