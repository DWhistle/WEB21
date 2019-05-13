function input() {
    let a = prompt("Type a new task", "Nothing");
    if (a.toString() != "")
    {
        let div = document.createElement("div");
        let text = document.createTextNode(a);
        div.appendChild(text);
        document.getElementById("ft_list").insertBefore(div, document.getElementById("ft_list").childNodes[0]);
        div.addEventListener("click", function (){
            this.remove();}
        );
        document.cookie = text.textContent;

    }
}


document.addEventListener("DOMContentLoaded", function(){
    let a = document.cookie.split('=;');
    for(let i = a.length - 1; i >= 0  ; i--) {
        let div = document.createElement("div");
        let text = document.createTextNode(a[i]);
        div.appendChild(text);
        document.getElementById("ft_list").insertBefore(div, document.getElementById("ft_list").childNodes[0]);
        div.addEventListener("click", function (){
            let to_del = this.textContent;
            document.cookie =  to_del + "=; expires = Thu, 01 Jan 1970 00:00:00 GMT"

            this.remove();
            }
        );
    }
});
$("#button").click(input);