
    // Hàm kiểm tra trạng thái đăng nhập và xử lý khi bấm nút "Mua ngay"
    function buyProduct(productId) {
        // Kiểm tra xem người dùng đã đăng nhập hay chưa
        if (<?php echo isset($_SESSION['Ma_KH']) ? 'true' : 'false'; ?>) {
            // Người dùng đã đăng nhập, thực hiện mua sản phẩm
            addToCart(productId);
        } else {
            // Người dùng chưa đăng nhập, yêu cầu đăng nhập
            alert('Vui lòng đăng nhập để mua sản phẩm.');
            // Chuyển hướng người dùng đến trang đăng nhập
            window.location.href = 'dangnhap.php';
        }
    }

    // Hàm AJAX để thêm sản phẩm vào giỏ hàng
    function addToCart(productId) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'add_to_cart.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Xử lý kết quả sau khi thêm sản phẩm vào giỏ hàng thành công (nếu cần)
                    alert('Đã thêm sản phẩm vào giỏ hàng.');
                } else {
                    // Xử lý khi có lỗi xảy ra
                    alert('Có lỗi xảy ra khi thêm sản phẩm vào giỏ hàng.');
                }
            }
        };
        xhr.send('product_id=' + encodeURIComponent(productId));
    }
