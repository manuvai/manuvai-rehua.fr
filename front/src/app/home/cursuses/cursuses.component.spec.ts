import { ComponentFixture, TestBed } from '@angular/core/testing';

import { CursusesComponent } from './cursuses.component';

describe('CursusesComponent', () => {
  let component: CursusesComponent;
  let fixture: ComponentFixture<CursusesComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ CursusesComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(CursusesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
