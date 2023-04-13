# SSRF: là nơi kẻ tấn công có thể tạo ra các yêu cầu http từ phía server mà không cần trực tiếp truy cập vào đó. kẻ tấn công có thể thực hiện lệnh tùy ý

# Nguyên nhân:
+ Ko ktra xác thực các tham số đầu vào (ví dụ URL, IP, tham số để tạo ra các yêu cầu HTTP từ phía máy chủ mục tiêu)
+ Các giao thức ko an toàn: FTP, SMB, file:// đc sử dụng http

Quét và tấn công các hệ thống từ mạng nội bộ mà thông thường không truy cập được

Liệt kê và tấn công các dịch vụ đang chạy trên các máy chủ này

Khai thác các dịch vụ xác thực dựa trên máy chủ


Su dung php wrapper 
php://filter/convert.base64-encode/resource=index

