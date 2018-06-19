function mostrarSuscripcion(){
    $ventana = document.getElementById('panel-suscripcion');
    $ventana.style.display = 'block';
    let donaciones = document.getElementById('donaciones');
    donaciones.style.display = 'none';
    }

    function mostrarDireccion(){
    $ventana = document.getElementById('direccion');
    $ventana.style.display = 'block';
    }
    function ocultarDireccion(){
    $ventana = document.getElementById('direccion');
    $ventana.style.display = 'none';
    }
    function mostrarDonaciones(){
      $ventana = document.getElementById('panel-suscripcion');
      $ventana.style.display = 'none';
      let donaciones = document.getElementById('donaciones');
      donaciones.style.display = 'block';

    }

  localStorage.clear();
// Modulo para agregar suscripciones
//Variables
const añadir = document.getElementById('añadir-direccion');
const mostrar = document.getElementById('mostrar-direcciones');
const añadir_donacion = document.getElementById('añadir-donacion');
const mostrar_donacion = document.getElementById('mostrar-donacion');
//Listener
cargarEventListeners();
function cargarEventListeners(){
  añadir.addEventListener('click',agregarDireccion);
  // Borrar direcciones
//   mostrar.addEventListener('click',borrarDireccion);
  //Cargando Contenido
  document.addEventListener('DOMContentLoaded',localStorageListo);
  añadir_donacion.addEventListener('click',añadirDonacion);
}
//Funciones
function agregarDireccion(e){
    e.preventDefault();
     let datos = {
         nombre: document.getElementById('nombre_recibe').value,
         direccion: document.getElementById('direccion_suscripcion').value,
         especificacion: document.getElementById('especificacion_direccion_suscripcion').value,
         ciudad: document.getElementById('ciudad_suscripcion').value,
         observaciones: document.getElementById('observacion_suscripcion').value,
         pais: document.getElementById('pais_suscripcion').value,
         cantidad: document.getElementById('cantidad_suscripcion').value,
         telefono: document.getElementById('telefono_suscripcion').value,
     }
      agregarLocalStorage(datos);
      mostrarDirecciones(datos);

  }
//Agregando a un Array
function agregarArray(dato){
    let direccion = [];
     var ipt=JSON.stringify(dato); //Convierto la Lista de Productos a un JSON para procesarlo en tu controlador
     $('#ListaPro').val(encodeURIComponent(ipt));
     direccion = document.getElementById('ListaPro').value;
     direccion.push(dato);

}
function agregarLocalStorage(dato){
    let direcciones;
    direcciones = obtenerLocalStorage();
    direcciones.push(dato);
    // Convertir a arreglo
    localStorage.setItem('direcciones',JSON.stringify(direcciones));

    var ipt=JSON.stringify(direcciones); //Convierto la Lista de Productos a un JSON para procesarlo en tu controlador
     $('#ListaPro').val(encodeURIComponent(ipt));

    console.log(direcciones);

  }
  // Leer Local Storage
function obtenerLocalStorage(){
    let direcciones;
    if (localStorage.getItem('direcciones')=== null) {
        direcciones = [];
    }else{
      direcciones = JSON.parse(localStorage.getItem('direcciones'));
    }
    return direcciones;
  }
  // Mostrar lo que esta en el localStoage
  function localStorageListo(){
    let direcciones;
    direcciones = obtenerLocalStorage();
    direcciones.forEach(function(dato){
      const row = document.createElement('tr');
      row.innerHTML = `
              <td>
              <input type="text" class="input-suscripcion"  value="${dato.nombre}" name="recibe[]">
              </td>
              <td>
                  <input type="text" class="input-suscripcion"  value="${dato.direccion}" name="">
              </td>
              <td>
                  <input type="text" class="input-suscripcion"  value="${dato.cantidad}" name="">
              </td>

              <td>
                  <a href="#" class="borrar-direccion">X</a>
              </td>
      `;
       mostrar.appendChild(row);
    });
  }
 //Mostrar direcciones
function mostrarDirecciones(dato){
    const row = document.createElement('tr');
    row.innerHTML = `
            <td>
            <input type="text" class="input-suscripcion"  value="${dato.nombre}" name="recibe[]">
            </td>
            <td>
                <input type="text" class="input-suscripcion"  value="${dato.direccion}" name="">
            </td>
            <td>
                <input type="text" class="input-suscripcion"  value="${dato.cantidad}" name="">
            </td>

            <td>
                <a href="#" class="borrar-direccion">X</a>
            </td>
    `;
     mostrar.appendChild(row);
  }

// Creando programa de donacion
function añadirDonacion(e){
  e.preventDefault();
   let donacion = {
       benefactor: document.getElementById('nombre_benefactor').value,
       valor: document.getElementById('valor_donado').value,
       telefono: document.getElementById('telefono_donacion').value,
       ciudad: document.getElementById('ciudad_donacion').value,
       observacion: document.getElementById('observacion_donacion').value,
       pais: document.getElementById('pais_donacion').value,
       periodicidad: document.getElementById('periodicidad').value,
       programa: document.getElementById('programa').value,
   }
    localStorageDonaciones(donacion);
    mostrarDonacion(donacion);
}

function mostrarDonacion(donacion){
      const row = document.createElement('tr');
      row.innerHTML = `
              <td>
              <input type="text" class="input-suscripcion"  value="${donacion.benefactor}" name="recibe[]">
              </td>
              <td>
                  <input type="text" class="input-suscripcion"  value="${donacion.valor}" name="">
              </td>
              <td>
                  <input type="text" class="input-suscripcion"  value="${donacion.valor}" name="">
              </td>
              <td>
                  <a href="#" class="borrar-direccion">X</a>
              </td>
      `;
       mostrar_donacion.appendChild(row);
    }
    // Leer Local Storage
  function obtenerDonacionesLocalStorage(){
      let donaciones;
      if (localStorage.getItem('donaciones')=== null) {
          donaciones = [];
      }else{
        donaciones = JSON.parse(localStorage.getItem('donaciones'));
      }
      return donaciones;
    }

  function localStorageDonaciones(datos){
        let donaciones;
        donaciones = obtenerDonacionesLocalStorage();
        donaciones.push(datos);
        // Convertir a arreglo
        localStorage.setItem('donaciones',JSON.stringify(donaciones));
        var ipt=JSON.stringify(donaciones); //Convierto la Lista de Productos a un JSON para procesarlo en tu controlador
         $('#listaDonaciones').val(encodeURIComponent(ipt));
         console.log(donaciones);

      }
