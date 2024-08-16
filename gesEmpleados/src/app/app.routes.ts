import { Routes } from '@angular/router';
import { EmpleadosComponent } from './Components/empleados/empleados.component';
import { DepartamentosComponent } from './Components/departamentos/departamentos.component';

export const routes: Routes = [
  { path: 'empleados', title: 'Empleados', component: EmpleadosComponent },
  { path: 'departamentos', title: 'Departamentos', component: DepartamentosComponent }
];
