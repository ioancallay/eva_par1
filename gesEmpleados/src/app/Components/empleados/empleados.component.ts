import { Component } from '@angular/core';
import { EmpleadoService } from '../../Services/empleado.service';
import { IEmpleado } from '../../Interfaces/iempleado';

@Component({
  selector: 'app-empleados',
  standalone: true,
  imports: [],
  templateUrl: './empleados.component.html',
  styleUrl: './empleados.component.css',
})
export class EmpleadosComponent {
  constructor(private ServicioEmpleado: EmpleadoService) {}

  ngOnInit() {
    this.cargarEmpleados();
  }

  listaEmpleados: IEmpleado[] = [];

  cargarEmpleados() {
    this.ServicioEmpleado.todosEmpleados().subscribe((data) => {
      this.listaEmpleados = data;
    });
  }

  eliminarEmpleado(empleado_id: number) {
    this.ServicioEmpleado.eliminarEmpleado(empleado_id).subscribe((data) => {
      this.cargarEmpleados();
    });
  }
}
