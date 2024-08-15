var init = () => {
  $("#frm_empleados").on("submit", (e) => {
    crear_editar(e);
  });
};

$().ready(() => {
  cargarTabla();
  cargarDepartamentos();
});

var cargarDepartamentos = () => {
  $.get(
    "../controllers/departamentos.controller.php?op=todosDepartamentos",
    (lista) => {
      var html = "";
      html += `<option value="">Seleccione una opcion</option>`;
      lista = JSON.parse(lista);
      $.each(lista, (index, departamento) => {
        html += `<option value="${departamento.departamento_id}">${departamento.nombre}</option>`;
      });
      $("#departamento_id").html(html);
    }
  );
};

//TODO: Cargar la tabla de empleados
var cargarTabla = () => {
  $.get(
    "../controllers/empleados.controller.php?op=todosEmpleados",
    (listaEmpleados) => {
      var html = "";
      listaEmpleados = JSON.parse(listaEmpleados);
      $.each(listaEmpleados, (index, empleado) => {
        html += `<tr>
                              <td>${index + 1}</td>
                              <td>${empleado.nombre}</td>
                              <td>${empleado.apellido}</td>
                              <td>${empleado.email}</td>
                              <td>${empleado.telefono}</td>
                              <td>${empleado.departamento_id}</td>
                              <td>
                                   <button class="btn btn-primary" onclick="editar(${
                                     empleado.empleado_id
                                   })">Editar</button> 
                  <button class="btn btn-danger" onclick="eliminar(${
                    empleado.empleado_id
                  })">Eliminar</button>
                          </tr>`;
      });
      $("#tablaEmpleados").html(html);
    }
  );
};

var crear_editar = (e) => {
  e.preventDefault();
  console.log("Crear o editar");
  var datos = new FormData($("#frm_empleados")[0]);
  var op = $("#empleado_id").val() ? "actualizarEmpleado" : "insertarEmpleado";
  console.log(datos);
  $.ajax({
    url: `../controllers/empleados.controller.php?op=${op}`,
    type: "POST",
    data: datos,
    processData: false,
    contentType: false,
    success: function (datos) {
      console.log(datos);
      $("#frm_empleados")[0].reset();
      $("#modal").modal("hide");
      cargarTabla();
    },
  });
};

var editar = (empleado_id) => {
  apiUrl = `../controllers/empleados.controller.php?op=unEmpleadoId&empleado_id=${empleado_id}`;
  console.log(apiUrl);
  $.get(apiUrl, (empleado) => {
    empleado = JSON.parse(empleado);
    $("#empleado_id").val(empleado.empleado_id);
    $("#nombre").val(empleado.nombre);
    $("#apellido").val(empleado.apellido);
    $("#email").val(empleado.email);
    $("#telefono").val(empleado.telefono);
    $("#departamento_id").val(empleado.departamento_id);
    $("#modal").modal("show");
  });
};

var eliminar = (empleado_id) => {
  if (confirm("¿Estás seguro de que deseas eliminar este empleado?")) {
    $.post(
      "../controllers/empleados.controller.php?op=eliminarEmpleado",
      { empleado_id: empleado_id },
      function () {
        cargarTabla();
      }
    );
  }
};

init();
