var init = () => {
  $("#frm_departamentos").on("submit", (e) => {
    crear_editar(e);
  });
};

$().ready(() => {
  cargarTabla();
  cargarEmpleados();
});

//TODO: Crear el select para el jefe de departamento
var cargarEmpleados = () => {
  $.get(
    "../controllers/empleados.controller.php?op=todosEmpleados",
    (lista) => {
      var html = "";
      html += `<option value="">Seleccione el jefe de departamento</option>`;
      lista = JSON.parse(lista);
      $.each(lista, (index, empleado) => {
        html += `<option value="${empleado.empleado_id}">${empleado.nombre} ${empleado.apellido}</option>`;
      });
      $("#jefe_departamento").html(html);
    }
  );
};

//TODO: Cargar la tabla de departamentos
var cargarTabla = () => {
  $.get(
    "../controllers/departamentos.controller.php?op=todosDepartamentos",
    (listaDepartamentos) => {
      var html = "";
      listaDepartamentos = JSON.parse(listaDepartamentos);
      $.each(listaDepartamentos, (index, departamento) => {
        html += `<tr>
                                <td>${index + 1}</td>
                                <td>${departamento.nombre}</td>
                                <td>${departamento.ubicacion}</td>
                                <td>${departamento.extension}</td>
                                <td>${departamento.jefe_departamento}</td>
                                <td>
                                     <button class="btn btn-primary" onclick="editar(${
                                       departamento.departamento_id
                                     })">Editar</button> 
                    <button class="btn btn-danger" onclick="eliminar(${
                      departamento.departamento_id
                    })">Eliminar</button>
                            </tr>`;
      });
      $("#tablaDepartamentos").html(html);
    }
  );
};

var crear_editar = (e) => {
  e.preventDefault();
  var datos = new FormData($("#frm_departamentos")[0]);
  var op = $("#departamento_id").val()
    ? "actualizarDepartamento"
    : "insertarDepartamento";
  console.log(datos);
  $.ajax({
    url: `../controllers/departamentos.controller.php?op=${op}`,
    type: "POST",
    data: datos,
    processData: false,
    contentType: false,
    success: function (datos) {
      console.log(datos);
      $("#frm_departamentos")[0].reset();
      $("#modal").modal("hide");
      cargarTabla();
    },
  });
};

var editar = (departamento_id) => {
  apiUrl = `../controllers/departamentos.controller.php?op=unDepartamentoId&departamento_id=${departamento_id}`;
  console.log(apiUrl);
  $.get(apiUrl, (departamento) => {
    departamento = JSON.parse(departamento);
    $("#departamento_id").val(departamento.departamento_id);
    $("#nombre").val(departamento.nombre);
    $("#ubicacion").val(departamento.ubicacion);
    $("#extension").val(departamento.extension);
    $("#jefe_departamento").val(departamento.jefe_departamento);
    $("#modal").modal("show");
  });
};

var eliminar = (departamento_id) => {
  if (confirm("¿Estás seguro de que deseas eliminar este departamento?")) {
    $.post(
      "../controllers/departamentos.controller.php?op=eliminarDepartamento",
      { departamento_id: departamento_id },
      function (response) {
        alert(response);
        cargarTabla();
      }
    );
  }
};

init();
