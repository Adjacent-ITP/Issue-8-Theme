const moveMenu = () => {
    let element = document.getElementById("menu");
    element.classList.toggle("open");
}

const subExpander = (e) => {
    let div = e.target;
    console.log(div);
    let sibling = div.nextElementSibling;
    console.log(sibling);
    sibling.classList.toggle("displayed");
}