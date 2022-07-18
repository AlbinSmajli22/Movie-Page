const emri =document.getElementById('emri')
const mbiemri=document.getElementById('mbiemri')
const Username=document.getElementById('Username')
const password =document.getElementById('password')
const CPassword=document.getElementById('Confirmpassword')
const form=document.getElementById('form')
const erros=document.getElementById('error')

form.addEventListener('submit', (e)=>{
    let messgaes =[]
    if(emri.value === '' || emri.value == null){
        messgaes.push('Emri duhet plotesuar')
    }
    if(mbiemri.value === '' || mbiemri.value == null){
        messgaes.push('Mbiemri duhet plotesuar')
    }
    if(Username.value === '' || Username.value == null){
        messgaes.push('Username duhet plotesuar')
    }else if(Username.value.length<5 || Username.value.length>10){
        messgaes.push('Username duhet te jet min. 5 max. 10 karaktere')
    }
    if(password.value === '' || password.value == null){
        messgaes.push('password duhet plotesuar')
    }else if(password.value.length<6){
        messgaes.push('password duhet te ket min. 6 karaktere')
    }
    if(CPassword.value === '' || CPassword.value == null){
        messgaes.push('Confirm password duhet plotesuar')
    }else if(CPassword.value != password.value ){
        messgaes.push('Confirm password duhet te jet i ngjashem me Password')
    }

    if(messgaes.length > 0){
        e.preventDefault()
        erros.innerText = messgaes.join(', ')
    }
})