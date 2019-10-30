/*Validálás*/

//function validRegPassword() {
//    var re = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).{8,20}$/";
//    var elem = document.getElementsByName('password')[0];/*elem.value.length >= 8 && elem.value.length <= 20 && */
//    if (re.test(String(elem.value))) {
//        document.getElementById("progress-bar-div").setAttribute("class", "col-12 text-center mt-3 d-none");
//        document.getElementById("pwd-strength").innerHTML = "";
//        elem.setAttribute("class", "form-control");
//        return true;
//    } else {
//        document.getElementById("progress-bar-div").setAttribute("class", "col-12 text-center mt-3");
//        document.getElementById("pwd-strength").innerHTML = "A jelszónak mimimum 8 karakter hosszúnak kell lennie. Tartalmaznia kell kis és nagybetűket illetve számot és speciális karaktert.";
//        elem.setAttribute("class", "form-control alert-danger");
//        elem.focus();
//        return false;
//    }
//}

function validPassword() {
    var elem = document.getElementsByName('password')[0];
    if (elem.value.length >= 8 && elem.value.length <= 20) {
        elem.setAttribute("class", "form-control");
        return true;
    } else {
        elem.setAttribute("class", "form-control alert-danger");
        elem.focus();
        return false;
    }
}

function validUsername() {
    var elem = document.getElementsByName('username')[0];
    if (elem.value.length >= 4 && elem.value.length <= 20) {
        elem.setAttribute("class", "form-control");
        return true;
    } else {
        elem.setAttribute("class", "form-control alert-danger");
        elem.focus();
        return false;
    }
}

function validFirstName() {
    var elem = document.getElementsByName('firstname')[0];
    if (elem.value.length >= 3 && elem.value.length <= 20) {
        elem.setAttribute("class", "form-control");
        return true;
    } else {
        elem.setAttribute("class", "form-control alert-danger");
        elem.focus();
        return false;
    }
}

function validLastName() {
    var elem = document.getElementsByName('lastname')[0];
    if (elem.value.length >= 2 && elem.value.length <= 20) {
        elem.setAttribute("class", "form-control");
        return true;
    } else {
        elem.setAttribute("class", "form-control alert-danger");
        elem.focus();
        return false;
    }
}

function checkboxCheck() {
    var elem = document.getElementsByName('remember-me')[0];
    var checkboxDiv = document.getElementById("checkboxDiv");
    var label = document.getElementById("remember-label");
    if (elem.checked) {
        label.innerHTML = "Jegyezz meg!";
        checkboxDiv.setAttribute("class", "col-12 text-center mt-3");
        return true;
    } else {
        label.innerHTML = "Jelöld be kérlek!";
        checkboxDiv.setAttribute("class", "col-12 text-center mt-3 alert alert-danger");
        elem.focus();
        return false;
    }
}

function checkUsername(username) {
    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            if (parseInt(this.responseText) == 1) {
//                document.getElementById("message-user").innerHTML = "Már létezik ilyen felhasználónév!";
//                document.getElementById("message-user").setAttribute("class", "col-10 offset-1 mb-4 alert alert-danger");
//                document.getElementById("username").setAttribute("class", "form-control alert alert-danger");
                document.getElementById("username").placeholder = username.value;
                document.getElementById("username").value = "";
                return false;
            } else {
                document.getElementById("username").setAttribute("class", "form-control");
                return true;
            }
        } else {
            return false;
        }


    };
    ajax.open("GET", "./php/CheckData.php?user=" + username.value);
    ajax.send();


}

function validRegUsername() {
    var elem = document.getElementsByName('username')[0];
    if (elem.value.length >= 4 && elem.value.length <= 20) {
        elem.setAttribute("class", "form-control");
        checkUsername(elem);
        return true;
    } else {
        elem.setAttribute("class", "form-control alert-danger");
        elem.focus();
        return false;
    }
}

function checkEmail(email) {
    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            if (parseInt(this.responseText) == 1) {
                document.getElementById("email").setAttribute("class", "form-control alert alert-danger");
                document.getElementById("email").placeholder = email.value;
                document.getElementById("email").value = "";
                return false;
            } else {
                document.getElementById("email").setAttribute("class", "form-control");
                return true;
            }
        } else {
            return false;
        }

    };
    ajax.open("GET", "./php/CheckData.php?email=" + email.value);
    ajax.send();
}

function validEmail() {
    var elem = document.getElementsByName('email')[0];
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (re.test(String(elem.value).toLowerCase())) {
        elem.setAttribute("class", "form-control");
        checkEmail(elem);
        return true;
    } else {
        elem.setAttribute("class", "form-control alert-danger");
        elem.focus();
        return false;
    }
}

