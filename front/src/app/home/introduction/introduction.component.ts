import { Component, OnInit } from '@angular/core';
import { HttpService } from 'src/app/http.service';

@Component({
  selector: 'app-introduction',
  templateUrl: './introduction.component.html',
  styleUrls: ['./introduction.component.scss']
})
export class IntroductionComponent implements OnInit {
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
        this.settings.introduction_text = "<h1 class=\"display-5 fw-bold lh-1 mb-3\">Bonjour, Je suis Manuvai REHUA</h1>" + this.settings.introduction_text
        this.settings.introduction_text+= `
        <div class="mt-4 d-grid gap-2 d-md-flex justify-content-md-start">
          <a class="btn btn-primary btn-lg px-4 me-md-2" download="" target="_blank" href="` + 'https://admin.manuvai-rehua.fr/storage/' + this.settings.cv_file_path + `">T&eacute;l&eacute;charger le CV</a>
          <a class="btn btn-outline-secondary btn-lg px-4" href="#contact">Envoyer un message</a>
        </div>
        `
      });

  }

}
