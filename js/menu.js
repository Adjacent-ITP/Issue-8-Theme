let bool = false;

const moveMenu = () => {
    let element = document.getElementById("menu");
    element.classList.toggle("open");
}

const subExpander = (e) => {
    let div = e.target;
    console.log(div);
    bool = !bool;
    if(bool){
        div.style.padding = '3em';
    } else {
        div.style.padding = '0';
    }
    let sibling = div.nextElementSibling;
    console.log(sibling);
    sibling.classList.toggle("displayed");
}