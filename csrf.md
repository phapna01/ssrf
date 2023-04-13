CSRF: crossf site request forgery giả mạo yêu cầu trên nhiều trang web.
Do sự thiếu sot trong cơ chế xác thực người dùng của ứng dụng web

Cho phép kẻ tấn công khiến người dùng thực hiện các hành độg mà họ không có ý định thực hiện. Cho phép kẻ tấn công phá vỡ 1 phần chính sách gốc, được thiết kế để ngăn các trang web khác nhau can thiệp lẫn nhau.

# Nguyên nhân: Do thiếu kiểm soát và xác thực các yêu cầu từ các nguồn không đáng tin cậy. khi web cho phép các yêu cầu từ các nguồn không đáng tin cậy mà ko có các biện pháp bảo mật thích hợp.

# 1 cuộc tấn công CSRF sẽ được thực hiện:
+ Có thay đổi quyền hoặc thay đổi mật khẩu ()
+ Thực hiện hành động đưa ra 1 hay nhiều HTTP và ứng dụng chỉ đựa vào cookie based để xác định người dùng đã thực hiện yêu cầu. 
+ Yêu cầu thực hiện hành động ko chứa bất kỳ tham số nào có giá trị mà kẻ tấn công ko thể xác định hoặc đoán

# Defences CSRF:
- CSRF tokens: giá trị duy nhất, bí mật và ko thể đoạn trước được đưuọc tạo bởi phía server và chia sẻ với client. khi gửi form , client phải bao gồm token CSRF đúng trong yêu cầu. 
-  Gửi request tới server của mình gắn kèm cookie của ng dùng
Giả dạng request của người dùng tới trang web của bạn