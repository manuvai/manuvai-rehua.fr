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

  getDateLabel(exp: any): string {

    let start_date = new Date(exp.start_date);
    let month1 = start_date.toLocaleString('default', { month: 'long' });
    month1 = month1.substr( 0, 1 ).toUpperCase() + month1.substr( 1 )
    const year1 = start_date.getFullYear();
    
    if (!exp.end_date) {
      return `${month1} ${year1} - Aujourd'hui`
    }
    let end_date = new Date(exp.end_date);
    let month2 = end_date.toLocaleString('default', { month: 'long' });
    month2 = month2.substr( 0, 1 ).toUpperCase() + month2.substr( 1 )
    const year2 = end_date.getFullYear();
    return `${month1} ${year1} - ${month2} ${year2}`
  }

  ngOnInit(): void {
    this.httpService
      .getCursuses()
      .subscribe((response: any) => {
        this.experiences = response.data;
      });
  }

}
