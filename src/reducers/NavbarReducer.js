import constants from "../constants";

var initialState = {
  mobileTopMenu: false,
  serviceSelected: "",
  showAvisoCookies: true
};

export default (state = initialState, action) => {
  let newState = Object.assign({}, state);
  switch (action.type) {
    case constants.TOGGLE_MOBILE_TOP_MENU: {
      newState["mobileTopMenu"] = action.data;
      return newState;
    }
    case constants.MOVE_TO_SECTION: {
      newState["serviceSelected"] = action.data;
      return newState;
    }
    case constants.CIERRA_COOKIES_AVISO:
      newState.showAvisoCookies = action.data;
      return newState;

    default:
      return state;
  }
};
