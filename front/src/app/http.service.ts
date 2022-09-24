import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class HttpService {


  constructor(private httpClient: HttpClient) { }

  getParameters() {
    
    return this.httpClient.get('https://admin.manuvai-rehua.fr/api/settings');

  
  }

  getSkills() {
    return this.httpClient.get('https://admin.manuvai-rehua.fr/api/skills');
  }
  getProjects() {
    return this.httpClient.get('https://admin.manuvai-rehua.fr/api/projects');
  }
  getCursuses() {
    return this.httpClient.get('https://admin.manuvai-rehua.fr/api/cursuses');
  }
}
