
const password     = document.getElementById('password')
const form         = document.getElementById('form')
const errorelement = document.getElementById('error')

form.addEventListener('Change password',(e)=> {
    let messege=[]
   

    if (password.value.length<=6) {
        messege.push('password must be longer than 6 characters') 
    }
    if (password.value.length<=12) {
        messege.push('password should not longer than 12 characters') 
    }
    if (messege.length>0) {
        e.preventDefault()
        errorelement.innerText=messege.join(',')
    }
   
})