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
  }
};
