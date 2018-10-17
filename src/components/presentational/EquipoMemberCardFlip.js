import React, { Component } from "react";
import ReactCardFlip from "react-card-flip";
import "../css/equipo.css";

class EquipoMember extends Component {
  constructor() {
    super();
    this.state = {
      isFlipped: false
    };
    this.handleClick = this.handleClick.bind(this);
  }

  handleClick(e) {
    e.preventDefault();
    this.setState(prevState => ({ isFlipped: !prevState.isFlipped }));
  }
  render() {
    return (
      <div>
        <ReactCardFlip isFlipped={this.state.isFlipped}>
          <div key="front">
            <img src={this.props.person.urlPic} width="280" alt="" />
          </div>

          <div className="container-fluid" key="back">
            <div className="row" id="header">
              <div className="col-sm-8">
                <h4 style={{ marginBottom: 3 }}>{this.props.person.nombre}</h4>
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
            </div>

            <div
              className="col-sm-8"
              style={{ textAlign: "center", borderTop: "1px solid black" }}
            >
              estudios:
            </div>
            {this.props.person.formacion.map((estudio, index) => (
              <div key={index} className="row" id={`estudio${index}`}>
                <div className="col-sm-5">
                  <p style={{ margin: "0 0 1 0" }}>{estudio.estudios}</p>
                </div>
                <div className="col-sm-5">
                  <img src={estudio.centroUrlPic} width="60" alt="" />
                </div>
                <div className="col-sm-2">
                  <p style={{ margin: "0 0 1 0" }}>{estudio.fecha}</p>
                </div>
              </div>
            ))}
            <div
              className="col-sm-8"
              style={{ textAlign: "center", borderTop: "1px solid black" }}
            >
              tecnicas:
            </div>

            {this.props.person.tecnicas.map((tecnica, index) => (
              <div
                key={index}
                id={`tecnica${index}`}
                style={{
                  paddingRight: 2,
                  paddingLeft: 2,
                  border: "0.5px solid black",
                  borderStyle: "dotted",
                  display: "inline-block",
                  margin: "2px"
                }}
              >
                {tecnica}
              </div>
            ))}
          </div>
        </ReactCardFlip>
        <div>
          <button style={{ position: "absolute" }} onClick={this.handleClick}>
            Click to flip
          </button>
        </div>
      </div>
    );
  }
}
export default EquipoMember;
