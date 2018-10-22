import AsyncComponentHOC from "./AsyncComponentHOC";

const AsyncHome = AsyncComponentHOC(() => import("./layout/Home"));
const AsyncEquipo = AsyncComponentHOC(() => import("./layout/Equipo"));
const AsyncServicios = AsyncComponentHOC(() => import("./layout/Servicios"));
const AsyncInstalaciones = AsyncComponentHOC(() =>
  import("./layout/Instalaciones")
);
export { AsyncHome, AsyncEquipo, AsyncServicios, AsyncInstalaciones };
