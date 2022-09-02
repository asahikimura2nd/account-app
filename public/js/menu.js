const hambarger = $('#hambarger');
const sideBar = $('#sideBar');
const mainContainer = $('#mainContainer');
const items = $('.items')
hambarger.on('click', function () { //ハンバーガーメニューをクリックしたら
  hambarger.toggleClass('active');
  console.log("ok!");
  sideBar.toggleClass('active');
  mainContainer.toggleClass('active');
  items.toggleClass('active');
});