    function sort(elem,a1,a2,a3){
        if (elem.checked && elem.value ==='DESC'){
            a1.href = 'index.php?sort=date_created&param=DESC&press=1'
            a2.href = 'index.php?sort=views&param=DESC&press=3'
            a3.href = 'index.php?sort=score&param=DESC&press=5'
        } else {
            a1.href = 'index.php?sort=date_created&param=ASC&press=2'
            a2.href = 'index.php?sort=views&param=ASC&press=4'
            a3.href = 'index.php?sort=score&param=ASC&press=6'
        }
    }

    $(document).ready(function (){

        const b =  document.getElementById('r1')
        const a1 = document.getElementById('a1')
        const a2 = document.getElementById('a2')
        const a3 = document.getElementById('a3')


        if (b.checked && b.value === 'DESC') {
            a1.href = `index.php?sort=date_created&param=DESC&press=1`
            a2.href = `index.php?sort=views&param=DESC&press=3`
            a3.href = `index.php?sort=score&param=DESC&press=5`
        } else {
            a1.href = `index.php?sort=date_created&param=ASC&press=2`
            a2.href = `index.php?sort=views&param=ASC&press=4`
            a3.href = `index.php?sort=score&param=ASC&press=6`
        }

    })