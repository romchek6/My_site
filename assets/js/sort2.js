    function sort(elem,a1,a2,a3,var1,var2,var3){

       if(var1.value ===''){
           if (elem.checked && elem.value ==='DESC'){
               a1.href = `search.php?sort=date_created&param=DESC&press=1&id_topic=${var2.value}&topic=${var3.value}`
               a2.href = `search.php?sort=views&param=DESC&press=3&id_topic=${var2.value}&topic=${var3.value}`
               a3.href = `search.php?sort=score&param=DESC&press=5&id_topic=${var2.value}&topic=${var3.value}`
           } else {
               a1.href = `search.php?sort=date_created&param=ASC&press=2&id_topic=${var2.value}&topic=${var3.value}`
               a2.href = `search.php?sort=views&param=ASC&press=4&id_topic=${var2.value}&topic=${var3.value}`
               a3.href = `search.php?sort=score&param=ASC&press=6&id_topic=${var2.value}&topic=${var3.value}`
           }
       }else{
           if (elem.checked && elem.value ==='DESC'){
               a1.href = `search.php?sort=date_created&param=DESC&press=1&search-term=${var1.value}`
               a2.href = `search.php?sort=views&param=DESC&press=3&search-term=${var1.value}`
               a3.href = `search.php?sort=score&param=DESC&press=5&search-term=${var1.value}`
           } else {
               a1.href = `search.php?sort=date_created&param=ASC&press=2&search-term=${var1.value}`
               a2.href = `search.php?sort=views&param=ASC&press=4&search-term=${var1.value}`
               a3.href = `search.php?sort=score&param=ASC&press=6&search-term=${var1.value}`
           }
       }

    }

    $(document).ready(function (){

        const b =  document.getElementById('r1')
        const a1 = document.getElementById('a1')
        const a2 = document.getElementById('a2')
        const a3 = document.getElementById('a3')
        const var1 = document.getElementById('var1')
        const var2 = document.getElementById('var2')
        const var3 = document.getElementById('var3')




        if(var1.value ===''){
            if (b.checked && b.value ==='DESC'){
                a1.href = `search.php?sort=date_created&param=DESC&press=1&id_topic=${var2.value}&topic=${var3.value}`
                a2.href = `search.php?sort=views&param=DESC&press=3&id_topic=${var2.value}&topic=${var3.value}`
                a3.href = `search.php?sort=score&param=DESC&press=5&id_topic=${var2.value}&topic=${var3.value}`
            } else {
                a1.href = `search.php?sort=date_created&param=ASC&press=2&id_topic=${var2.value}&topic=${var3.value}`
                a2.href = `search.php?sort=views&param=ASC&press=4&id_topic=${var2.value}&topic=${var3.value}`
                a3.href = `search.php?sort=score&param=ASC&press=6&id_topic=${var2.value}&topic=${var3.value}`
            }
        }else{
            if (b.checked && b.value ==='DESC'){
                a1.href = `search.php?sort=date_created&param=DESC&press=1&search-term=${var1.value}`
                a2.href = `search.php?sort=views&param=DESC&press=3&search-term=${var1.value}`
                a3.href = `search.php?sort=score&param=DESC&press=5&search-term=${var1.value}`
            } else {
                a1.href = `search.php?sort=date_created&param=ASC&press=2&search-term=${var1.value}`
                a2.href = `search.php?sort=views&param=ASC&press=4&search-term=${var1.value}`
                a3.href = `search.php?sort=score&param=ASC&press=6&search-term=${var1.value}`
            }
        }

    })

