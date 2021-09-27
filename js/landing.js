let currentBackgroundIdx = 1
let hasChanged = false
let articleEl = null
let menuEl = null
let isMobile = true
const MOBILE_WIDTH = 600 // For phone

function resetInterval() {
  hasChanged = false
}

function fadeOutBackground() {
  let prevIdx = currentBackgroundIdx === 1 ? 8 : currentBackgroundIdx - 1
  if (prevIdx && prevIdx <= 8) {
    let prevBackgroundEl = document.getElementById(`landing_${prevIdx}`)
    prevBackgroundEl.classList.add('hidden')
  }
}

function changeBackground() {
  if (hasChanged) return
  if (!articleEl) {
    articleEl = document.getElementById('articles')
  }
  if (!menuEl) {
    menuEl = document.getElementById('menu')
  }
  if (articleEl.classList.contains('open') || menuEl.classList.contains('open')) {
    return
  }
  currentBackgroundIdx = currentBackgroundIdx < 8 ? currentBackgroundIdx + 1 : 1
  let newBackgroundEl = document.getElementById(`landing_${currentBackgroundIdx}`)
  newBackgroundEl.classList.remove('hidden')
  hasChanged = true
  setTimeout(fadeOutBackground, 100)
  setTimeout(resetInterval, 400)
}

function startBackground() {
  if (document.body.clientWidth > MOBILE_WIDTH) {
    // document.removeEventListener('click', changeBackground)
    document.addEventListener('mousemove', changeBackground)
    isMobile = false
  } else {
    if (!isMobile) {
      document.removeEventListener('mousemove', changeBackground)
    }
    startMobileBump()
    isMobile = true
    // document.addEventListener('click', changeBackground)
  }
}

function checkMobile() {
  if (isMobile) {
      startMobileBump()
  }
}

function startMobileBump() { // Function to bump articles until begin scrolling
  let articlesEl = document.getElementById('articles')
  if (articlesEl) {
    articlesEl.classList.add('bump')
    articlesEl.classList.add('mobile')
  }
  document.addEventListener('scroll', onMobileScroll, true)
}

function onMobileScroll(ev) {
  let articlesEl = document.getElementById('articles')
  if (articlesEl.classList.contains('bump')) {
      articlesEl.classList.remove('bump')
  }
  document.removeEventListener('scroll', onMobileScroll, true)
}

document.body.addEventListener('load', startBackground, true)

window.addEventListener('resize', startBackground, true)