let bool = false;
let data;

const moveMenu = () => {
    let element = document.getElementById("menu");
    element.classList.toggle("open");
}

const subExpander = (e) => {

    data = document.getElementsByName("data")[0].content;
    let div = e.target;
    bool = !bool;
    let x = document.createElement("img"); 
    console.log(data)
    x.src = data + '/assets/x.png';
    x.className = "close-x";
    if(div.parentElement.nodeName != "LI"){
        if(bool){
            div.style.padding = '3em';
            div.appendChild(x)
        } else {
            div.style.padding = '0';
            div.removeChild(div.childNodes[1])
        }
        let sibling = div.nextElementSibling;
        sibling.classList.toggle("displayed");
    } else{
        if(bool){
            div.parentElement.style.padding = '3em';
            div.parentElement.appendChild(x)
        } else {
            div.parentElement.style.padding = '0';
        }
        let sibling = div.parentElement.nextElementSibling;
        sibling.classList.toggle("displayed");

        if(!bool){
            div.parentElement.removeChild(div.parentElement.childNodes[1])
        }
    }
}