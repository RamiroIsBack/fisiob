import constants from "../constants";

var initialState = {
  listaContenidos: [],
  ContenidosLoaded: false,

  carousellBackground: {
    urlPic: "",
    num: 1,
    carousellLength: 5
  }
};

export default (state = initialState, action) => {
  let newState = Object.assign({}, state);
  switch (action.type) {
    case constants.MOVE_CAROUSELL: {
      if (newState.listaContenidos.length !== 0) {
        for (let i = 0; i < newState.listaContenidos.length; i++) {
          let carousellObjectList = newState.listaContenidos[i];
          if (carousellObjectList.id === "carousell") {
            let numpic = 0;
            let carousellObject = "";
            if (action.data === "atras") {
              numpic = newState.carousellBackground.num - 1;
              numpic =
                numpic < 1
                  ? newState.carousellBackground.carousellLength
                  : numpic;
              carousellObject = "pic" + numpic;
              newState.carousellBackground.urlPic =
                carousellObjectList[carousellObject].urlPicCarousell;
              newState.carousellBackground.num = numpic;
            } else if (action.data === "alante") {
              numpic = newState.carousellBackground.num + 1;
              numpic =
                numpic > newState.carousellBackground.carousellLength
                  ? 1
                  : numpic;
              carousellObject = "pic" + numpic;
              newState.carousellBackground.urlPic =
                carousellObjectList[carousellObject].urlPicCarousell;
              newState.carousellBackground.num = numpic;
            } else {
              numpic = action.data + 1; //empieza en pic1 hasta pic5 no en 0
              carousellObject = "pic" + numpic;
              newState.carousellBackground.urlPic =
                carousellObjectList[carousellObject].urlPicCarousell;

              newState.carousellBackground.num = numpic;
            }
          }
        }
      }
      return newState;
    }
    case constants.INICIO_RECEIVED: {
      newState["inicioCopy"] = action.data;
      return newState;
    }
    case constants.EQUIPO_RECEIVED: {
      newState["equipoCopy"] = action.data;
      return newState;
    }
    case constants.INSTALACIONES_RECEIVED: {
      newState["instalacionesCopy"] = action.data;
      return newState;
    }

    case constants.SERVICIOS_RECEIVED: {
      newState["serviciosCopy"] = action.data;
      return newState;
    }
    case constants.TECNICAS_RECEIVED: {
      newState["tecnicasCopy"] = action.data;
      return newState;
    }
    case constants.CONTACTO_RECEIVED: {
      newState["contactoCopy"] = action.data;
      return newState;
    }

    default:
      return state;
  }
};
