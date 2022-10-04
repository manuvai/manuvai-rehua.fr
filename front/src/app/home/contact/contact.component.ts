import { HttpErrorResponse } from '@angular/common/http';
import { Component, ElementRef, OnInit, ViewChild } from '@angular/core';
import { HttpService } from 'src/app/http.service';

@Component({
  selector: 'app-contact',
  templateUrl: './contact.component.html',
  styleUrls: ['./contact.component.scss']
})
export class ContactComponent implements OnInit {

  linkedin_badge = '';
  name = ''
  email = ''
  message = ''

  constructor(private httpService: HttpService) { }

  ngSubmitForm(): void {
    let email = this.email;
    let name = this.name;
    let message = this.message;

    this.httpService
      .sendContact(email, name, message)
      .subscribe(data => { })
  }

  ngOnInit(): void {
    this.httpService
      .getParameters()
      .subscribe((response: any) => {
        this.linkedin_badge = response.linkedin_badge
      })
  }

}
