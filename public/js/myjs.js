function mostrarSuscripcion(){
$ventana = document.getElementById('panel-suscripcion');
$ventana.style.display = 'block';
}

function mostrarDireccion(){
$ventana = document.getElementById('direccion');
$ventana.style.display = 'block';
}
function ocultarDireccion(){
$ventana = document.getElementById('direccion');
$ventana.style.display = 'none';
}



// Modulo para agregar suscripciones



//Variables
const añadir = document.getElementById('añadir-direccion');
const mostrar = document.getElementById('mostrar-direcciones');

//Listener
cargarEventListeners();
function cargarEventListeners(){
  añadir.addEventListener('click',agregarDireccion);
  // Borrar direcciones
  mostrar.addEventListener('click',borrarDireccion);
  //Cargando Contenido
  document.addEventListener('DOMContentLoaded',localStorageListo);

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
   }

   mostrarDirecciones(datos);
   guardarListar(datos);
   // agregarLocalStorage(datos);

}

function guardarListar(dato){

  let direcciones = [];
  direcciones.push(dato);

  console.log(direcciones);


  // var ipt=JSON.stringify(dato); //Convierto la Lista de Productos a un JSON para procesarlo en tu controlador
  // $('#ListaPro').val(encodeURIComponent(ipt));


}

function agregarLocalStorage(dato){
  let direcciones;
  direcciones = obtenerLocalStorage();
  direcciones.push(dato);
  // Convertir a arreglo
  localStorage.setItem('direcciones',JSON.stringify(direcciones));
}
// const datos = document.getElementById('datos');
//   datos.setAttribute('value',dato);


//MOstrar datos del local storage

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
                <input type="text" class="input-suscripcion"  value="${dato.ciudad}" name="">
            </td>

            <td>
                <a href="#" class="borrar-direccion">X</a>
            </td>
    `;

     mostrar.appendChild(row);

  });

  console.log(direcciones);
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
              <input type="text" class="input-suscripcion"  value="${dato.ciudad}" name="">
          </td>

          <td>
              <a href="#" class="borrar-direccion">X</a>
          </td>
  `;

   mostrar.appendChild(row);
}


function borrarDireccion(e){
  e.preventDefault();
  if (e.target.className === 'borrar-direccion') {
      e.target.parentElement.parentElement.remove();

  }

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
