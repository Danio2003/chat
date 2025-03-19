const form=document.querySelector(".formularz form"),
continueBtn = form.querySelector(".przycisk input"),
errorText = form.querySelector(".error-txt");

form.onsubmit=(e)=>{
    e.preventDefault();
}
continueBtn.onclick =()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST","php/login.php",true);
    xhr.onload=()=>{
        if(xhr.readyState===XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data == "success"){
                    location.href = "messenger.php";
                }else{
                    errorText.textContent = data;
                    errorText.style.display ="block";
                }
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}