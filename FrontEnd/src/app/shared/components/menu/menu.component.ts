import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-menu',
  templateUrl: './menu.component.html',
  styleUrls: ['./menu.component.scss']
})
export class MenuComponent implements OnInit {

  items = [
    {
      title: 'Film',
      link: 'film/list'
    }
  ];

  constructor() { }

  ngOnInit(): void {
  }

}
