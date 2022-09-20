import { Component, OnInit } from '@angular/core';
import { HttpService } from 'src/app/http.service';

@Component({
  selector: 'app-projects-overview',
  templateUrl: './projects-overview.component.html',
  styleUrls: ['./projects-overview.component.scss']
})
export class ProjectsOverviewComponent implements OnInit {

  projects = [{
    title: '',
    img_path: '',
    description: '',
    technologies: '',
  }]
  constructor(private httpService: HttpService) { }

  ngOnInit(): void {
    this.httpService
      .getProjects()
      .subscribe((response: any) => {
        this.projects = response.data;
      });
  }

}
