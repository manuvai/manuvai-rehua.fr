import { Component, OnInit } from '@angular/core';
import { HttpService } from 'src/app/http.service';

@Component({
  selector: 'app-cursuses',
  templateUrl: './cursuses.component.html',
  styleUrls: ['./cursuses.component.scss']
})
export class CursusesComponent implements OnInit {

  experiences = [{
    name: '',
    company: '',
    place: '',
    start_date: '',
    end_date: '',
    description: '',
    type: '',
  }]
  constructor(private httpService: HttpService) { }

  getIcon(type: string): string {
    return((type == 'job') ? 'briefcase' : (((type == 'school') ? 'book' : 'clipboard')))
  }
  ngOnInit(): void {
    this.httpService
      .getCursuses()
      .subscribe((response: any) => {
        this.experiences = response.data;
      });
  }

}
