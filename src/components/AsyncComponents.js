import AsyncComponentHOC from "./AsyncComponentHOC";

const AsyncHome = AsyncComponentHOC(() => import("./layout/Home"));
const AsyncEquipo = AsyncComponentHOC(() => import("./layout/Equipo"));
const AsyncServicios = AsyncComponentHOC(() => import("./layout/Servicios"));
const AsyncInstalaciones = AsyncComponentHOC(() =>
  import("./layout/Instalaciones")
);
const AsyncTarifas = AsyncComponentHOC(() => import("./layout/Tarifas"));
const AsyncContacto = AsyncComponentHOC(() => import("./layout/Contacto"));
const AsyncAvisoLegal = AsyncComponentHOC(() => import("./layout/AvisoLegal"));
export {
  AsyncHome,
  AsyncEquipo,
  AsyncServicios,
  AsyncInstalaciones,
  AsyncTarifas,
  AsyncContacto,
  AsyncAvisoLegal
};
