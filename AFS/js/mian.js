var i = 0;
var images = [] ;
var time = 3000;


images[0] ='foto/ads.jpg';
images[1] ='foto/ads2.jpg';
images[2] ='foto/ads3.jpg';
images[3] ='foto/ads4.jpg';
images[4] ='foto/ads5.jpg';

function changeImg(){
    document.slide.src = images[i];

    if(i<images.length - 1){
        i++;
    }else{
        i=0;
    }
    setTimeout("changeImg()", time);
}
window.onload = changeImg;