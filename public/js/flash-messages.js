document.addEventListener('DOMContentLoaded', function(){
    const flashMessages = document.querySelectorAll('.flash-message');

    flashMessages.forEach(flashMessage => {
        const removalTimeout = setTimeout(() => {
            flashMessage.parentElement.remove();
        }, 2000);
        
        flashMessage.addEventListener('click', function(){
            clearTimeout(removalTimeout);
            this.parentElement.remove();
        });
    });
});