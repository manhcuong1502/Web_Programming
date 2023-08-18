var MainImg = document.getElementById("MainImg");
var smallimg = document.getElementsByClassName("small-img");
const cate = document.getElementById("cate");
const pro = document.getElementById("pro");
const itemCate = document.getElementById("cate-item");
const itemPro = document.getElementById("pro-item");

smallimg[0].onclick = function(){
    MainImg.src = smallimg[0].src;
}
smallimg[1].onclick = function(){
    MainImg.src = smallimg[1].src;
}
smallimg[2].onclick = function(){
    MainImg.src = smallimg[2].src;
}
smallimg[3].onclick = function(){
    MainImg.src = smallimg[3].src;
}

cate.addEventListener("click", (event) =>{
    if(itemCate.style.display == "none"){
        itemCate.style.display = "block";
    }else{
        itemCate.style.display = "none";
    }
})

pro.addEventListener("click", (event) =>{
    if(itemPro.style.display == "none"){
        itemPro.style.display = "block";
    }else{
        itemPro.style.display = "none";
    }
})