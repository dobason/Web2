
      document.addEventListener("DOMContentLoaded", function() {
        var popup = document.getElementById('popup');
        var falsePopup = document.getElementById('popup-false');
        var confirmButton = document.querySelector('.show-popup-button');
    
        confirmButton.addEventListener('click', function() {
            var nameInput = document.getElementById('name');
            var phoneNumberInput = document.getElementById('phoneNumber');
            var addressInput = document.getElementById('deliveryAddress');
    
            // Kiểm tra dữ liệu nhập
            if (!nameInput.checkValidity()) {
                showFalsePopup('Vui lòng điền lại thông tin');
            }
    
            if (!phoneNumberInput.checkValidity()) {
                showFalsePopup('Vui lòng điền lại thông tin');
            }
    
            if (!addressInput.checkValidity()) {
                showFalsePopup('Vui lòng điền lại thông tin');
            }
    
            // Kiểm tra tất cả các trường để quyết định hiển thị popup chính hay không
            if (nameInput.checkValidity() && phoneNumberInput.checkValidity() && addressInput.checkValidity()) {
                popup.classList.add('active');
    
                setTimeout(function() {
                    popup.classList.add('fade-out');
                    setTimeout(function() {
                        popup.classList.remove('active', 'fade-out');
                    }, 500);
                }, 2000);
            }
        });
    
        function showFalsePopup(message) {
            var falsePopupMessage = falsePopup.querySelector('.in-popup-bottom p');
            falsePopupMessage.textContent = message;
    
            // Hiển thị popup thông báo bằng cách thêm lớp 'active'
            falsePopup.classList.add('active');
    
            // Đặt thời gian chờ và sau đó tự động tắt popup
            setTimeout(function() {
                falsePopup.classList.add('fade-out');
                setTimeout(function() {
                    falsePopup.classList.remove('active', 'fade-out');
                }, 500);
            }, 2000);
        }
    });
    
    
    document.addEventListener("DOMContentLoaded", function() {
                // Gọi hàm setDeliveryTime để hiển thị thời gian ngay khi trang tải
                setDeliveryTime('standard');
                setDeliveryTime('economy'); // Thêm dòng này để hiển thị thời gian mặc định cho Giao hàng tiết kiệm
            });
    
            function setDeliveryTime(deliveryType) {
                var deliveryTimeDisplay;
    
                if (deliveryType === 'standard') {
                    deliveryTimeDisplay = document.getElementById('deliveryTimeDisplayStandard');
                } else if (deliveryType === 'economy') {
                    deliveryTimeDisplay = document.getElementById('deliveryTimeDisplayEconomy');
                }
    
                if (deliveryTimeDisplay) {
                    // Tính toán thời gian giao hàng tương ứng
                    var currentTime = new Date();
                    var deliveryTime = new Date(currentTime);
                    if (deliveryType === 'economy') {
                        deliveryTime.setDate(currentTime.getDate() + 2); // Cộng thêm 2 ngày
                    }
    
                    // Hiển thị thời gian dưới dạng "ngày/tháng"
                    var formattedTime = formatTime(deliveryTime);
                    deliveryTimeDisplay.textContent = 'Thời gian giao hàng: ' + formattedTime;
                }
            }
    
            function formatTime(date) {
                var day = date.getDate();
                var month = date.getMonth() + 1; // Tháng bắt đầu từ 0
                return (day < 10 ? '0' : '') + day + '/' + (month < 10 ? '0' : '') + month;
            }