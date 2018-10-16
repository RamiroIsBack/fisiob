import constants from "../constants";

var initialState = {
  mobileTopMenu: false
};

export default (state = initialState, action) => {
  let newState = Object.assign({}, state);
  switch (action.type) {
    case constants.TOGGLE_MOBILE_TOP_MENU: {
      newState["mobileTopMenu"] = action.data;
      return newState;
    }

    default:
      return state;
  }
};
