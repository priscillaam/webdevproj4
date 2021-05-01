function setCCType(digit){
    var type = document.getElementById("ccType");
    type.innerHTML = checkCC(digit);
}

function checkCC(digit){

    if(digit.match("^4") != null){
        return "visa";
    }else if(digit.match('^5[1-5]') != null){
        return 'mastercard';
    }else if(digit.match("^34") != null || digit.match("^37") != null){
        return "amex";
    }else{
        return '';
    }

}

//script for getting total to display in checkout
function total(){
    var total = 0;
    var q = document.getElementById("number").value;
    var type = document.getElementById("ticket").value;

    if(type == "standard"){
        total = q * 7;
    }else {
        total = q * 15;
    }
    document.getElementById('total').textContent = "$"+total;
    console.log("$"+total);
}