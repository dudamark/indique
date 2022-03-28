import { Component } from '@angular/core';
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'unisuam-frontend';
  showHeader = false;
  background = false;
  // constructor(private route:ActivatedRoute) {
  //   route.params.subscribe(this.initialize())
  // }
  ngOnInit() {
    
    if(window.location.pathname == '/'){
      this.showHeader = false;
      this.background = true;
    }else{
      this.showHeader = true;
      this.background = false;
    }

  }

  
}
