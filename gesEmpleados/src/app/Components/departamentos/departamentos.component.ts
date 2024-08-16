import { Component } from '@angular/core';
import { DepartamentoService } from '../../Services/departamento.service';
import { IDepartamento } from '../../Interfaces/idepartamento';

@Component({
  selector: 'app-departamentos',
  standalone: true,
  imports: [],
  templateUrl: './departamentos.component.html',
  styleUrl: './departamentos.component.css',
})
export class DepartamentosComponent {
  constructor(private ServicioDepartamento: DepartamentoService) {}

  ngOnInit() {
    this.cargarDepartamentos();
  }

  listaDepartamentos: IDepartamento[] = [];

  cargarDepartamentos() {
    this.ServicioDepartamento.todosDepartamentos().subscribe((data) => {
      this.listaDepartamentos = data;
    });
  }

  eliminarDepartamento(empleado_id: number) {
    this.ServicioDepartamento.eliminarDepartamento(empleado_id).subscribe(
      (data) => {
        this.cargarDepartamentos();
      }
    );
  }
}
