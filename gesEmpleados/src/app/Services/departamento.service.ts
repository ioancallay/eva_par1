import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { IDepartamento } from '../Interfaces/idepartamento';

@Injectable({
  providedIn: 'root',
})
export class DepartamentoService {
  constructor(private http: HttpClient) {}

  apiUrl =
    'http://localhost/eva_par1/controllers/departamentos.controller.php?op=';

  todosDepartamentos(): Observable<IDepartamento[]> {
    return this.http.get<IDepartamento[]>(this.apiUrl + 'todosDepartamentos');
  }

  eliminarDepartamento(departamento_id: number): Observable<number> {
    const formData = new FormData();
    formData.append('departamento_id', departamento_id.toString());
    return this.http.post<number>(
      this.apiUrl + 'eliminarDepartamento',
      formData
    );
  }
}
