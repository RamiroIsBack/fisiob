import React, { Component } from "react";
import {
  withGoogleMap,
  GoogleMap,
  Marker,
  InfoWindow
} from "react-google-maps";

class Mapa extends Component {
  constructor() {
    super();
    this.state = {
      mapa: null
    };
  }

  makeMarker() {
    let marker = {};

    marker = (
      <Marker
        position={{
          lat: 40.4474684,
          lng: -3.7013178
        }}
        onClick={() =>
          this.handleClick(
            "https://www.google.com/maps/place/Fisioterapia+Buend%C3%ADa/@40.4474725,-3.7013178,17z/data=!3m1!4b1!4m5!3m4!1s0xd4228f93ff787fb:0x39239806bd70c985!8m2!3d40.4474684!4d-3.6991291"
          )
        }
      >
        <InfoWindow>
          <div style={{ maxWidth: 600, padding: 0, margin: 0 }}>
            <img
              role="presentation"
              src="/logoB.png"
              className="infoWindow__img"
              alt="foto"
              id="fotoInfoWindow"
              style={{
                opacity: 0.9,
                maxHeight: 60,
                maxWidth: 100,
                cursor: "pointer",
                marginRight: "2px"
              }}
              onClick={() =>
                this.handleClick(
                  "https://www.google.com/maps/place/Fisioterapia+Buend%C3%ADa/@40.4474725,-3.7013178,17z/data=!3m1!4b1!4m5!3m4!1s0xd4228f93ff787fb:0x39239806bd70c985!8m2!3d40.4474684!4d-3.6991291"
                )
              }
            />
            {this.props.normalColor && (
              <div>
                <p style={{ margin: "5px 0 5px 0" }}>C/ Artistas 57</p>
              </div>
            )}
          </div>
        </InfoWindow>
      </Marker>
    );

    return marker;
  }
  handleClick(urlToGo) {
    window.open(urlToGo, "_blank");
  }

  render() {
    let marker = this.makeMarker();
    return (
      <GoogleMap
        defaultOptions={{
          styles: !this.props.normalColor
            ? [
                {
                  featureType: "road",
                  elementType: "geometry",
                  stylers: [
                    {
                      lightness: 100
                    },
                    {
                      visibility: "simplified"
                    }
                  ]
                },
                {
                  featureType: "road",
                  elementType: "labels",
                  stylers: [
                    {
                      visibility: "off"
                    }
                  ]
                },
                {
                  featureType: "transit.line",
                  elementType: "geometry",
                  stylers: [
                    {
                      visibility: "on"
                    },
                    {
                      lightness: 700
                    }
                  ]
                }
              ]
            : []
        }}
        defaultZoom={15}
        defaultCenter={{ lat: 40.4487829, lng: -3.6989253 }}
      >
        {marker}
      </GoogleMap>
    );
  }
}

export default withGoogleMap(Mapa);
