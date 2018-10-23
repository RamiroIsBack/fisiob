import React, { Component } from "react";
import "../css/equipo.css";

class EquipoMember extends Component {
  constructor() {
    super();
    this.state = {
      flipEffect: {},
      fliped: false
    };
  }
  flipIt(e) {
    //     /* flip the pane when hovered */
    // .flip-container:hover .flipper,
    // .flip-container.hover .flipper {
    //   transform: rotateY(180deg);
    if (this.state.fliped) {
      this.setState({
        flipEffect: { transform: "rotateY(0deg)" },
        fliped: false
      });
    } else {
      this.setState({
        flipEffect: { transform: "rotateY(180deg)" },
        fliped: true
      });
    }
  }
  getTecnicas() {
    return (
      <div className="row">
        <div
          className="col-sm-12"
          style={{ textAlign: "center", borderTop: "1px solid black" }}
        >
          tecnicas:
        </div>

        {this.props.person.tecnicas.map((tecnica, index) => (
          <div
            className="equipo__member__button"
            key={index}
            id={`tecnica${index}`}
            style={{
              paddingRight: 2,
              paddingLeft: 2,
              display: "inline-block",
              margin: "2px"
            }}
          >
            {tecnica}
          </div>
        ))}
      </div>
    );
  }
  getFlipButton() {
    return (
      <div
        className="equipo__member__button"
        onClick={this.flipIt.bind(this)}
        style={{
          backgroundColor: "black",
          right: -10,
          bottom: 6,
          zIndex: 100,
          position: "absolute"
        }}
      >
        {!this.state.fliped ? "Estudios" : "Foto"}
      </div>
    );
  }
  render() {
    let tecnicas = this.getTecnicas();
    let flipButton = this.getFlipButton();
    return (
      <div>
        <div className="flip-container">
          <div className="flipper" style={this.state.flipEffect}>
            <div className="front">
              <img src={this.props.person.urlPic} width="280" alt="" />
              {flipButton}
            </div>
            <div className="back">
              <div className="container-fluid">
                <div className="row" id="header">
                  <div className="col-sm-8">
                    <h4 style={{ marginBottom: 3 }}>
                      {this.props.person.nombre}
                    </h4>
                    <p
                      style={{
                        marginTop: 0,
                        marginBottom: 3
                      }}
                    >
                      {this.props.person.cargo}
                    </p>
                  </div>
                  <div style={{ position: "absolute", right: 10 }}>
                    <img src={this.props.person.urlPic} width="50" alt="" />
                  </div>
                  {flipButton}
                </div>

                <div
                  style={{
                    width: "60%",
                    textAlign: "center",
                    borderTop: "1px solid black"
                  }}
                >
                  estudios:
                </div>
                {this.props.person.formacion.map((estudio, index) => (
                  <div key={index} className="row" id={`estudio${index}`}>
                    <div className="col-sm-5" style={{ width: "auto" }}>
                      <p style={{ margin: "0 0 1 0" }}>{estudio.estudios}</p>
                    </div>
                    <div className="col-sm-5" style={{ width: "auto" }}>
                      <img src={estudio.centroUrlPic} width="60" alt="" />
                    </div>
                    <div className="col-sm-2" style={{ width: "auto" }}>
                      <p style={{ margin: "0 0 1 0" }}>{estudio.fecha}</p>
                    </div>
                  </div>
                ))}
                {tecnicas}
              </div>
            </div>
          </div>
        </div>
      </div>
    );
  }
}
export default EquipoMember;
