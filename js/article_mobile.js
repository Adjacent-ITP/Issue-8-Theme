const MOBILE_WIDTH = 550 // For phone
let isMobile = document.body.clientWidth <= MOBILE_WIDTH
let scrollAnimation

function repositionArtwork() {
    let artworkEl = document.getElementsByClassName('artwork')
    let isCurrentlyMobile = document.body.clientWidth <= MOBILE_WIDTH
    if (artworkEl.length) {
        artworkEl = artworkEl[0]
    }
    if (!artworkEl) return
    if (isCurrentlyMobile) {
        let titleEl = document.getElementById('article-title-header')
        titleEl.insertAdjacentElement('afterend', artworkEl)
    } else {
        let articleEl = document.getElementsByClassName('article')[0]
        articleEl.insertAdjacentElement('afterend', artworkEl)
    }
    isMobile = isCurrentlyMobile
}

function moveIllustration() {
    isMobile = document.body.clientWidth <= MOBILE_WIDTH
    repositionArtwork()
}

function scrollToTop() {
    var position =
        document.body.scrollTop || document.documentElement.scrollTop
    if (position) {
        window.scrollBy(0, -Math.max(1, Math.floor(position / 10)))
        scrollAnimation = setTimeout("scrollToTop()", 30)
    } else clearTimeout(scrollAnimation)
}

window.addEventListener('resize', moveIllustration)
document.body.onload = moveIllustration