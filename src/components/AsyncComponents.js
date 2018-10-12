import AsyncComponentHOC from "./AsyncComponentHOC";

const AsyncHome = AsyncComponentHOC(() => import("./layout/Home"));
export { AsyncHome };
