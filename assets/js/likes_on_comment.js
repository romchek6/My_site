function getData2(elem,result,nums2) {
        // URL на который будем отправлять GET запрос

        const id_user  = parseInt(document.querySelector('#nums').value);
        const id_post  = parseInt(document.querySelector('#nums1').value);

        const requestURL = `app/controllers/likes_on_comment.php?id_user=${id_user}&id_post=${id_post}&id_comment=${nums2}`;
        const xhr = new XMLHttpRequest();
        xhr.open('GET', requestURL);
        xhr.onload = () => {
            if (xhr.status !== 200) {
                return;
            }
            // document.querySelector('#result').innerHTML = xhr.response;
            if(elem.className !=='fa-solid fa-heart like'){
                elem.className = 'fa-solid fa-heart like'
            }else{
                elem.className = 'fa-regular fa-heart like'
            }
            result.textContent = xhr.response;
        }
        xhr.send();
    }
    // при нажатию на кнопку
    // document.querySelector('#get').addEventListener('click', () => {
    //     getData();
    // });

