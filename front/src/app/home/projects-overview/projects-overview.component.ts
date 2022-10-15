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
  }];

  modalData = {
    description: '',
    technologies: '',
    img_path: '',
    title: '',
  }
  constructor(private httpService: HttpService) { }

  computeModal(project: any) {
    this.modalData.title = project.title;
    this.modalData.img_path = `https://admin.manuvai-rehua.fr/storage/${project.img_path}`;
    this.modalData.description = project.description;
    this.modalData.technologies = project.technologies;
  }

  ngOnInit(): void {
    this.httpService
      .getProjects()
      .subscribe((response: any) => {
        this.projects = response.data;
      });
  }

}
