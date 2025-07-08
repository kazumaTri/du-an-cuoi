# Học Lập Trình - Website Giáo Dục

## 📋 Mô tả dự án
Website học lập trình cơ bản với các khóa học HTML và CSS, bao gồm hệ thống quản lý người dùng và admin.

## 🏗️ Cấu trúc dự án được đề xuất

```
du-an-cuoi/
├── public/                 # Thư mục public (web root)
│   ├── index.php          # Entry point chính
│   ├── assets/            # Tài nguyên tĩnh
│   │   ├── css/           # Stylesheets
│   │   ├── js/            # JavaScript files
│   │   ├── img/           # Images
│   │   └── video/         # Video files
│   └── admin/             # Admin panel
├── app/                   # Application logic
│   ├── controllers/       # Controllers
│   ├── models/           # Database models
│   ├── views/            # View templates
│   └── helpers/          # Helper functions
├── config/               # Configuration files
│   ├── database.php      # Database configuration
│   └── app.php          # App configuration
├── vendor/               # Dependencies (nếu sử dụng Composer)
├── .gitignore           # Git ignore file
├── composer.json        # Composer dependencies
└── README.md           # Project documentation
```

## 🛠️ Công nghệ sử dụng
- **Backend**: PHP, MySQL
- **Frontend**: HTML, CSS, JavaScript, Bootstrap 5
- **Database**: MySQL

## 🚀 Cài đặt và chạy dự án

1. Clone repository
2. Cấu hình database trong `config/database.php`
3. Import database schema
4. Chạy trên web server (Apache/Nginx)

## 📝 Ghi chú
Dự án hiện tại cần được refactor để tối ưu cấu trúc thư mục và tách biệt rõ ràng giữa frontend và backend.