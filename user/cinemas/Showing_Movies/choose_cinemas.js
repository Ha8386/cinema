//Chuyển tab
const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const tabs = $$(".tab-item");
const panes = $$(".tab-pane");

const tabActive = $(".tab-item.active");
const line = $(".tabs .line");

requestIdleCallback(function () {
  line.style.left = tabActive.offsetLeft + "px";
  line.style.width = tabActive.offsetWidth + "px";
});

tabs.forEach((tab, index) => {
  const pane = panes[index];

  tab.onclick = function () {
    $(".tab-item.active").classList.remove("active");
    $(".tab-pane.active").classList.remove("active");

    line.style.left = this.offsetLeft + "px";
    line.style.width = this.offsetWidth + "px";

    this.classList.add("active");
    pane.classList.add("active");
  };
});

//Thu gọn ô lịch chiếu
document.addEventListener('DOMContentLoaded', function() {
  // Lấy tất cả các phần tử mũi tên
  const toggleArrows = document.querySelectorAll('.toggle-arrow');

  toggleArrows.forEach(arrow => {
      arrow.addEventListener('click', function() {
          // Tìm phần tử toggle-content liên quan đến mũi tên này
          const content = this.parentElement.nextElementSibling;

          if (content.style.maxHeight) {
              // Nếu phần tử đã mở rộng, ta thu gọn nó lại
              content.style.maxHeight = null;
              this.classList.remove('rotated');   // Xóa lớp xoay khi thu gọn
          } else {
              // Mở rộng phần tử
              content.style.maxHeight = content.scrollHeight + "px"; // Đặt chiều cao thực tế
              this.classList.add('rotated');      // Thêm lớp xoay khi mở rộng
          }
      });
  });
});



