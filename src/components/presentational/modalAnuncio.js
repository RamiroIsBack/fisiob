import React from "react";

class ModalAnuncio extends React.Component {
  constructor() {
    super();
    this.state = {
      show: false
    };
  }
  handleClick() {
    this.setState({ show: false });
  }
  componentDidMount() {
    this.setState({ show: this.props.anuncio });
  }
  render() {
    let mensaje = this.props.anuncioTexto;

    var backdropStyle = {
      position: "fixed",
      top: 0,
      left: 0,
      width: "100%",
      height: "100%",
      backgroundColor: "rgba(0,0,0,0.25)",
      zIndex: 167
    };
    var stiloModal = {
      position: "absolute",
      backgroundColor: "white",
      color: "black",
      textAlign: "center",
      backgroundPosition: "center",
      backgroundSize: "cover",
      backgroundRepeat: "no-repeat",
      width: 300,
      minHeight: 100,
      margin: "0 auto",
      zIndex: 168,
      top: "250px",
      left: "20px",
      right: "20px",
      border: "1px solid black",
      overflow: "auto",
      WebkitOverflowScrolling: "touch",
      borderRadius: "5px",
      outline: "none"
    };
    if (!this.state.show) {
      return <div />;
    } else {
      return (
        <div style={backdropStyle}>
          <div style={stiloModal}>
            <button
              style={{
                backgroundColor: "#004383",
                color: "#fdb813",
                borderRadius: "5px"
              }}
              onClick={this.handleClick.bind(this)}
            >
              X
            </button>
            <div style={{ padding: 10 }}>
              {mensaje.split("\n").map((item, key) => {
                return (
                  <span key={key}>
                    {item}
                    <br />
                  </span>
                );
              })}
            </div>
          </div>
        </div>
      );
    }
  }
}

export default ModalAnuncio;
