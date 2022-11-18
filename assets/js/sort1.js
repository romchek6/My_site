    function sort(elem,a1,a3,id) {
        if (elem.checked && elem.value === 'DESC') {
            a1.href = `single_post.php?sort=date_created&param=DESC&press=1&id=${id}`
            a3.href = `single_post.php?sort=score&param=DESC&press=5&id=${id}`
        } else {
            a1.href = `single_post.php?sort=date_created&param=ASC&press=2&id=${id}`
            a3.href = `single_post.php?sort=score&param=ASC&press=6&id=${id}`
        }
    }