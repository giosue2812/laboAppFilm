import { Component, OnInit } from '@angular/core';
import {Subscription} from 'rxjs';
import {FilmService} from '../../../core/services/film/film.service';

@Component({
  selector: 'app-list',
  templateUrl: './list.component.html',
  styleUrls: ['./list.component.scss']
})
export class ListComponent implements OnInit {

  filmSubscription: Subscription;

  films: any[];

  constructor(private filmService: FilmService) { }

  ngOnInit(): void {
    this.filmSubscription = this.filmService.filmListSubject.subscribe(
      (data:any[]) => {
        this.films = data
      }
    );
    this.filmService.getFilmsList();
  }
}
