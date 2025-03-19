const form = document.querySelector(".rgt .szukaj_uz"),
input = form.querySelector(".szukaj_uzytkownika"),
button = form.querySelector(".button2"),
div = document.querySelector('.find_users');


form.onsubmit=(e)=>{
    e.preventDefault();
}
button.addEventListener("click",()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST","php/search.php",true);
    xhr.onload=()=>{
        if(xhr.readyState===XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                div.innerHTML = data;
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
})