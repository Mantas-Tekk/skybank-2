
const burgerButton = document.getElementById("burger-button");

if(burgerButton == null) {
    console.log("Oh well, you fuck tard");
} else {
    burgerButton.addEventListener("click", function() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
        x.className += " responsive";
        } else {
        x.className = "topnav";
        }
    });
}

let navigationButtons