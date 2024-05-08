<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel=" stylesheet" href="stylefont.css" />
    <link rel=" stylesheet" href="css/dangki.css" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <script src="vendor/fontawesome/js/all.min.js"></script>
    <script src="information.js"></script>
    <title>Register</title>
    <style>
        select{
            width: 32%;
    height: 100%;
    background:#aa9775;
    background-color:#aa9775;
    border: none;
    outline: none;
    border: 2px solid rgba(255, 255, 255, .2);
    border-radius: 40px;
    color: white;
    font-size: 70%;
            text-align: center;
        }
      
        .wrapper {
            width: 470px;
            padding: 30px 15px;
        }
    </style>
</head>

<body>
<?php
require_once 'db/dbhelper.php';

// Define your functions first
function getCityNameById($cityId) {
    $data = getDataFromJson(); // Get data from JSON
    foreach ($data as $city) {
        if ($city['Id'] === $cityId) {
            return $city['Name'];
        }
    }
    return ''; // Return empty string if not found
}

function getDistrictNameById($districtId) {
    $data = getDataFromJson(); // Get data from JSON
    foreach ($data as $city) {
        foreach ($city['Districts'] as $district) {
            if ($district['Id'] === $districtId) {
                return $district['Name'];
            }
        }
    }
    return ''; // Return empty string if not found
}

function getWardNameById($wardId) {
    $data = getDataFromJson(); // Get data from JSON
    foreach ($data as $city) {
        foreach ($city['Districts'] as $district) {
            foreach ($district['Wards'] as $ward) {
                if ($ward['Id'] === $wardId) {
                    return $ward['Name'];
                }
            }
        }
    }
    return ''; // Return empty string if not found
}

function getDataFromJson() {
    $jsonData = file_get_contents('js/locations.json');
    return json_decode($jsonData, true);
}

// Continue with your registration logic
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $thanhPhoId = $_POST['city'];
    $quanId = $_POST['district'];
    $phuongId = $_POST['ward'];

    session_start(); // Start the session if not already started


   
    $_SESSION['city'] = $thanhPhoId;
    $_SESSION['district'] =$quanId;
    $_SESSION['ward'] = $phuongId;

    // Get city, district, and ward names
    $thanhPho = getCityNameById($thanhPhoId);
    $quan = getDistrictNameById($quanId);
    $phuong = getWardNameById($phuongId);

    // Check password match
    if ($password !== $confirmPassword) {
        echo '<script>alert("Mật khẩu không khớp!");</script>';
    } else {
        // Perform registration
        $sql = "INSERT INTO khach_hang (Ten_KH, Tai_Khoan, Mat_Khau, Trang_Thai, Thanh_Pho, Quan, Phuong) VALUES ('$fullname', '$username', '$password', 1, '$thanhPho', '$quan', '$phuong')";
        execute($sql);
        echo   header('Location: print-bill.php');
    }
}
?>


<div class="wrapper">
    <form id="formDangKy" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h1>Đăng ký</h1>
        <div class="input-box">
            <input type="text" id="fullname" name="fullname" placeholder="Họ và tên" required />
        </div>
        <div class="input-box">
            <input type="text" id="username" name="username" placeholder="Tên đăng nhập" required />
        </div>
        <div class = "input-box">
                <select class="form-select form-select-sm mb-3" id="city" name="city" aria-label=".form-select-sm">
                    <option value="" selected>Tỉnh thành</option>
                </select>
                <select class="form-select form-select-sm mb-3" id="district" name="district" aria-label=".form-select-sm">
                    <option value="" selected>Quận huyện</option>
                </select>
                <select class="form-select form-select-sm" id="ward" name="ward" aria-label=".form-select-sm">
                    <option value="" selected>Phường xã</option>
                </select>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
   <!-- Đoạn mã JavaScript để lấy dữ liệu địa điểm và hiển thị lên các select -->
   <script>
  document.addEventListener('DOMContentLoaded', function() {
    var citis = document.getElementById("city");
    var districts = document.getElementById("district");
    var wards = document.getElementById("ward");
    var locationFileUrl = "js/location.js";
    var Parameter = {
      url: locationFileUrl,
      method: "GET",
      responseType: "json" // Sử dụng responseType là "json" để Axios tự động parse JSON
    };

    axios(Parameter)
      .then(function(response) {
        renderCity(response.data);
      })
      .catch(function(error) {
        console.error('Error fetching location data:', error);
      });

    function renderCity(data) {
      // Đổ dữ liệu các thành phố vào dropdown thành phố (city)
      data.forEach(function(city) {
        citis.options[citis.options.length] = new Option(city.Name, city.Id);
      });

      // Xử lý sự kiện khi chọn thành phố
      citis.onchange = function() {
        districts.length = 1; // Xóa tất cả các options trừ option đầu tiên (placeholder)
        wards.length = 1; // Xóa tất cả các options trừ option đầu tiên (placeholder)

        if (this.value !== "") {
          var selectedCity = data.find(function(item) {
            return item.Id === this.value;
          }, this);

          // Đổ dữ liệu các quận/huyện vào dropdown quận/huyện (district)
          if (selectedCity) {
            selectedCity.Districts.forEach(function(district) {
              districts.options[districts.options.length] = new Option(district.Name, district.Id);
            });
          }
        }
      };

      // Xử lý sự kiện khi chọn quận/huyện
      districts.onchange = function() {
        wards.length = 1; // Xóa tất cả các options trừ option đầu tiên (placeholder)

        if (this.value !== "") {
          var selectedCity = data.find(function(item) {
            return item.Id === citis.value;
          });

          if (selectedCity) {
            var selectedDistrict = selectedCity.Districts.find(function(district) {
              return district.Id === this.value;
            }, this);

            // Đổ dữ liệu các phường/xã vào dropdown phường/xã (ward)
            if (selectedDistrict) {
              selectedDistrict.Wards.forEach(function(ward) {
                wards.options[wards.options.length] = new Option(ward.Name, ward.Id);
              });
            }
          }
        }
      };
    }
  });
</script>


            </div>
        <div class="input-box">
            <input type="password" id="password" name="password" placeholder="Mật khẩu" required />
            <span class="show-password" onclick="togglePassword('password')"><i class="bx bx-show"></i></span>
        </div>
        <div class="input-box">
            <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Nhập lại mật khẩu" required />
            <span class="show-password" onclick="togglePassword('confirmPassword')"><i class="bx bx-show"></i></span>
        </div>
        <button type="submit" class="register">Đăng ký</button>
        <div class="login">
            <p>Đã có tài khoản? <a href="dangnhap.php">Đăng nhập</a></p>
            <p><a href="index.php"><i class="fa-solid fa-house"></i></a></p>
        </div>
    </form>
</div>
<script src="js/dangky.js"></script>

    
</body>

</html>