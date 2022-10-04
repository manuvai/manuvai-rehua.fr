import { HttpClient, HttpParams } from '@angular/common/http';
import { Injectable } from '@angular/core';
const API_URL = 'https://admin.manuvai-rehua.fr/api'

@Injectable({
  providedIn: 'root'
})
export class HttpService {


  constructor(private httpClient: HttpClient) { }

  getParameters() {
    
    return this.httpClient.get(`${API_URL}/settings`);

  
  }

  getSkills() {
    return this.httpClient.get(`${API_URL}/skills`);
  }
  getProjects() {
    return this.httpClient.get(`${API_URL}/projects`);
  }
  getCursuses() {
    return this.httpClient.get(`${API_URL}/cursuses`);
  }
  sendContact(useremail: string, username: string, message: string) {
    let body = new HttpParams()
      .set('email', useremail)
      .set('name', username)
      .set('message', message);
    return this.httpClient.post(`${API_URL}/contact`, body)
  }
}
