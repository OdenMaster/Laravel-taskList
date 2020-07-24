
window.onload = function(){
    let delBtns = document.getElementsByClassName("btn_del")

    for (let $i=0; $i < delBtns.length; $i++){
        delBtns[$i].onclick = function() {
            if(confirm("削除すると2度ともとに戻せません。\n続行しますか?")){
                // location.href='https://google.com'
            }else{
                return false;
            }
        }
    }
}
