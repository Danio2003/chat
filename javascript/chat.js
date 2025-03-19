const formchat = document.querySelector(".main_dol .wysylanie"),
butt=document.getElementById("button1"),
inputchat=document.getElementById("wysyl"),
chat=document.querySelector(".main .main_main");
formchat.onsubmit=(e)=>{
    e.preventDefault();
}
butt.onclick=()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST","php/chat.php",true);
    xhr.onload=()=>{
        if(xhr.readyState===XMLHttpRequest.DONE){
            if(xhr.status === 200){
                inputchat.value = "";
            }
        }
    }
    let formData = new FormData(formchat);
    xhr.send(formData);
};

setInterval(()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST","php/get-chat.php",true);
    xhr.onload=()=>{
        if(xhr.readyState===XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                chat.innerHTML = data;
            }
        }
    }
    let formData = new FormData(formchat);
    xhr.send(formData);
}, 1000);
