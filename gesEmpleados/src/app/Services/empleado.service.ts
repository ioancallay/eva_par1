import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { IEmpleado } from '../Interfaces/iempleado';

@Injectable({
  providedIn: 'root',
})
export class EmpleadoService {
  constructor(private http: HttpClient) {}

  apiUrl = 'http://localhost/eva_par1/controllers/empleados.controller.php?op=';

  todosEmpleados(): Observable<IEmpleado[]> {
    return this.http.get<IEmpleado[]>(this.apiUrl + 'todosEmpleados');
  }

  eliminarEmpleado(empleado_id: number): Observable<number> {
    const formData = new FormData();
    formData.append('empleado_id', empleado_id.toString());
    return this.http.post<number>(this.apiUrl + 'eliminarEmpleado', formData);
  }
}
