function heartsClick(){
    const button = document.querySelectorAll('.heart');
    console.log(button)
    for(let i=0; i<button.length; i++) {
        button[i].addEventListener('click', async function () {
            if (button[i].classList.contains("liked")) {
                button[i].classList.remove("liked");
                const response = await fetch('api_favoriteRestaurant.php?add='+false +'&' + 'id='+this.id)
                console.log('api_restaurantsFilter.php?add='+true +'&' + 'id='+this.id)
                await response.json()
            } else {
                button[i].classList.add("liked");
                const response = await fetch('api_favoriteRestaurant.php?add='+true +'&' + 'id='+this.id)
                console.log('api_restaurantsFilter.php?add='+false +'&' + 'id='+this.id)
                await response.json()
            }
        });
    }}
heartsClick();
