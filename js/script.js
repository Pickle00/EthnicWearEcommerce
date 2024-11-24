// const currentPage = window.location.pathname.split("/").pop();

// // Get all list items
// const navItems = document.querySelectorAll(".nav-shop li");

// // Loop through the items and set background color for the current page's item
// navItems.forEach((item) => {
//   const link = item.querySelector("a");
//   if (link.getAttribute("href") === currentPage) {
//     console.log(currentPage);
//     item.style.backgroundColor = "green"; // Set the background color
//     item.style.color = "white"; // Set the
//   }
// });

const currentPage = window.location.pathname;

console.log("Current Page:", currentPage);

const navItems = document.querySelectorAll(".nav-shop ul a");

navItems.forEach((item) => {
  const href = link.getAttribute("href");
  console.log(item.href);
    if(item.href.includes('${activepage}')){
        item.classList.add('.active');
    }
});