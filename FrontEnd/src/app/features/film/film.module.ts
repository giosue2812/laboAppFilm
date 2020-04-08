import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { FilmRoutingModule } from './film-routing.module';
import { ListComponent } from './list/list.component';


@NgModule({
  declarations: [ListComponent],
  imports: [
    CommonModule,
    FilmRoutingModule
  ]
})
export class FilmModule { }
