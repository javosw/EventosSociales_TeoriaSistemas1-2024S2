import { bootstrapApplication } from '@angular/platform-browser';
import { appConfig } from './app/app.config';
import { OkhComponent } from './app/okh/okh.component';

bootstrapApplication(OkhComponent, appConfig).catch((err) => console.error(err));
