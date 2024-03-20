document.addEventListener('DOMContentLoaded', function (){
    const toggleButtons = document.querySelectorAll('.js-btn');

    toggleButtons.forEach(button => {
        button.addEventListener('click', function (){
            const orderId = this.id.replace('order-toggle-', '');
            const orderDiv = document.getElementById(`order-${orderId}`);

            if(orderDiv.classList.contains('hidden')){
                orderDiv.classList.remove('hidden');
                orderDiv.classList.add('grid');     
                this.innerHTML = 'Hide';

                setTimeout(() => {
                    orderDiv.classList.add('e-show');
                }, 1);
            }else{
                orderDiv.classList.remove('e-show');

                setTimeout(() => {
                    orderDiv.classList.add('hidden');
                    orderDiv.classList.remove('grid');                
                    this.innerHTML = 'Show';
                }, 300);
                
            }
        });
    });
})