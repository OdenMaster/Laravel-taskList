
window.onload = function(){
    let delBtns = document.getElementsByClassName("btn_del")

    for (let $i=0; $i < delBtns.length; $i++){
        delBtns[$i].onclick = function() {
            if(confirm("削除すると2度ともとに戻せません。\n続行しますか?")){
                // delete continue
            }else{
                return false;
            }
        }
    }

    if(location.pathname === '/'){
        document.getElementById('div_simple_register').classList.remove("visible-hidden")
    }

}
