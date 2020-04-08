import { Injectable } from '@angular/core';
import {Subject} from 'rxjs';
import {FilmListModel} from '../../models/Film.list.model';
import {HttpClient} from '@angular/common/http';
import {environment} from '../../../../environments/environment';

@Injectable({
  providedIn: 'root'
})
export class FilmService {

  filmListSubject = new Subject<FilmListModel[]>();

  private filmLists = [];

  constructor(private httpClient: HttpClient) { }

  emitFilmSubject(){
    this.filmListSubject.next(this.filmLists.slice());
  }

  getFilmsList(){
    this.httpClient
      .get<any[]>(environment.url+'/films')
      .subscribe(
        (data) => {
          this.filmLists = data;
          this.emitFilmSubject();
        },
        (error) => {
          console.log('Erreur ! : ' + error);
        }
      )
  }
}
