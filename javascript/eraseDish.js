const eraseDish = document.querySelectorAll('#eraseDish')
for (let i = 0; i < editDish.length; i++) {
        if (eraseDish[i]) {
            eraseDish[i].addEventListener('click', async function () {
                const section = document.querySelector('#popup')
                const article = document.querySelectorAll(".info-dish")
                if (editDish[i].id === article[i].dataset.iddish) {
                    section.classList.remove("hidden")
                    section.innerHTML = ''

                    const popup_box_content = document.createElement('div')
                    popup_box_content.classList.add("popup-box-content")

                    const p = document.createElement('p');
                    p.textContent = "Tem a certeza que deseja eliminar este prato? ";


                    popup_box_content.appendChild(p);

                    const acceptButtons = document.createElement('div');
                    acceptButtons.className = "acceptButtons"
                    const yesButton = document.createElement('button');
                    yesButton.type = "submit"
                    yesButton.classList.add("eraseDish-btn")
                    yesButton.id = "nostyle"
                    const noButton = document.createElement('button');


                    const form = document.createElement("form")
                    form.action = "../actions/removeDish.php?idDish=" + article[i].dataset.iddish + "&idRestaurant=" + article[i].dataset.idrestaurant;
                    form.method = "post"
                    form.classList = "yesButton"

                    yesButton.textContent = "Sim";
                    const csrf = document.createElement("input")
                    csrf.type = "hidden"
                    csrf.name = "csrf"
                    csrf.value = article[i].dataset.token
                    form.appendChild(csrf)
                    form.appendChild(yesButton)


                    noButton.textContent = "Não"
                    noButton.id = "noButton";

                    acceptButtons.appendChild(form);
                    acceptButtons.appendChild(noButton);
                    popup_box_content.appendChild(acceptButtons);
                    section.appendChild(popup_box_content)
                }
                closeEraseDishPopup();
            })
        }
}
async function closeEraseDishPopup() {
    const removeaddDish = document.querySelector('#noButton')
    if (removeaddDish) {
        removeaddDish.addEventListener('click', async function () {
            const section = document.querySelector('#popup')
            section.classList.add("hidden")
        })
    }
}