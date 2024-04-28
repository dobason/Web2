<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Gửi yêu cầu đăng nhập và xử lý phản hồi
        const form = document.getElementById('formDangNhap');
        form.addEventListener('submit', async function(event) {
            event.preventDefault();

            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;

            try {
                const response = await fetch('process_login.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ username, password })
                });

                const data = await response.json();
                if (data.success) {
                    // Đăng nhập thành công, thay đổi nội dung phần tử #namelogin
                    const namelogin = document.getElementById('namelogin');
                    namelogin.innerHTML = `${data.username}<i class="fa fa-caret-down"></i>`;
                    
                    // Chuyển hướng đến trang index.php hoặc trang khác
                    window.location.href = 'index.php';
                } else {
                    alert(data.message); // Hiển thị thông báo lỗi
                }
            } catch (error) {
                console.error('Đã xảy ra lỗi:', error);
            }
        });
    });
</script>
