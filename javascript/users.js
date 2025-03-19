const nav_main = document.querySelector(".nav .nav_main");

    let xhr = new XMLHttpRequest();
    xhr.open("POST","php/users.php",true);
    xhr.onload=()=>{
        if(xhr.readyState===XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                nav_main.innerHTML = data;
            }
        }
    }
    xhr.send();
