// document.getElementById('cal').addEventListener('click', function() {

//     var outstanding = document.form.total_outstanding.value;
//     var outstanding = +outstanding;
//     var amount = document.form.amount_paid.value;
//     var amount = +amount;
//     var balance = amount - outstanding;
//     document.getElementById('balance').value = balance;
// });

function getValue() {
    var outstanding = document.form.total_outstanding.value;
    var outstanding = +outstanding;
    var amount = document.form.amount_paid.value;
    var amount = +amount;
    var balance = amount - outstanding;
    document.getElementById('balance').value = balance;
}

// function printpdf() {
//     window.print();
// };

function printpdf() {
    // This logic determines which div should be printed...
    $("#receipt").addClass("print-content");
    window.print();
}


// Share Option function
const facebookBtn = document.querySelector(".btn-facebook");
const twitterBtn = document.querySelector(".btn-twitter");
const whatsappBtn = document.querySelector(".btn-whatsapp");

function init() {
    let postUrl = encodeURI(document.location.href);
    let postTitle = encodeURI("Hi, please download receipt with the link below");

    facebookBtn.setAttribute("href", `https://www.facebook.com/sharer.php?u=${postUrl}`);

    twitterBtn.setAttribute("href", `https://twitter.com/share?url=${postUrl}&text=${postTitle}&via=[via]&hashtags=[hashtags]`);

    whatsappBtn.setAttribute("href", `https://api.whatsapp.com/send?text=${postTitle} ${postUrl}`);

}

init();

function sharePercentage(value) {
    var dc, lo, lt, br, oc, bs, ds, ceo, gm, md;
    dc = (17 * value) / 100;
    lo = (2 * value) / 100;
    lt = (1 * value) / 100;
    br = (30 * value) / 100;
    oc = (10 * value) / 100;
    bs = (5 * value) / 100;
    ds = (2.5 * value) / 100;
    ceo = (17 * value) / 100;
    gm = (4.5 * value) / 100;
    md = (11 * value) / 100;

    document.getElementById('dircom').value = dc;
    document.getElementById('level-one').value = lo;
    document.getElementById('level-two').value = lt;
    document.getElementById('business-invest').value = br;
    document.getElementById('office-cost').value = oc;
    document.getElementById('business-savings').value = bs;
    document.getElementById('director-share').value = ds;
    document.getElementById('ceo').value = ceo;
    document.getElementById('gm').value = gm;
    document.getElementById('md').value = md;
}

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