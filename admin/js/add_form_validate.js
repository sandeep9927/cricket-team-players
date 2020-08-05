function validate_form() {
    var name = document.getElementById('playerName').value;
    var juersey_number = document.getElementById('jsnumber').value;
    var image = document.getElementById('image').value;
    if (name == "") {
        document.getElementById('nameError').innerHTML = "**Please fill name**"
        return false;
    }else{
        document.getElementById('nameError').innerHTML = ""
    }
    if(name.length <=4 || name.length>20){
        document.getElementById('nameError').innerHTML = "**name length b\w 4 to 20**"
        return false;
    }
    else{
        document.getElementById('nameError').innerHTML = ""
    }
    if (juersey_number == "") {
        document.getElementById('jsError').innerHTML = "**Please fill jersey number**"
        return false;
    }else{
        document.getElementById('jsError').innerHTML = ""
    }
    if(isNaN(juersey_number)){
        document.getElementById('jsError').innerHTML = "**only number are valid**"
        return false;
    }
    if(juersey_number.length<=2 || juersey_number.length>5){
        document.getElementById('jsError').innerHTML = "**number b/w are only 5 digit**"
        return false;
    }
    if (image == "") {
        document.getElementById('ImageError').innerHTML = "**Please choose image**"
        return false;
    }else{
        document.getElementById('ImageError').innerHTML = ""
    }
}