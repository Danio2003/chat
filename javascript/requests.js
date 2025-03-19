const divreq = document.querySelector('.requests .find_users');
setInterval(()=>{
    user_id=0;
    let xhr = new XMLHttpRequest();
    xhr.open("POST","php/requests.php",true);
    xhr.onload=()=>{
        if(xhr.readyState===XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                divreq.innerHTML = data;
            }
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("user_id="+user_id)
}, 10000);