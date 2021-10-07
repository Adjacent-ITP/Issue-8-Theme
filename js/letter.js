function openLetter() {
    let expandedLetterEl = document.getElementById('letter-hidden')
    let expandButtonEl = document.getElementById('read-more')
    let letterEl = document.getElementsByClassName('letter')[0]
    if (expandedLetterEl) {
        expandButtonEl.classList.toggle('hidden')
        expandedLetterEl.classList.toggle('visible')
        letterEl.classList.toggle('expanded')
    }
}