function confirmPassword() {
    var passwordInput1 = document.getElementsByName('password')[0];
    var passwordInput2 = document.getElementsByName('re-password')[0];
    if (passwordInput1.value == passwordInput2.value) {
        passwordInput2.setAttribute("class", "form-control");
        return true;
    } else {
        passwordInput2.setAttribute("class", "form-control alert-danger");
        passwordInput2.focus();
        return false;
    }
}

function validRegForm() {
    if (validRegUsername()) {
    } else {
        return false;
    }
    if (validEmail()) {
    } else {
        return false;
    }
    if (validPassword()) {
    } else {
        return false;
    }
    if (confirmPassword()) {
    } else {
        return false;
    }
    if (validLastName()) {
    } else {
        return false;
    }
    if (validFirstName()) {
    } else {
        return false;
    }
    if (checkCheckAnswer()) {
    } else {
        return false;
    }
    if (checkSex()) {
    } else {
        return false;
    }
    if (checkCountry()) {
    } else {
        return false;
    }
    if (checkBirthDate()) {
    } else {
        return false;
    }
    return true;
}

function validLoginForm() {
    if (validUsername()) {
    } else {
        return false;
    }
    if (validPassword()) {
    } else {
        return false;
    }
    if (checkboxCheck()) {
    } else {
        return false;
    }
    return true;
}

function changeSite() {
    var title = document.getElementById("title");
    var usernameDiv = document.getElementById("usernameDiv");
    var link = document.getElementById("forgotten-password");
    var question = document.getElementById("question");
    var form = document.getElementById("form");
    title.innerHTML = "Elfelejtett felhasználónév.";
    usernameDiv.style.display = "none";
    question.style.display = "inline-block";
    link.style.display = "none";
    form.action = "../php/ForgottenUsername.php";
}

function passwordStrength(password) {
    var passwordLength = password.value.length;
    if (passwordLength === 0) {
        document.getElementById("progress-bar-div").setAttribute("class", "col-12 text-center mt-3 d-none");
    } else if (passwordLength >= 1 && passwordLength <= 5) {
        document.getElementById("progress-bar-div").setAttribute("class", "col-12 text-center mt-3");
        document.getElementById("progressbar").setAttribute("style", "width: 33%");
        document.getElementById("progressbar").setAttribute("class", "progress-bar bg-danger");
        document.getElementById("pwd-strength").innerHTML = "Gyenge";
    } else if (passwordLength > 5 && passwordLength <= 10) {
        document.getElementById("progress-bar-div").setAttribute("class", "col-12 text-center mt-3");
        document.getElementById("progressbar").setAttribute("style", "width: 66%");
        document.getElementById("progressbar").setAttribute("class", "progress-bar bg-warning");
        document.getElementById("pwd-strength").innerHTML = "Közepes";
        document.getElementById("pwd-strength").setAttribute("class", "text-warning");
    } else if (passwordLength > 10) {
        document.getElementById("progress-bar-div").setAttribute("class", "col-12 text-center mt-3");
        document.getElementById("progressbar").setAttribute("style", "width: 100%");
        document.getElementById("progressbar").setAttribute("class", "progress-bar bg-success");
        document.getElementById("pwd-strength").innerHTML = "Erős";
        document.getElementById("pwd-strength").setAttribute("class", "text-success");
    }
}

function questionToAnswer(change) {
    var questions = document.getElementsByName("control")[0];
    var answer = document.getElementById("answer");
    questions.style.display = "none";
    answer.style.display = "inline-block";
    answer.placeholder = change.value;
}

function checkCheckQuestions() {
    var questions = document.getElementsByName("control")[0];
    if (questions.value !== "Ellenőrző kérdések!") {
        questions.setAttribute("class", "custom-select");
        return true;
    } else {
        questions.setAttribute("class", "custom-select alert-danger");
        questions.focus();
        return false;
    }
}

function checkCheckAnswer() {
    if (checkCheckQuestions()) {
        var answer = document.getElementById("answer");
        if (answer.value !== "") {
            answer.setAttribute("class", "form-control");
            return true;
        } else {
            answer.setAttribute("class", "form-control alert alert-danger");
            answer.focus();
            return false;
        }
    }
}

function checkSex() {
    var sex = document.getElementsByName("gender")[0];
    if (sex.value !== "Válaszd ki a nemed!") {
        sex.setAttribute("class", "custom-select");
        return true;
    } else {
        sex.setAttribute("class", "custom-select alert-danger");
        sex.focus();
        return false;
    }
}

