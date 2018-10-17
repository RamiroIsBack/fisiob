import AsyncComponentHOC from "./AsyncComponentHOC";

const AsyncHome = AsyncComponentHOC(() => import("./layout/Home"));
const AsyncEquipo = AsyncComponentHOC(() => import("./layout/Equipo"));
const AsyncServicios = AsyncComponentHOC(() => import("./layout/Servicios"));
const AsyncContacto = AsyncComponentHOC(() => import("./layout/Contacto"));
export { AsyncHome, AsyncEquipo, AsyncServicios, AsyncContacto };
