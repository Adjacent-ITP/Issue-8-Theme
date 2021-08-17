let currentBackgroundIdx = 0
let hasChanged = false
let articleEl = null
let menuEl = null

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
  document.addEventListener('mousemove', changeBackground)
}

document.body.onload = startBackground