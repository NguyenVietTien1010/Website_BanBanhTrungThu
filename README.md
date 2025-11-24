# 🎑 Website Bán Bánh Trung Thu – Laravel Ecommerce

Dự án xây dựng website thương mại điện tử chuyên bán bánh trung thu, đảm bảo giao diện đẹp – hiện đại – chuẩn UX/UI, đồng thời hỗ trợ đầy đủ các nghiệp vụ mua sắm, thanh toán và quản trị hệ thống.
Xem giao diện Figma: https://www.figma.com/design/vWGsSuoFW8KqHtZtaEJCGZ/Website_B%C3%A1n-B%C3%A1nh-Trung-Thu?node-id=0-1&t=bZY1Uw52fv5zsHym-1
---

# 📘 Thông Tin Đồ Án
- 🏫 Trường: Đại học Công Thương TP.HCM  
- 📚 Học phần: Lập Trình Mã Nguồn Mở  
- 👨‍🏫 GVHD: Huỳnh Khắc Duy  
- 👥 Nhóm: 13  

### 👑 Vai trò thành viên
| Thành viên | MSSV | Vai trò |
|------------|--------|---------|
| Nguyễn Viết Tiến | 2001224408 | ⭐ Thiết kế giao diện + Xử lý nghiệp vụ + Code chức năng + Test hệ thống |
| Đặng Cam Hồng | 2001221533 | Thiết kế giao diện + Database |
| Trần Dương Tường Vy | 2001225950 | Backend + Test |

---

# 🏗️ Cấu trúc dự án Laravel
```plaintext
app/
bootstrap/
config/
database/
public/
resources/
routes/
.env
composer.json
```

# ⚙️ CHỨC NĂNG CHÍNH CỦA HỆ THỐNG

# 👤 Chức năng người dùng (User)

🔐 1. Xác thực người dùng
- Đăng ký tài khoản
- Đăng nhập
- Đăng xuất
- Xác minh email qua PHPMailer
- Quên mật khẩu
- Quản lý tài khoản cá nhân

🛒 2. Chức năng sản phẩm
- Xem danh sách sản phẩm
- Xem chi tiết sản phẩm
- Tìm kiếm theo tên
- Lọc theo danh mục

🛍️ 3. Giỏ hàng
- Thêm vào giỏ
- Cập nhật số lượng
- Xóa sản phẩm
- Tính tổng tiền
- Lưu giỏ trong session

💳 4. Thanh toán
- Nhập thông tin giao hàng
- Thanh toán COD
- Mã đơn hàng tự tạo
- Lưu đơn vào database

📦 5. Quản lý đơn hàng
- Xem lịch sử đơn hàng
- Xem trạng thái đơn
- Xem chi tiết đơn hàng
---

# 🛠️ Chức năng dành cho quản trị viên (Admin)

📦 1. Quản lý sản phẩm
- Thêm / sửa / xóa sản phẩm
- Upload ảnh (Cloudinary)
- Quản lý giá & mô tả

🗂️ 2. Quản lý danh mục
- Thêm danh mục
- Sửa danh mục
- Xóa danh mục
- Thống kê số lượng sản phẩm trong danh mục

📑 3. Quản lý đơn hàng
- Xem tất cả đơn
- Cập nhật trạng thái đơn
- Xác nhận thanh toán
- Xuất hóa đơn
- Theo dõi lịch sử xử lý đơn

👥 4. Quản lý người dùng
- Xem danh sách user
- Khóa / mở khóa tài khoản
- Phân quyền User / Admin

📊 5. Dashboard thống kê
- Doanh thu theo ngày / tháng / năm
- Sản phẩm bán chạy
- Biểu đồ dạng Bar / Line / Pie

🔒 6. Bảo mật hệ thống
- Middleware phân quyền
- JWT Login / Session
- CSRF Token
- Chống SQL Injection
- Chống XSS

---

# 🧱 Cơ sở dữ liệu
Các bảng chính:
- users
- categories
- products
- orders
- order_items
- sessions

---

# 🚀 Hướng Dẫn Cài Đặt

1. Clone dự án:
git clone <link_repo>
cd <thu_muc_du_an>

2. Cài đặt Composer:
composer install

3. Tạo file môi trường:
cp .env.example .env

4. Cấu hình database (.env):
DB_DATABASE=banhtrungthu
DB_USERNAME=root
DB_PASSWORD=

5. Generate APP KEY:
php artisan key:generate

6. Tạo bảng database:
php artisan migrate

7. Chạy server:
php artisan serve

---

# 👑 Vai Trò – Nguyễn Viết Tiến

⭐ 1. Thiết kế giao diện (UI/UX)
- Thiết kế bố cục tổng thể
- Theme Trung Thu (tím – vàng)
- Responsive mọi thiết bị
- Template Blade tối ưu hiệu năng

⭐ 2. Xử lý nghiệp vụ (Business Logic)
- Giỏ hàng (add/update/delete)
- CRUD sản phẩm
- Logic thanh toán
- Đổ dữ liệu lên giao diện
- Validation form
- Logic nội bộ sản phẩm & đơn hàng

---

# ❤️ Cảm ơn đã xem dự án!
