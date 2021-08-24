const MOBILE_WIDTH = 550 // For phone
var isMobile = document.body.clientWidth <= MOBILE_WIDTH
let hasSwitched = false
let scrollAnimation

function repositionArtwork() {
    let artworkEl = document.getElementsByClassName('artwork')
    let isCurrentlyMobile = document.body.clientWidth <= MOBILE_WIDTH
    if (artworkEl.length) {
        artworkEl = artworkEl[0]
    }
    if (!artworkEl) return

    if (!hasSwitched) {
        isMobile = !isCurrentlyMobile
        hasSwitched = true
    }

    if (isCurrentlyMobile !== isMobile && isCurrentlyMobile) {
        isMobile = isCurrentlyMobile
        let titleEl = document.getElementById('article-title-header')
        titleEl.insertAdjacentElement('afterend', artworkEl)
    } else {
        if (!isCurrentlyMobile && isMobile) {
            isMobile = isCurrentlyMobile
            let articleEl = document.getElementsByClassName('column')[1]
            articleEl.insertAdjacentElement('afterend', artworkEl)
        }
    }
}

function moveIllustration() {
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
window.onload = moveIllustration