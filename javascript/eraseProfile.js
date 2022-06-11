const eraseProfile = document.querySelector('.erase-profile-btn')
console.log(eraseProfile)
if (eraseProfile) {
    eraseProfile.addEventListener('click', async function () {
        const section = document.querySelector('#popup')
        const div = document.querySelector("#buttons-edit")
        console.log(section)
        section.classList.remove("hidden")
        section.innerHTML = ''

        const popup_box_content = document.createElement('div')
        popup_box_content.classList.add("popup-box-content")

        const p = document.createElement('p');
        p.textContent = "Tem a certeza que deseja eliminar este perfil? ";


        popup_box_content.appendChild(p);

        const acceptButtons = document.createElement('div');
        acceptButtons.className = "acceptButtons"
        const yesButton = document.createElement('button');
        yesButton.type="submit"
        yesButton.classList.add("eraseRestaurant-btn")
        yesButton.id = "nostyle"
        const noButton = document.createElement('button');



        const form=document.createElement("form")
        form.action="../eraseProfile.php"
        form.method="post"
        form.classList="yesButton"

        yesButton.textContent = "Sim";
        const csrf=document.createElement("input")
        csrf.type="hidden"
        csrf.name="csrf"
        csrf.value=div.dataset.token
        form.appendChild(csrf)
        form.appendChild(yesButton)


        noButton.textContent = "Não"
        noButton.id = "noButton";

        acceptButtons.appendChild(form);
        acceptButtons.appendChild(noButton);
        popup_box_content.appendChild(acceptButtons);
        section.appendChild(popup_box_content)

        closeEraseProfilePopup();
    })
}
async function closeEraseProfilePopup() {
    const removeProfile = document.querySelector('#noButton')
    if (removeProfile) {
        removeProfile.addEventListener('click', async function () {
            console.log('hi')
            const section = document.querySelector('#popup')
            section.classList.add("hidden")
        })
    }
}