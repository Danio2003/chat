
const divadd = document.querySelector('.find_user .find_users');

const divadd2 = document.querySelector('.requests .find_users');

form.onsubmit=(e)=>{
    e.preventDefault();
}
function add_user(user_id){
    let xhr = new XMLHttpRequest();
    xhr.open("POST","php/add.php",true);
    xhr.onload=()=>{
        if(xhr.readyState===XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                divadd.innerHTML = data;
            }
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("user_id="+user_id)
}
function add_user2(user_id2){
    let xhr = new XMLHttpRequest();
    xhr.open("POST","php/add2.php",true);
    xhr.onload=()=>{
        if(xhr.readyState===XMLHttpRequest.DONE){
            if(xhr.status === 200){
                console.log("dziala")
            }
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("user_id="+user_id2)
}
    
