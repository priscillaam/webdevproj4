/* js to make the table for parking section - vertical */
function parkingV1(x){
    let grid = document.getElementById("grid1");
    let cols = 2; 
    let rows = 10; 
    let parkNum;
    
    if(x == 1){
        parkNum = 0;
    }else if(x == 2){
        parkNum = 100;
    }else{
        parkNum = 200;
    }
    
    
    
    let row = document.createElement("tr");
    grid.appendChild(row);

    for(var i = 0; i<rows; i++){
        console.log(i);
        let row = grid.insertRow();
        for(var j = 0; j < cols; j++){
            let cell = document.createElement("td");
            
            cell.setAttribute('id', parkNum);
            cell.setAttribute('class', 'unsel');
            cell.addEventListener('click', onClick); 

            row.appendChild(cell);

            // testing
            cell.append(parkNum);
            
            parkNum++;
        }
        grid.appendChild(row);
        
    }
    
}
function parkingV2(x){
    let grid = document.getElementById("grid2");
    let cols = 2; 
    let rows = 10; 
    
    let parkNum;
    
    if(x == 1){
        parkNum = 20;
    }else if(x == 2){
        parkNum = 120;
    }else{
        parkNum = 220;
    }
    
    let row = document.createElement("tr");
    grid.appendChild(row);

    for(var i = 0; i<rows; i++){
        console.log(i);
        let row = grid.insertRow();
        for(var j = 0; j < cols; j++){
            let cell = document.createElement("td");
            
            cell.setAttribute('id', parkNum);
            cell.setAttribute('class', 'unsel');
            cell.addEventListener('click', onClick); 

            row.appendChild(cell);


            cell.append(parkNum);
            
            parkNum++;
        }
        grid.appendChild(row);
        
    }
    
}
function parkingV3(x){
    let grid = document.getElementById("grid3");
    let cols = 2; 
    let rows = 10; 
    
    let parkNum;
    
    if(x == 1){
        parkNum = 40;
    }else if(x == 2){
        parkNum = 140;
    }else{
        parkNum = 240;
    }


    let row = document.createElement("tr");
    grid.appendChild(row);

    for(var i = 0; i<rows; i++){
        console.log(i);
        let row = grid.insertRow();
        for(var j = 0; j < cols; j++){
            let cell = document.createElement("td");
            
            cell.setAttribute('id', parkNum);
            cell.setAttribute('class', 'unsel');
            cell.addEventListener('click', onClick); 

            row.appendChild(cell);


            cell.append(parkNum);
            
            parkNum++;
        }
        grid.appendChild(row);
        
    }
    
}
function parkingV4(x){
    let grid = document.getElementById("grid4");
    let cols = 2; 
    let rows = 10; 
    
    let parkNum;
    
    if(x == 1){
        parkNum = 60;
    }else if(x == 2){
        parkNum = 160;
    }else{
        parkNum = 260;
    }


    let row = document.createElement("tr");
    grid.appendChild(row);

    for(var i = 0; i<rows; i++){
        console.log(i);
        let row = grid.insertRow();
        for(var j = 0; j < cols; j++){
            let cell = document.createElement("td");
            
            cell.setAttribute('id', parkNum);
            cell.setAttribute('class', 'unsel');
            cell.addEventListener('click', onClick); 

            row.appendChild(cell);


            cell.append(parkNum);
            
            parkNum++;
        }
        grid.appendChild(row);
        
    }
    
}
/* js to make the table for parking section - horizontal */
function parkingH1(x){
    let grid = document.getElementById("grid5");
    let cols = 5; 
    let rows = 2;
    
    let parkNum;
    
    if(x == 1){
        parkNum = 80;
    }else if(x == 2){
        parkNum = 180;
    }else{
        parkNum = 280;
    }


    let row = document.createElement("tr");
    grid.appendChild(row);

    for(var i = 0; i<rows; i++){
        console.log(i);
        let row = grid.insertRow();
        for(var j = 0; j < cols; j++){
            let cell = document.createElement("td");
            
            cell.setAttribute('id', parkNum);
            cell.setAttribute('class', 'unsel');
            cell.addEventListener('click', onClick); 

            row.appendChild(cell);


            cell.append(parkNum);
            
            parkNum++;
        }
        grid.appendChild(row);
        
    }
    
}
function parkingH2(x){
    let grid = document.getElementById("grid6");
    let cols = 5; 
    let rows = 2;
    
    let parkNum;
    
    if(x == 1){
        parkNum = 90;
    }else if(x == 2){
        parkNum = 190;
    }else{
        parkNum = 290;
    }


    let row = document.createElement("tr");
    grid.appendChild(row);

    for(var i = 0; i<rows; i++){
        console.log(i);
        let row = grid.insertRow();
        for(var j = 0; j < cols; j++){
            let cell = document.createElement("td");
            
            cell.setAttribute('id', parkNum);
            cell.setAttribute('class', 'unsel');
            cell.addEventListener('click', onClick); 

            row.appendChild(cell);


            cell.append(parkNum);
            
            parkNum++;
        }
        grid.appendChild(row);
        
    }
    
}
function onClick(){
    let parkID = this.id;

    if(this.className === "sel") {
        this.setAttribute('class', 'unsel');
    }else{
        this.setAttribute('class', 'sel');
    }
    console.log(parkID);
}
