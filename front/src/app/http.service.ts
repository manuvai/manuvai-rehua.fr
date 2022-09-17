import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class HttpService {


  constructor(private httpClient: HttpClient) { }

  getParameters() {
    
    return this.httpClient.get('http://localhost:8000/api/settings');

  
  }

  getSkills() {
    return this.httpClient.get('http://localhost:8000/api/skills');
  }
  getProjects() {
    return this.httpClient.get('http://localhost:8000/api/projects');
  }
  getCursuses() {
    return this.httpClient.get('http://localhost:8000/api/cursuses');
  }
}
