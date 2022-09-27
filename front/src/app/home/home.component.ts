import { Component, OnInit } from '@angular/core';
import { HttpService } from '../http.service';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss']
})
export class HomeComponent implements OnInit {
  settings = {
    captcha_prv_key: "",
    captcha_pub_key: "",
    cv_file_path: "",
    email: "",
    hero_image_path: "",
    introduction_text: "",
    linkedin_badge: "",
    mobile: "",
    linkedin_link: "",
    github_link: "",
  };

  constructor(private httpService: HttpService) { }

  ngOnInit(): void {
    this.httpService
      .getParameters()
      .subscribe((response: any) => {
        this.settings = response;
      });
  }

}
