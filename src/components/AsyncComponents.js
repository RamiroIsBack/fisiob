import AsyncComponentHOC from "./AsyncComponentHOC";

const AsyncHome = AsyncComponentHOC(() => import("./layout/Home"));
const AsyncEquipo = AsyncComponentHOC(() => import("./layout/Equipo"));
export { AsyncHome, AsyncEquipo };
