export default {
  servicios: [
    {
      nombre: "fisioterapia",
      precio: 50,
      duracion: 50,
      bono: {
        modalidad: "sesiones",
        numero: 10,
        precio: 400
      }
    },
    {
      nombre: "osteopatia",
      precio: 50,
      duracion: 50,
      bono: {
        modalidad: "sesiones",
        numero: 10,
        precio: 400
      }
    },
    {
      nombre: "pilates",
      precio: 20,
      duracion: 50,
      bono: {
        modalidad: "mensual",
        numero: 8,
        precio: 80
      },
      horario: "M J 12:00-12:50 o L M 17:00-17:50"
    }
  ]
};