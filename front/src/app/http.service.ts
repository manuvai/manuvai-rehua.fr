import { HttpClient, HttpParams } from '@angular/common/http';
import { Injectable } from '@angular/core';
const API_URL = 'https://admin.manuvai-rehua.fr/api'

@Injectable({
  providedIn: 'root'
})
export class HttpService {
  settings: any = null
  skills: any = null  
  projects: any = null
  cursuses: any = null  

  constructor(private httpClient: HttpClient) { }

  getParameters() {
    
    if (!this.settings) {
      this.settings = this.httpClient.get(`${API_URL}/settings`);
      
    }
    return this.settings;

  
  }

  getSkills() {
    if (!this.skills) {
      this.skills = this.httpClient.get(`${API_URL}/skills`);
      
    }
    return this.skills;
  }
  getProjects() {
    if (!this.projects) {
      this.projects = this.httpClient.get(`${API_URL}/projects`);
      
    }
    return this.projects;
  }
  getCursuses() {
    if (!this.cursuses) {
      this.cursuses = this.httpClient.get(`${API_URL}/cursuses`);
      
    }
    return this.cursuses;
  }
  sendContact(useremail: string, username: string, message: string) {
    let body = new HttpParams()
      .set('email', useremail)
      .set('name', username)
      .set('message', message);
    return this.httpClient.post(`${API_URL}/contact`, body)
  }
}
