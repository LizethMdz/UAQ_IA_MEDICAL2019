;(function () {
    let card  = document.getElementsByClassName('card-info')[0],
        moved = 2,
        interval;

    if (!card) return;
    
    card.addEventListener('click', function (event) {
        clearInterval(interval);
        card.style.transform = '';
        
        // Do not flip the card if the user is trying to
        // tap a link.
        if (event.target.nodeName === 'A') {
            return;
        }
        
        let cName   = card.getAttribute('data-toggle-class');
        let toggled = card.classList.contains(cName);
        card.classList[toggled ? 'remove' : 'add'](cName);
    });
    
    interval = setInterval(function () {
        moved = moved ? 0 : 10;
        card.style.transform = 'translateY(' + moved + 'px)';
    }, 1500);
})();