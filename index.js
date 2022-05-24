
function popupg(){
    document.getElementById("popup-1").style.display="block";
}
function popgo(){
    document.getElementById("popup-1").style.display="none";
}
let tot_g=0;
function incfung(){
    let ip=document.getElementById("ip1");
    let y=ip.innerHTML;
    ip.innerHTML=parseInt(y)+1;
    tot_g++;
    document.getElementById("no_g").value=tot_g+" guests";
}
function decfung(){
    let ip=document.getElementById("ip1");
    let y=ip.innerHTML;
    ip.innerHTML=parseInt(y)-1;
    tot_g--;
    document.getElementById("no_g").value=tot_g+" guests";
}
function incfunc(){
    let ip=document.getElementById("ip2");
    let y=ip.innerHTML;
    ip.innerHTML=parseInt(y)+1;
    tot_g++;
    document.getElementById("no_g").value=tot_g+" guests";
}
function decfunc(){
    let ip=document.getElementById("ip2");
    let y=ip.innerHTML;
    ip.innerHTML=parseInt(y)-1;
    tot_g--;
    document.getElementById("no_g").value=tot_g+" guests";
}
function incfuni(){
    let ip=document.getElementById("ip3");
    let y=ip.innerHTML;
    ip.innerHTML=parseInt(y)+1;
    tot_g++;
    document.getElementById("no_g").value=tot_g+" guests";
}
function decfuni(){
    let ip=document.getElementById("ip3");
    let y=ip.innerHTML;
    ip.innerHTML=parseInt(y)-1;
    tot_g--;
    document.getElementById("no_g").value=tot_g+" guests";
}
function incfunp(){
    let ip=document.getElementById("ip4");
    let y=ip.innerHTML;
    ip.innerHTML=parseInt(y)+1;
    tot_g++;
    document.getElementById("no_g").value=tot_g+" guests";
}
function decfunp(){
    let ip=document.getElementById("ip4");
    let y=ip.innerHTML;
    ip.innerHTML=parseInt(y)-1;
    tot_g--;
    document.getElementById("no_g").value=tot_g+" guests";
}

function togglePopup(){
    document.getElementById("popup-2").classList.toggle("active");

}

var searchInput='search_input';
$(document).ready(function(){
    var autocomplete;
    autocomplete = new google.maps.places.Autocomplete((document.getElementById("location")),{
        types:['geocode'],
    });
    google.maps.event.addListener(autocomplete,'place_changed',function(){
        var near_place=autocomplete.getPlace();
    })
});

let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("main_heading");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  slides[slideIndex-1].style.display = "block";  
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}