document.getElementById('cal').addEventListener('click', function() {

    var outstanding = document.form.total_outstanding.value;
    var outstanding = +outstanding;
    var amount = document.form.amount_paid.value;
    var amount = +amount;
    var balance = amount - outstanding;
    document.getElementById('balance').value = balance;
});

function printpdf() {
    window.print();
};


// Share Option function
const facebookBtn = document.querySelector(".btn-facebook");
const twitterBtn = document.querySelector(".btn-twitter");
const linkedinBtn = document.querySelector(".btn-linkedin");
const pinterestBtn = document.querySelector(".btn-pinterest");
const whatsappBtn = document.querySelector(".btn-whatsapp");

function init() {
    let postUrl = encodeURI(document.location.href);
    let postTitle = encodeURI("Hi everyone, please check this post. Like, share and comment");

    facebookBtn.setAttribute("href", `https://www.facebook.com/sharer.php?u=${postUrl}`);

    twitterBtn.setAttribute("href", `https://twitter.com/share?url=${postUrl}&text=${postTitle}&via=[via]&hashtags=[hashtags]`);

    whatsappBtn.setAttribute("href", `https://api.whatsapp.com/send?text=${postTitle} ${postUrl}`);

    linkedinBtn.setAttribute("href", `$email = 'mailto:?subject=' . $${postTitle} . '&body=Check out this site: '. $${postUrl}`);
}

init();

// Search bar function
// const searchInput = document.getElementById('search-input');
// const namesFromDom = document.getElementsByClassName('name');

// searchInput.addEventListener('input', (event) => {
//     const { value } = event.target;

//     const searchQuery = value.toLowerCase();

//     for (const nameElement of namesFromDom) {
//         let name = nameElement.textContent.toLowerCase();

//         if (name.includes(searchQuery)) {
//             nameElement.style.color = "red";
//         } else {
//             nameElement.style.color = "yellow";
//         }
//     }

//     console.log("Hello Search input");


// });