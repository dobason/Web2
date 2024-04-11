document.addEventListener("DOMContentLoaded", function () {
    // Lưu trữ số lượng sản phẩm trong giỏ hàng trong local storage
    let cartItemCount = localStorage.getItem("cartItemCount") || 0;

    // Hiển thị số lượng sản phẩm trong giỏ hàng
    const cartItemCountElement = document.getElementById("cartItemCount");
    cartItemCountElement.textContent = cartItemCount;

    // Sự kiện click cho nút "Mua ngay"
    function addToCart(button) {
        // Kiểm tra xem sự kiện đã được xử lý chưa
        if (button.getAttribute("data-clicked") === "true") {
            return;
        }

        // Đánh dấu sự kiện đã được xử lý
     

        // Tăng số lượng sản phẩm trong giỏ hàng
        cartItemCount++;
        cartItemCountElement.textContent = cartItemCount;

        // Lưu trữ số lượng sản phẩm trong local storage
        localStorage.setItem("cartItemCount", cartItemCount);
    }

    // Gắn sự kiện click cho nút "Mua ngay"
    const buyNowButton = document.querySelector('.buyNowButton');
    buyNowButton.addEventListener('click', function () {
        addToCart(this);
    });
});
