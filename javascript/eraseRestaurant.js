const eraseRestaurant = document.querySelector('.erase-restaurant-btn')
console.log(eraseRestaurant)
if (eraseRestaurant) {
    eraseRestaurant.addEventListener('click', async function () {
        const section = document.querySelector('#popup')
        console.log(section)
        section.classList.remove("hidden")
        section.innerHTML = ''

        const popup_box_content = document.createElement('div')
        popup_box_content.classList.add("popup-box-content")

        const p = document.createElement('p');
        p.textContent = "Tem a certeza que deseja eliminar este restaurante? ";


        popup_box_content.appendChild(p);

        const acceptButtons = document.createElement('div');
        acceptButtons.className = "acceptButtons"
        const yesButton = document.createElement('a');
        const noButton = document.createElement('a');

        const iCross = document.createElement('i');
        iCross.className = "fa-light fa-circlclassNamerk";

        yesButton.textContent = "Sim";
        yesButton.href = '../eraseRestaurant.php';
        yesButton.appendChild(iCross);


        noButton.textContent = "Não"
        noButton.id = "noButton";

        acceptButtons.appendChild(yesButton);
        acceptButtons.appendChild(noButton);
        popup_box_content.appendChild(acceptButtons);
        section.appendChild(popup_box_content)

        closeErasePopup();
    })
}
async function closeErasePopup() {
    const removeaddDish = document.querySelector('#noButton')
    if (removeaddDish) {
        removeaddDish.addEventListener('click', async function () {
            console.log('hi')
            const section = document.querySelector('#popup')
            section.classList.add("hidden")
        })
    }
}