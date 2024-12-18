<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

Phiên bản phần mềm
```
PHP 8.2.12
XAMPP 3.3.0
Laravel Framework 11.35.1
```

Cấu hình ở file .env
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=book
DB_USERNAME=root
DB_PASSWORD=
```

```
cd webservice-app-truyen-main
php artisan migrate
```

Insert dữ liệu vào từ file data.sql

```
php artisan serve
```

Đường link mặc định: 
http://localhost:8000/
## Lấy token cho API yêu cầu xác thực
Truy cập http://localhost:8000/api/login
```
Method: POST
Headers: 
    Key : Accept
    Value: application/json
Body:
    username: admin
    password: admin
```
![image](https://github.com/user-attachments/assets/a176401b-24f0-48a0-ab5d-d5d3422dccb8)
![image](https://github.com/user-attachments/assets/e6c26ef8-f15f-4b99-9086-7299568be5f0)

## Sử dụng token test API cần quyền admin

Ví dụ thêm tác giả http://localhost:8000/api/authors
```
Method: POST
Authorization:
    Auth Type: Bearer Token
    paste token lấy được ở /login vào
Headers: 
    Key : Accept
    Value: application/json
Body:
    name: To Huu
```

![image](https://github.com/user-attachments/assets/99579b04-70a0-4fbf-bca2-9a8849d1a797)
![image](https://github.com/user-attachments/assets/a9117f67-eb24-466c-9861-dd0effee039a)

## Test API không cầu xác thực

Truy cập vào đường link API không yêu cầu xác thực
```
Ví dụ: http://localhost:8000/api/authors
Method: GET
```
![image](https://github.com/user-attachments/assets/9fe2a9a9-de30-459a-9518-b9256f38ef99)


## API Yêu cầu đăng nhập

![image](https://github.com/user-attachments/assets/8cb2a7a0-456f-4bc9-acda-839d64b2922a)

## API Yêu cầu quyền admin

![image](https://github.com/user-attachments/assets/463e6802-d6c7-4bb4-bc31-40bdb4928fe4)

## API Không yêu cầu xác thực

![image](https://github.com/user-attachments/assets/79af8da2-ca7f-43cb-ad8d-371f62c16c4b)


## 1. API Comment

![image](https://github.com/user-attachments/assets/bd695f73-3c4c-4c87-bf3d-6003a9b49ec7)


## 2. API Story

![image](https://github.com/user-attachments/assets/eba6737f-fcb8-405e-adfc-b415a281c60d)


## 3. API User

![image](https://github.com/user-attachments/assets/686b7ad0-c0e0-497a-a811-113c0c0f00c9)

## 4. API Author

![image](https://github.com/user-attachments/assets/c1873d5f-a323-4c70-a783-fa622749631b)


## 5. API Category

![image](https://github.com/user-attachments/assets/5c7f5b28-836e-4156-b69b-addc3d722fb3)

## 6. API Chapter

![image](https://github.com/user-attachments/assets/f42cc57c-229b-48ae-89c2-a250f9e6aebb)


## 7. API History

![image](https://github.com/user-attachments/assets/6af3df7d-cb92-40a2-8f62-991b1cd94954)

## 8. API Favourite

![image](https://github.com/user-attachments/assets/2a93b50e-d6b8-4ff4-acdf-aa5ceb41ca49)


## 9. API 

![image](https://github.com/user-attachments/assets/96628ca6-2399-46ad-b940-c43d3edd2c9d)


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
