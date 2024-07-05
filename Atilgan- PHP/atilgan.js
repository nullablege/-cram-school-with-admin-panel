document.getElementById("mezun").addEventListener("click", function() {
    window.location.href = "./mezunlarimiz.html";
  });

  document.getElementById("logo").addEventListener("click", function() {
    window.location.href = "./index.html";
  });

  document.getElementById("menu-toggle").addEventListener("click",()=>{
    var mobilnav = document.querySelector('.mobilnav');
    mobilnav.classList.toggle('open'); 
      if(mobilnav.style.display === "block"){
        mobilnav.style.display = "none";
      }
      else{
        mobilnav.style.display = "block";
      }
  })