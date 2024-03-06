document.addEventListener('DOMContentLoaded', function(){
    const flashMessages = document.querySelectorAll('.flash-message');

    flashMessages.forEach(flashMessage => {
        flashMessage.addEventListener('click', function(){
            this.parentElement.remove();
        });
    });
});