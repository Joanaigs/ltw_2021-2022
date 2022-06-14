const sign_in_btn = document.querySelector('#sign-in-button');
const sign_up_btn = document.querySelector('#sign-up-button');
const container = document.querySelector('.container');
if(sign_up_btn) {
    sign_up_btn.addEventListener('click', () => {
        container.classList.add('sign-up-mode');
    });
}
if(sign_in_btn) {
    sign_in_btn.addEventListener('click', () => {
        container.classList.remove('sign-up-mode');
    });
}

let menu = document.querySelector('#menu-bars');
let navbar = document.querySelector('.navbar');
if(menu) {
    menu.onclick = () => {
        menu.classList.toggle('fa-times');
        navbar.classList.toggle('active');
    }
}

function editReview(id){
    let showReview = document.querySelectorAll('.showReview')
    let editReview = document.querySelectorAll('.editReviews')
    for(let i=0; i<showReview.length;i++ ) {
        if (parseInt(showReview[i].id) === id) {
            let showReviewDisplay=showReview[i].style.display;
            if (showReviewDisplay === 'block') {
                showReview[i].style.display = 'none'
                editReview[i].style.display = 'block'
            } else {
                showReview[i].style.display = 'block'
                editReview[i].style.display = 'none'
            }
        }
    }
}

function editComment(id){
    let showComment = document.querySelectorAll('.showComment')
    let editComment = document.querySelectorAll('.editComments')
    for(let i=0; i<showComment.length;i++ ) {
        if (parseInt(showComment[i].id) === id) {
            let showCommentDisplay=showComment[i].style.display;
            if (showCommentDisplay === 'block') {
                showComment[i].style.display = 'none'
                editComment[i].style.display = 'block'
            } else {
                showComment[i].style.display = 'block'
                editComment[i].style.display = 'none'
            }
        }
    }
}