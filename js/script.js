/* js to make the table for parking section - vertical */
function parkingV(x){
    let grid = document.getElementById("grid");
    if(x = 20){
        var cols = 2;
        var rows = 10;
    }
    
    let parkNum = 0;
    let row = document.createElement("tr");
    grid.appendChild(row);

    for(var i = 0; i<rows; i++){
        console.log(i);
        let row = grid.insertRow();
        for(var j = 0; j < cols; j++){
            let cell = document.createElement("td");
            

            row.appendChild(cell);

            //add onclick feature where if selected color changes and add id so we can add it to cart
            //cell.addEventListener("onclick", )

            cell.append(parkNum);
            
            parkNum++;
        }
        grid.appendChild(row);
        
    }
    
}
/* js to make the table for parking section - horizontal */
function parkingH(x){
    let grid = document.getElementById("grid1");
    if(x = 10){
        var cols = 5;
        var rows = 2;
    }
    
    let parkNum = 0;
    let row = document.createElement("tr");
    grid.appendChild(row);

    for(var i = 0; i<rows; i++){
        console.log(i);
        let row = grid.insertRow();
        for(var j = 0; j < cols; j++){
            let cell = document.createElement("td");
            

            row.appendChild(cell);

            //add onclick feature where if selected color changes and add id so we can add it to cart
            //cell.addEventListener("onclick", )

            cell.append(parkNum);
            
            parkNum++;
        }
        grid.appendChild(row);
        
    }
    
}
