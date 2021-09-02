const moveMenu = () => { // Menu button
    let menuEl = document.getElementById("menu")
    let isOpen = menuEl.classList.contains('open')
    let articlesEl = document.getElementById('articles')
    menuEl.classList.toggle("open")

    if (isOpen) {
        let listEl = document.querySelector('.hamburger-item.open')
        if (listEl) {
            let openId = listEl.dataset.id
            document.getElementById(`${openId}-item`).classList.remove('open')
            document.getElementById(`${openId}-close`).classList.remove('open')
            document.getElementById(`${openId}-child`).classList.remove('open')
        }
    }

    if (articlesEl) {
        if (articlesEl.classList.contains('mobile')) {
            articlesEl.classList.toggle('hidden')
        }
    }

    let menuButtonEl = document.getElementById('menu-button')
    if (menuButtonEl) {
        menuButtonEl.classList.toggle('close')
    }

    let imageThumbnailsArr = Array.from(document.getElementsByClassName('pic-child'))
    imageThumbnailsArr.forEach(thumbnail => {
        if (!thumbnail.classList.contains('hidden')) {
            thumbnail.classList.toggle('hidden')
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

    let imagePreviewEl = document.getElementById('pic-wrapper')
    if (imagePreviewEl) {
        imagePreviewEl.classList.add('hidden')
    }
}

const expandMenu = ev => {
    let listEls = Array.from(document.getElementsByClassName('hamburger-item'))
    let prevIdx = null
    let which = ev.target.dataset.id

    for (let idx = 0; idx < listEls.length; idx++) {
        if (listEls[idx].classList.contains('open')) {
            prevIdx = listEls[idx].dataset.id
        }
    }
    if (prevIdx && prevIdx !== which) {
        document.getElementById(`${prevIdx}-item`).classList.remove('open')
        document.getElementById(`${prevIdx}-close`).classList.remove('open')
        document.getElementById(`${prevIdx}-child`).classList.remove('open')
    }

    let closeButtonEl = document.getElementById(`${which}-close`)
    closeButtonEl.classList.toggle('open')
    let hamburgerEl = document.getElementById(`${which}-child`)
    hamburgerEl.classList.toggle('open')
    let hamburgerItemEl = document.getElementById(`${which}-item`)
    hamburgerItemEl.classList.toggle('open')
}
