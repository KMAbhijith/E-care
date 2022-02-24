
const image = document.querySelector("img");
const logcnt = document.querySelector(".cont");
const form = document.querySelector(".form");
const section = document.querySelector(".input-container ");

image.onclick = () => {
    requestAnimationFrame(() => {
        logcnt.classList.remove("hide-login");
        form.classList.remove("hide-form");
        setTimeout(() => {
            section.classList.remove("hide-input");
        }, 1000);

    });
};

function validate() {

    if (document.getElementById("username").value == "") {


        document.getElementById("username").style.borderColor = "red";

    }
    else if (document.getElementById("pass").value == "") {
        alert("incorrect password");

    }
    else {
        alert("login succesful")
    }
}