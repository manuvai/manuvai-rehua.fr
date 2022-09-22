import { Component, OnInit } from '@angular/core';
import { HttpService } from 'src/app/http.service';

@Component({
  selector: 'app-contact',
  templateUrl: './contact.component.html',
  styleUrls: ['./contact.component.scss']
})
export class ContactComponent implements OnInit {

  linkedin_badge = '';

  constructor(private httpService: HttpService) { }

  ngOnInit(): void {
    this.httpService
      .getParameters()
      .subscribe((response: any) => {
        this.linkedin_badge = response.linkedin_badge
      })
  }

}
