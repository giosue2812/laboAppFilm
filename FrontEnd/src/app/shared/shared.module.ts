import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { SharedRoutingModule } from './shared-routing.module';
import { MenuComponent } from './components/menu/menu.component';


@NgModule({
  declarations: [MenuComponent],
  imports: [
    CommonModule,
    SharedRoutingModule
  ],
  exports:[
    MenuComponent
  ]
})
export class SharedModule { }
