function deleteWindow(id,name,typeq){

    let zatemnenie = document.createElement('div');
    let window = document.createElement('div');
    let text = document.createElement('div');
    let accept = document.createElement('a');
    let noAccept = document.createElement('a');

    console.log(typeq)

    zatemnenie.className = "zatemnenie"
    zatemnenie.id ="zatemnenie"
    window.className ="window"
    text.textContent = "Вы точно хотите удалить " + typeq + ' ' + name + "?"
    text.className = 'text';
    accept.href = "edit.php?delete_id=" + id
    accept.textContent = 'да'
    accept.className ='close'
    noAccept.href ='#'
    noAccept.textContent='Нет'
    noAccept.className ='close'

    zatemnenie.append(window)
    window.append(text, accept, noAccept)


    document.body.append(zatemnenie)
    noAccept.setAttribute('onclick','closeWindow()')


}
function closeWindow(){
    let a = document.getElementById('zatemnenie')
    console.log(a)
    document.body.removeChild(a)
}