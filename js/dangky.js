// Hàm xử lý sự kiện đăng ký
function dangKy() {
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;
    var confirmPassword = document.getElementById('confirmPassword').value;
    var fullNameUser = document.getElementById('fullname').value;

    // Kiểm tra độ dài họ và tên
    if (username.length < 3) {
        alert("Vui lòng nhập họ và tên lớn hơn 3 kí tự.");
        return;
    }

    // Kiểm tra độ dài mật khẩu
    if (password.length < 6) {
        alert("Vui lòng nhập mật khẩu lớn hơn 6 kí tự.");
        return;
    }

    // Kiểm tra xác nhận mật khẩu
    if (password !== confirmPassword) {
        alert("Mật khẩu không khớp!");
        return;
    }

    // Kiểm tra xem đã nhập đầy đủ thông tin tên đăng nhập, mật khẩu và xác nhận mật khẩu chưa
    if (!username || !password || !fullname) {
        alert("Vui lòng nhập đầy đủ thông tin tài khoản và mật khẩu.");
        return;
    }

    // Simulate successful registration (replace this with actual AJAX call)
    // Sau khi gửi thành công dữ liệu đăng ký, chuyển hướng đến trang index.php
    alert("Đăng ký thành công!");
    window.location.href = 'dangnhap.php'; // Chuyển hướng đến trang index.php
}


function dangNhap() {
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    if (!username || !password) {
        alert("Vui lòng nhập đầy đủ thông tin tài khoản và mật khẩu.");
        return;
    }

    // Gửi yêu cầu đăng nhập đến máy chủ
    $.ajax({
        url: 'process_login.php',
        type: 'POST',
        data: {
            username: username,
            password: password
        },
        success: function(response) {
            if (response.trim() === "success") {
                // Đăng nhập thành công, thay đổi nội dung và ẩn liên kết
                const nameloginElement = document.getElementById('namelogin');
                const dropdownContent = nameloginElement.nextElementSibling;

                // Thay đổi nội dung của #namelogin
                nameloginElement.innerHTML = `${username}<i class="fa fa-caret-down"></i>`;

                // Ẩn các liên kết trong dropdown-content
                if (dropdownContent) {
                    const dropdownItems = dropdownContent.querySelectorAll('.dropdown-item');
                    dropdownItems.forEach(item => {
                        const href = item.getAttribute('href');
                        if (href && (href.includes('dangnhap.php') || href.includes('dangki.php'))) {
                            item.style.display = 'none';
                        }
                    });
                }

                alert("Đăng nhập thành công!");
                window.location.href = 'index.php'; // Chuyển hướng đến trang index.php
            } else {
                alert("Tên đăng nhập hoặc mật khẩu không đúng.");
            }
        },
        error: function() {
            alert("Đã xảy ra lỗi. Vui lòng thử lại sau.");
        }
    });
}

function togglePassword(inputId) {
    var passwordField = document.getElementById(inputId);
    var showPasswordIcon = document.querySelector('#' + inputId + ' + .show-password i');

    if (passwordField.type === 'password') {
        passwordField.type = 'text';
        showPasswordIcon.className = 'bx bx-hide';
    } else {
        passwordField.type = 'password';
        showPasswordIcon.className = 'bx bx-show';
    }
}

