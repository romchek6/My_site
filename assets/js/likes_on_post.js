function getData(elem,result) {
        // URL на который будем отправлять GET запрос
        const id_user  = parseInt(document.querySelector('#nums').value);
        const id_post  = parseInt(document.querySelector('#nums1').value);
        const requestURL = `app/controllers/likes_on_post.php?likes=5&id_user=${id_user}&id_post=${id_post}`;
        const xhr = new XMLHttpRequest();
        xhr.open('GET', requestURL);
        xhr.onload = () => {
            if (xhr.status !== 200) {
                return;
            }
            // document.querySelector('#result').innerHTML = xhr.response;
            if(elem.className !=='fa-solid fa-heart col-1 like'){
                elem.className = 'fa-solid fa-heart col-1 like'
            }else{
                elem.className = 'fa-regular fa-heart col-1 like'
            }
            result.textContent = xhr.response;
        }
        xhr.send();
    }
    // при нажатию на кнопку
    // document.querySelector('#get').addEventListener('click', () => {
    //     getData();
    // });