function checkCountry() {
    var country = document.getElementsByName("country")[0];
    if (country.value !== "Válaszd ki az országodat!") {
        country.setAttribute("class", "custom-select");
        return true;
    } else {
        country.setAttribute("class", "custom-select alert-danger");
        country.focus();
        return false;
    }
}

function checkBirthDate() {
    var birthDate = document.getElementsByName("birthdate")[0];
    if (birthDate.value !== "") {
        birthDate.setAttribute("class", "form-control");
        return true;
    } else {
        birthDate.setAttribute("class", "form-control alert-danger");
        birthDate.focus();
        return false;
    }
}

function textToDate(change) {
    change.type = "date";
}

function optionsToText(change) {
    if(change.value === 'Egyéb'){
        document.getElementById('capacity').style.display='none';
        document.getElementById('liter').style.display='inline-block';
    }
}

function getCheckQuestion(email) {
    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText.length > 0) {
                document.getElementById("question").placeholder = this.responseText;
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }


    };
    ajax.open("GET", "../php/CheckQuestionToInput.php?checkemail=" + email.value);
    ajax.send();
}

function rating(star) {
    for (var i = 0; i <= 9; i++) {
        document.getElementById(i).setAttribute("class", "fa fa-star bg-icon");
    }
    var num = parseInt(star.id);
    for (var i = num; i >= 0; i--) {
        document.getElementById(i).setAttribute("class", "fa fa-star bg-icon checked");
    }
    document.getElementById("rate").value = (num + 1);
}

function submitFunction(element) {
    document.getElementById(element.name).submit();
}

function submit(element) {
    var name = element.id;
    document.forms[name].submit();
}

function editText(text) {
    var editedText = "";
    for (var i = text.length; i >= 0; i--) {
        if (!isNaN(text.charAt(i)) || text.charAt(i) === '-' || text.charAt(i) === '.') {
            editedText += text.charAt(i);
        }
    }
    return (editedText.split("").reverse().join(""));
}

function setData() {
    if (document.getElementById('beer').value === "") {
        document.getElementById('beer').value = document.getElementById('beer').placeholder;
    }
    if (document.getElementById('ABV').value === "") {
        document.getElementById('ABV').value = editText(document.getElementById('ABV').placeholder);
    }
    if (document.getElementById('IBU').value === "") {
        document.getElementById('IBU').value = document.getElementById('IBU').placeholder;
    }
    if (document.getElementById('EBC').value === "") {
        document.getElementById('EBC').value = document.getElementById('EBC').placeholder;
    }
    if (document.getElementById('temperature').value === "") {
        document.getElementById('temperature').value = editText(document.getElementById('temperature').placeholder);
    }
}

function setData2() {
    if (document.getElementById('brewery').value === "") {
        document.getElementById('brewery').value = document.getElementById('brewery').placeholder;
    }
    if (document.getElementById('place').value === "") {
        document.getElementById('place').value = document.getElementById('place').placeholder;
    }
    if (document.getElementById('website').value === "") {
        document.getElementById('website').value = document.getElementById('website').placeholder;
    }
    if (document.getElementById('facebook').value === "") {
        document.getElementById('facebook').value = document.getElementById('facebook').placeholder;
    }
    if (document.getElementById('instagram').value === "") {
        document.getElementById('instagram').value = document.getElementById('instagram').placeholder;
    }
    if (document.getElementById('twitter').value === "") {
        document.getElementById('twitter').value = document.getElementById('twitter').placeholder;
    }
}

function setData3() {
    if (document.getElementById('lastname').value === "") {
        document.getElementById('lastname').value = document.getElementById('lastname').placeholder;
    }
    if (document.getElementById('firstname').value === "") {
        document.getElementById('firstname').value = document.getElementById('firstname').placeholder;
    }
    if (document.getElementById('email').value === "") {
        document.getElementById('email').value = document.getElementById('email').placeholder;
    }
    if (document.getElementById('check-question').value === "") {
        document.getElementById('check-question').value = document.getElementById('check-question').placeholder;
    }
    if (document.getElementById('check-answer').value === "") {
        document.getElementById('check-answer').value = document.getElementById('check-answer').placeholder;
    }
    if (document.getElementById('username').value === "") {
        document.getElementById('username').value = document.getElementById('username').placeholder;
    }
}

function editLabel() {
    var name = document.getElementById('fileInput');
    document.getElementById('fileLabel').innerHTML = name.files.item(0).name;
}

function showValue(slider) {
    let element = document.getElementById(slider.id).previousElementSibling;
    slider.oninput = function () {
        element.innerHTML = this.value;
    }
}
    var coin = document.getElementById('coinValue').value;
