import { Component } from '@angular/core';
import { RouterLink, RouterOutlet } from '@angular/router';
import { NavmenuComponent } from './Components/navmenu/navmenu.component';
import { FooterComponent } from './Components/footer/footer.component';

@Component({
  selector: 'app-root',
  standalone: true,
  imports: [RouterOutlet, RouterLink, NavmenuComponent, FooterComponent],
  templateUrl: './app.component.html',
  styleUrl: './app.component.css',
})
export class AppComponent {
  title = 'gesEmpleados';
}
