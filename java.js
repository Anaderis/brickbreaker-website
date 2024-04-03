var e = document.getElementById("status");
var f = Array.from(e);

function jeanmarie (){
    var value = this.value;
    console.log(value);
    if (value!="creator"){
        document.getElementById("upload").style.display = "none";
    }
    else {
        document.getElementById("upload").style.display = "block";
    }
}

console.log(f);


// f.forEach((element)=>{
//     element.addEventListener("change",jeanmarie)
// })

e.addEventListener("change",jeanmarie);
