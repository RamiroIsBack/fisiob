import React, { Component } from "react";
import "../css/equipo.css";
import EquipoMember from "../presentational/EquipoMember";

class EquipoContainer extends Component {
  render() {
    let equipo = [
      {
        nombre: "Javi",
        cargo: "fisioterapeuta",
        urlPic: "https://homepages.cae.wisc.edu/~ece533/images/zelda.png",
        formacion: [
          {
            estudios: "fisioterapia",
            centroFormativo: "Universidad AlfonsoX el sabio",
            centroUrlPic: "/logoUax.png",
            centroUrl: "https://www.uax.es/grado-en-fisioterapia.html",
            fecha: 2002
          },
          {
            estudios: "Ostiopatia",
            centroFormativo: "Universidad de Alcalá de Henares ",
            centroUrlPic: "/logoUAH.png",
            centroUrl:
              "https://www.uah.es/es/estudios/estudios-propios/posgrados-propios/Master-en-Osteopatia/",
            fecha: 2008
          }
        ],
        tecnicas: [
          "fisioterapia deportiva",
          "kinesiología",
          "Radiología e Imagen Biomédica",
          "Pilates aplicado a la fisioterapia",
          "vendaje neuromuscular",
          "control motor cervical"
        ]
      },
      {
        nombre: "Nadia",
        cargo: "podologa",
        urlPic: "https://homepages.cae.wisc.edu/~ece533/images/barbara.png",
        formacion: [
          {
            estudios: "podología",
            centroFormativo: "universidad de A Coruña",
            centroUrlPic: "/logoUax.png",
            centroUrl:
              "https://www.uah.es/es/estudios/estudios-propios/posgrados-propios/Master-en-Osteopatia/",
            fecha: 2010
          },
          {
            estudios: "Patología y ortopedia del miembro inferior",
            centroFormativo: "Universidad Complutense de Madrid",
            centroUrlPic: "/logoUAH.png",
            centroUrl:
              "https://www.uah.es/es/estudios/estudios-propios/posgrados-propios/Master-en-Osteopatia/",
            fecha: 2012
          }
        ],
        tecnicas: [
          "quiropodias",
          "estudios biomecánicos",
          "farmacología",
          "pié diabético",
          "análisis de la pisada",
          "protesis plantares",
          "podología 3ª edad",
          "durezas",
          "helomas ",
          "uñas engrosadas",
          "uñas encarnadas",
          "papiloma",
          "hongos"
        ]
      }
    ];
    //TODO:: controlar con css la posicion de las cards de las personas segun el media query
    return (
      <div className="deck_container">
        {equipo.map((person, index) => (
          <div key={index} className="card_container">
            <EquipoMember person={person} />
          </div>
        ))}
      </div>
    );
  }
}
export default EquipoContainer;
