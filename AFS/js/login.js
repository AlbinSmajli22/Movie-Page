const Username=document.getElementById('Username')
const password =document.getElementById('password')
const form=document.getElementById('form')
const erros=document.getElementById('error')


form.addEventListener('submit', (e)=>{
    let messgaes =[]
    
    if(Username.value === '' || Username.value == null){
        messgaes.push('Username duhet plotesuar')
    }else if(Username.value.length<5 || Username.value.length>20){
        messgaes.push('Username duhet te jet min. 5 max. 10 karaktere')
    }
    if(password.value === '' || password.value == null){
        messgaes.push('password duhet plotesuar')
    }else if(password.value.length<6){
        messgaes.push('password duhet te ket min. 6 karaktere')
    }
    

    if(messgaes.length > 0){
        e.preventDefault()
        erros.innerText = messgaes.join(', ')
    }
})

var i=0;
var images=[];
var time=3000;

function changeImg(){
    dolument.getElementById('slide').src=images[i];
if(i>images.length){
    i++;

}else{
    i=0
}
//setTimeout('changeImg()', time)
}
document.body.addEventListener('load',changeImg());