import React, { Component } from "react";
import "../css/equipo.css";
import EquipoMember from "../presentational/EquipoMember";

class EquipoContainer extends Component {
  render() {
    let equipo = [
      {
        nombre: "Javi",
        fotoUrl: "https://homepages.cae.wisc.edu/~ece533/images/zelda.png",
        formacion: [
          {
            estudios: "fisioterapia",
            centroFormativo: "Universidad AlfonsoX el sabio",
            fecha: 2002
          },
          {
            estudios: "Ostiopatia",
            centroFormativo: "Universidad de Alcalá de Henares ",
            fecha: 2002
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
        fotoUrl: "https://homepages.cae.wisc.edu/~ece533/images/barbara.png",
        formacion: [
          {
            estudios: "podología",
            centroFormativo: "universidad de A Coruña",
            fecha: 2010
          },
          {
            estudios: "Experto en patología y ortopedia del miembro inferior",
            centroFormativo: "Universidad Complutense de Madrid",
            fecha: 2012
          }
        ],
        tecnicas: [
          "quiropodias y estudios biomecánicos",
          "farmacología y pié diabético",
          "análisis de la pisada y ortesis plantares a medida",
          "podología 3ª edad",
          "Tratamiento de patologías como durezas,helomas ,uñas engrosadas,uñas encarnadas,papiloma,hongos..todo ello con la detección de la causa o problema biomecánico que lo produce"
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