for(var i =0;i<5;i++){
var myVar = setInterval(myTimer, 1000);
}

function myTimer() {

    var coins = parseInt(coin);
    document.getElementById('coin').innerHTML = coins++;
    
}

function move() {
    var button = document.getElementById('button');
    var toggle = document.getElementById('toggle');
    var x = document.body.querySelectorAll(".custom-form");
    var y = document.body.querySelectorAll(".custom-form2");
    var z = document.body.querySelectorAll(".table");
    if (button.value == 0) {
        button.setAttribute("class", "btn rounded-circle bg-dark ml-5 mt-1");
        toggle.setAttribute("class", "bg-secondary mr-3");
        button.value = 1;
        for (var i = 0; i < x.length; i++) {
            x[i].id = x[i].className;
            x[i].setAttribute("class", x[i].className + " bg-dark text-light");
        }
        for (var i = 0; i < y.length; i++) {
            y[i].id = y[i].className;
            y[i].setAttribute("class", y[i].className + " bg-dark text-light");
        }
        for (var i = 0; i < z.length; i++) {
            z[i].id = z[i].className;
            z[i].setAttribute("class", z[i].className + "table-dark text-light");
        }
        
    } else {
        button.setAttribute("class", "btn rounded-circle bg-dark ml-2 mt-1");
        toggle.setAttribute("class", "bg-light mr-3");
        button.value = 0;
        for (var i = 0; i < x.length; i++) {
            x[i].setAttribute("class", x[i].id);
        }
        for (var i = 0; i < y.length; i++) {
            y[i].setAttribute("class", y[i].id);
        }
        for (var i = 0; i < z.length; i++) {
            z[i].setAttribute("class", z[i].id);
        }
        
    }
}

function showMessageBox() {
    document.getElementById('message-box').style.display = "inline-block";
}

var checkValue = true;

$(document).ready(function () {
    console.log("ready!");

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#profile_pic').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $(".custom-file-input, .image").change(function () {
        if (this.files[0].size / 1024 / 1024 <= 3) {
            readURL(this);
            $('#profile').css('display', 'inline-block');
            $('#profile_pic').css('height', '350px');
            document.getElementById('fileLabel').setAttribute("class", "custom-file-label");
        } else {
            document.getElementById('fileLabel').innerHTML = "Túl nagy a fájl mérete!";
            checkValue = false;
            document.getElementById('fileLabel').setAttribute("class", "custom-file-label alert-danger");
        }
    });
}
);

function messageShowing() {
    var width = window.innerWidth;
//    $(document).ready(function () {
    if (width <= 576) {
        document.getElementById("msg-list").setAttribute("class", "col-10 col-md-4 text-center border-right message-div");
        document.getElementById("msg").setAttribute("class", "col-6 no-space text-center message-div d-none d-md-block");   
    } else {
        document.getElementById("msg-list").setAttribute("class", "col-4 d-none d-md-block text-center border-right message-div");
        document.getElementById("msg").setAttribute("class", "col-10 col-md-6 no-space text-center message-div");
    }
}

function validEditForm() {
    if (validRegUsername()) {
    } else {
        return false;
    }
    if (validEmail()) {
    } else {
        return false;
    }
    if (validPassword()) {
    } else {
        return false;
    }
    if (confirmPassword()) {
    } else {
        return false;
    }
    if (validLastName()) {
    } else {
        return false;
    }
    if (validFirstName()) {
    } else {
        return false;
    }
    if (checkValue) {
    } else {
        return false;
    }
    return true;
}

function setConsignee(change) {
    var consigneeDiv = document.getElementById("consignee-id");
    var consignee = document.getElementById("msg-profile-id");
    consigneeDiv.innerHTML = "<strong>Címzett:</strong>";
    consigneeDiv.innerHTML = consigneeDiv.innerHTML + " " + change.innerHTML;
    consignee.value = change.value;
}

function setList(change) {
    var list = document.getElementById('option-based');
    list.value = change.value;
}

function showHiddenButton() {
    document.getElementsByClassName('col-12 hidden-buttons')[0].setAttribute("class", "col-12");
}

function setMessageValue() {
    document.getElementsByName("consignee")[0].value = elem.value;
}

function showBeerTypesImage(){
    document.getElementById('myModal').style.display = 'inline-block';
    document.body.style.overflowY = 'hidden';
}

function hideBeerTypesImage(){
    document.getElementById('myModal').style.display = 'none';
    document.body.style.overflowY = 'scroll';
}

function hideModal(){
    document.getElementById('modal').style.display= 'none';
}
