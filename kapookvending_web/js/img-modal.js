
//pic1
var modal = document.getElementById("myModal");
// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function () {
   modal.style.display = "block";
   modalImg.src = this.src;
   captionText.innerHTML = this.alt;
}
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
// When the user clicks on <span> (x), close the modal
span.onclick = function () {
   modal.style.display = "none";
}

//pic2
var modal2 = document.getElementById("myModal2");
// Get the image and insert it inside the modal - use its "alt" text as a caption
var img2 = document.getElementById("myImg2");
var modalImg2 = document.getElementById("img02");
var captionText2 = document.getElementById("caption2");
img2.onclick = function () {
   modal2.style.display = "block";
   modalImg2.src = this.src;
   captionText2.innerHTML = this.alt;
}
// Get the <span> element that closes the modal
var span2 = document.getElementsByClassName("close")[1];
// When the user clicks on <span> (x), close the modal
span2.onclick = function () {
   modal2.style.display = "none";
}

//pic3
//pic2
var modal3 = document.getElementById("myModal3");
// Get the image and insert it inside the modal - use its "alt" text as a caption
var img3 = document.getElementById("myImg3");
var modalImg3 = document.getElementById("img03");
var captionText3 = document.getElementById("caption3");
img3.onclick = function () {
   modal3.style.display = "block";
   modalImg3.src = this.src;
   captionText3.innerHTML = this.alt;
}
// Get the <span> element that closes the modal
var span3 = document.getElementsByClassName("close")[2];
// When the user clicks on <span> (x), close the modal
span3.onclick = function () {
   modal3.style.display = "none";
}


