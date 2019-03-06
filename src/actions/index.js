import constants from "../constants";

export default {
  toggleMobileTopMenu: open => {
    return {
      type: constants.TOGGLE_MOBILE_TOP_MENU,
      data: open
    };
  },
  moveToSection: service => {
    return {
      type: constants.MOVE_TO_SECTION,
      data: service
    };
  },
  cierraCookiesAviso: () => {
    return {
      type: constants.CIERRA_COOKIES_AVISO,
      data: false
    };
  },
  inicioReceived: inicioCopy => {
    return {
      type: constants.INICIO_RECEIVED,
      data: inicioCopy
    };
  },
  equipoReceived: equipoCopy => {
    return {
      type: constants.EQUIPO_RECEIVED,
      data: equipoCopy
    };
  },
  instalacionesReceived: instalacionesCopy => {
    return {
      type: constants.INSTALACIONES_RECEIVED,
      data: instalacionesCopy
    };
  },
  tarifasReceived: tarifasCopy => {
    return {
      type: constants.TARIFAS_RECEIVED,
      data: tarifasCopy
    };
  },
  serviciosReceived: serviciosCopy => {
    return {
      type: constants.SERVICIOS_RECEIVED,
      data: serviciosCopy
    };
  },
  tecnicasReceived: tecnicasCopy => {
    return {
      type: constants.TECNICAS_RECEIVED,
      data: tecnicasCopy
    };
  },

  contactoReceived: contactoCopy => {
    return {
      type: constants.CONTACTO_RECEIVED,
      data: contactoCopy
    };
  }
};
