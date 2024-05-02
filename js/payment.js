
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
                var deliveryTimeHiddenId;
            
                if (deliveryType === 'standard') {
                    deliveryTimeDisplay = document.getElementById('deliveryTimeDisplayStandard');
                    deliveryTimeHiddenId = 'deliveryTimeStandard';
                } else if (deliveryType === 'economy') {
                    deliveryTimeDisplay = document.getElementById('deliveryTimeDisplayEconomy');
                    deliveryTimeHiddenId = 'deliveryTimeEconomy';
                }
            
                if (deliveryTimeDisplay) {
                    // Tính toán và hiển thị thời gian giao hàng
                    var formattedTime = deliveryTimeDisplay.textContent.trim();
                    deliveryTimeDisplay.textContent = 'Thời gian giao hàng: ' + formattedTime;
            
                    // Cập nhật giá trị vào trường ẩn tương ứng
                    var deliveryTimeHidden = document.getElementById(deliveryTimeHiddenId);
                    if (deliveryTimeHidden) {
                        deliveryTimeHidden.value = formattedTime; // Gán giá trị thời gian vào trường ẩn
                    }
                }
            }
            
    
            function formatTime(date) {
                var day = date.getDate();
                var month = date.getMonth() + 1; // Tháng bắt đầu từ 0
                return (day < 10 ? '0' : '') + day + '/' + (month < 10 ? '0' : '') + month;
            }
            

            