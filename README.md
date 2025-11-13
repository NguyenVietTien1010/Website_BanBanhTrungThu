⚙️ CHỨC NĂNG CHÍNH CỦA HỆ THỐNG
👤 Chức năng người dùng (User)
🔐 1. Xác thực người dùng


Đăng ký tài khoản


Đăng nhập


Đăng xuất


Xác minh email qua PHPMailer


Quên mật khẩu


Quản lý tài khoản cá nhân


🛒 2. Chức năng sản phẩm


Xem danh sách sản phẩm


Xem chi tiết sản phẩm


Tìm kiếm theo tên


Lọc theo danh mục


Gợi ý sản phẩm liên quan


🛍️ 3. Giỏ hàng


Thêm vào giỏ


Cập nhật số lượng


Xóa sản phẩm


Tính tổng tiền


Lưu giỏ trong session


💳 4. Thanh toán


Nhập thông tin giao hàng


Thanh toán COD / Online


Email xác nhận đơn hàng


Mã đơn hàng tự tạo


Lưu đơn vào database


📦 5. Quản lý đơn hàng


Xem lịch sử đơn hàng


Xem trạng thái


Xem chi tiết


⭐ 6. Đánh giá sản phẩm


Đánh giá 1–5 sao


Viết bình luận


Xem đánh giá của người khác



🛠️ Chức năng dành cho quản trị viên (Admin)
📦 1. Quản lý sản phẩm


Thêm / sửa / xóa


Upload hình (Cloudinary)


Quản lý tồn kho


Quản lý giá & mô tả


🗂️ 2. Quản lý danh mục


Thêm


Sửa


Xóa


Đếm số sản phẩm trong danh mục


📑 3. Quản lý đơn hàng


Xem tất cả đơn


Cập nhật trạng thái


Xác nhận thanh toán


Xuất hóa đơn


👥 4. Quản lý người dùng


Xem danh sách


Khóa / mở khóa tài khoản


Phân quyền User / Admin


📊 5. Dashboard thống kê


Doanh thu ngày / tháng / năm


Sản phẩm bán chạy


Biểu đồ (Bar / Line / Pie)


🔒 6. Bảo mật


Middleware phân quyền


JWT Login


CSRF Token


Chống SQL Injection


Chống XSS



🧱 Cơ sở dữ liệu
Các bảng chính:


users


categories


products


orders


order_items


sessions



🚀 Hướng Dẫn Cài Đặt
1. Clone dự án
git clone <link_repo>
cd <thu_muc_du_an>

2. Cài đặt Composer
composer install

3. Tạo file môi trường
cp .env.example .env

Cập nhật cấu hình DB:
DB_DATABASE=banhtrungthu
DB_USERNAME=root
DB_PASSWORD=

4. Generate APP KEY
php artisan key:generate

5. Tạo bảng database
php artisan migrate

6. Chạy server
php artisan serve

👉 Truy cập website: http://localhost:8000

👑 Vai Trò – Nguyễn Viết Tiến
⭐ 1. Thiết kế giao diện (UI/UX)


Layout tổng thể


Theme Trung Thu


Responsive mọi thiết bị


Blade Template


⭐ 2. Xử lý nghiệp vụ (Business Logic)


Giỏ hàng (add/update/delete)


CRUD sản phẩm


Xử lý thanh toán


Đổ dữ liệu ra giao diện


Validation form


Logic nội bộ hệ thống


⭐ 3. Code & Testing


Test toàn hệ thống


Debug frontend & backend


Tối ưu hiệu năng & bảo mật



❤️ Cảm ơn đã xem dự án!

---

# 🎉 **XONG – Đây là phiên bản bạn muốn!**  
→ TẤT CẢ đều là **một khối CODE duy nhất**, GitHub sẽ hiển thị đúng 100%.

Nếu bạn muốn:

🔥 **Tạo README theo style PRO (có badge, banner, màu gradient)**  
🔥 **Chèn hình ảnh giao diện từ file ZIP bạn gửi**  
🔥 **Tôi xuất file README.md để bạn tải**

Chỉ cần nói: **"Làm bản đẹp hơn"** hoặc **"Xuất file README.md"**.
