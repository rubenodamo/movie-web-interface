// function to validate the form
function validate(form){
    // checks if there are any empty, hence void values in the forms input boxes
    var msg = "";
    var ok = true;

    for (var i = 0; i < form.length; i++) {
        if(form.elements[i].value.trim() == "") {
            msg += "" + form.elements[i].name + " is void. "
            ok = false;
        }
    }

    // returns false and sets error message if name is not "ok"
    if (!validateName(form)) {
        msg += "Please enter only alphabetical characters"
        ok = false;
    }

    // returns false and an alert if the form is not "ok"
    if (ok == 0) {
        alert(msg);
        return false;
    }
    else {
        return true;
    }
}

// function to validate the actor name field
function validateName(form) {
    // check that the actor name consists of only alphabetical characters
    const name = form.name.value;
    const regex = /^[a-zA-Z\s]+$/;

    if (!regex.test(name)) {
        return false;
    }
    else {
        return true;
    }
}




  



