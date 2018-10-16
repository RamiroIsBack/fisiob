import constants from "../constants";
import { Firebase } from "../utils/Firebase";

export default {
  toggleMobileTopMenu: open => {
    return {
      type: constants.TOGGLE_MOBILE_TOP_MENU,
      data: open
    };
  }
};
