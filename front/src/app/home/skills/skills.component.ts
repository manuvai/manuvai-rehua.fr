import { Component, OnInit } from '@angular/core';
import { HttpService } from 'src/app/http.service';

@Component({
  selector: 'app-skills',
  templateUrl: './skills.component.html',
  styleUrls: ['./skills.component.scss']
})
export class SkillsComponent implements OnInit {
  skills = [{
    image_path: '',    
    title: '',    
    rate: '',
  }]

  constructor(private httpService: HttpService) { }

  ngOnInit(): void {
    this.httpService
      .getSkills()
      .subscribe((response: any) => {
        this.skills = response.data;
        console.log(this.skills)
      });
  }

}
