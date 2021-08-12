let bool = false;
let data;

const moveMenu = () => {
    let element = document.getElementById("menu");
    element.classList.toggle("open");

    let menuButtonEl = document.getElementById('menu-button')
    if (menuButtonEl) {
        menuButtonEl.classList.toggle('close')
    }

    let imageThumbnailsArr = Array.from(document.getElementsByClassName('pic-child'))
    imageThumbnailsArr.forEach(thumbnail => {
        if (!thumbnail.classList.contains('hidden')) {
            thumbnail.classList.add('hidden')
        }
    })

    let menuButton = document.getElementById('menu-arrow')
    if (menuButton) {
        menuButton.classList.add('hidden')
    }

    let adjacentLogo = document.getElementById('adjLogo')
    if (adjacentLogo) {
        adjacentLogo.classList.add('hidden')
    }
}

const expandMenu = ev => {
    let which = ev.target.dataset.id
    let closeButtonEl = document.getElementById(`${which}-close`)
    closeButtonEl.classList.toggle('open')
    let hamburgerEl = document.getElementById(`${which}-child`)
    hamburgerEl.classList.toggle('open')
    let hamburgerItemEl = document.getElementById(`${which}-item`)
    hamburgerItemEl.classList.toggle('open')
}

const subExpander = (e) => {

    data = document.getElementsByName("data")[0].content;
    console.log(data)
    let div = e.target
    let isClosed = e.target.dataset.isClosed
    let x = document.createElement("img"); 
    x.src = data + '/assets/x.png';
    x.className = "close-x";
    console.log(isClosed, div)

    if(div.parentElement.nodeName != "LI"){
        if(!isClosed){
            div.style.padding = '3em';
            div.appendChild(x)
        } else {
            div.style.padding = '0';
        }
        let sibling = div.nextElementSibling;
        sibling.classList.toggle("displayed");
        let id = e.target.innerText.toLowerCase()
        id.replace(/\s/g, '');
        sibling.classList.add(id)
    } else{
        if(!isClosed){
            div.parentElement.style.padding = '3em';
            div.parentElement.appendChild(x)
        } else {
            div.parentElement.style.padding = '0';
        }
        let sibling = div.parentElement.nextElementSibling;
        sibling.classList.toggle("displayed");

        if(isClosed){
            div.parentElement.removeChild(div.parentElement.childNodes[1])
        }
    }
    e.target.dataset.isClosed = !isClosed
}