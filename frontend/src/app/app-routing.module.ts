import { NgModule, Component } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { IndicacoesComponent } from './components/indicacoes/indicacoes.component';
import { LoginComponent } from './components/login/login.component';
import { GuardRouteService } from './shared/guard-route.service';



const appRoutes:  Routes = [
  {
  path:'',
  component: LoginComponent,
  },

  {
  path:'indicacoes',
  component: IndicacoesComponent,
  canActivate: [GuardRouteService]
  }
];

@NgModule({
  declarations: [],
  imports: [
    RouterModule.forRoot(appRoutes),
  ],
  exports:[RouterModule]
})
export class AppRoutingModule { }
