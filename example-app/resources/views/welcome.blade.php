<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mammo Care - Đăng ký tham dự</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --primary-pink: #d81b60;
            --soft-pink: #fffafa;
            --text-dark: #333;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body,
        html {
            height: 100vh;
            margin: 0;
            padding: 0;
            font-family: 'Montserrat', sans-serif;
            overflow: hidden;
            /* Prevent body scroll */
        }

        .main-wrapper {
            width: 100%;
            height: 100vh;
            display: flex;
            background: #fff;
        }

        .left-panel {
            flex: 1.2;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background-image: url('{{ asset("image/anhnen.jpg") }}');
            background-size: cover;
            background-position: center;
            position: relative;
        }

        /* Darkening overlay for left panel background to make logo pop */
        .left-panel::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(2px);
        }

        .left-panel img {
            max-width: 95%;
            max-height: 90vh;
            width: auto;
            object-fit: contain;
            filter: drop-shadow(0 15px 30px rgba(0, 0, 0, 0.1));
            position: relative;
            z-index: 1;
        }

        .right-panel {
            flex: 0.8;
            display: flex;
            flex-direction: column;
            background: #fff;
            box-shadow: -10px 0 30px rgba(0, 0, 0, 0.05);
            z-index: 2;
        }

        /* Form Section */
        .form-section {
            padding: 30px 60px;
            flex-shrink: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .form-section h2 {
            color: var(--primary-pink);
            font-weight: 700;
            font-size: 24px;
            margin-bottom: 2px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .form-section p {
            font-size: 13px;
            color: #55acee;
            font-weight: 600;
            margin-bottom: 20px;
            text-transform: uppercase;
        }

        .form-group {
            margin-bottom: 12px;
            text-align: left;
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
            width: 100%;
        }

        .form-group label {
            display: block;
            font-size: 11px;
            color: #777;
            margin-bottom: 4px;
            margin-left: 15px;
            font-weight: 600;
        }

        .form-group input {
            width: 100%;
            padding: 10px 20px;
            border: 1.5px solid #eee;
            border-radius: 30px;
            outline: none;
            font-family: inherit;
            font-size: 13px;
            transition: all 0.3s;
            background: #fdfdfd;
        }

        .form-group input:focus {
            border-color: var(--primary-pink);
            background: #fff;
        }

        .submit-btn {
            width: 100%;
            max-width: 400px;
            margin: 5px auto 0;
            padding: 12px;
            background-color: var(--primary-pink);
            color: #fff;
            border: none;
            border-radius: 30px;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            text-transform: uppercase;
            transition: all 0.3s;
            letter-spacing: 1px;
            display: block;
        }

        .submit-btn:hover {
            background-color: #ad1457;
            transform: translateY(-1px);
        }

        /* Program Section */
        .program-section {
            padding: 30px 60px;
            background-color: #d6335a;
            color: #fff;
            flex: 1;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
            /* Allow scroll if content exceeds screen */
        }

        /* Custom scrollbar for program section */
        .program-section::-webkit-scrollbar {
            width: 5px;
        }

        .program-section::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
        }

        .program-section::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 10px;
        }

        .program-section h3 {
            text-align: center;
            font-size: 18px;
            margin-bottom: 2px;
            text-transform: uppercase;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .program-section .sub-title {
            text-align: center;
            font-size: 11px;
            margin-bottom: 20px;
            opacity: 0.95;
            letter-spacing: 0.5px;
        }

        .program-list {
            list-style: none;
            width: 100%;
            max-width: 480px;
            margin: 0 auto;
            position: relative;
            padding-left: 20px;
        }

        /* Vertical line for timeline */
        .program-list::before {
            content: "";
            position: absolute;
            left: 0;
            top: 5px;
            bottom: 5px;
            width: 1px;
            background: rgba(255, 255, 255, 0.3);
            border-left: 1px dashed rgba(255, 255, 255, 0.5);
        }

        .program-item {
            margin-bottom: 12px;
            position: relative;
            font-size: 12px;
            line-height: 1.4;
        }

        .program-item::before {
            content: "";
            position: absolute;
            left: -23px;
            top: 6px;
            width: 6px;
            height: 6px;
            background: white;
            border-radius: 50%;
        }

        .program-item.title-item {
            font-size: 13px;
            font-weight: 700;
            margin-top: 5px;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }

        .program-item.title-item::before {
            display: none;
        }

        .ribbon-icon {
            font-size: 16px;
            margin-right: 8px;
        }

        .time {
            font-weight: 700;
            margin-right: 8px;
            color: #ffd1d1;
        }

        .speaker-box {
            background: rgba(0, 0, 0, 0.1);
            padding: 8px 12px;
            border-radius: 10px;
            margin-top: 5px;
            font-size: 11px;
            border-left: 2px solid rgba(255, 255, 255, 0.3);
        }

        /* Mobile Responsiveness */
        @media (max-width: 768px) {

            body,
            html {
                height: auto;
                overflow-y: auto;
            }

            .main-wrapper {
                flex-direction: column;
                height: auto;
            }

            .left-panel {
                min-height: 40vh;
                padding: 40px 20px;
            }

            .right-panel {
                height: auto;
            }

            .form-section,
            .program-section {
                padding: 40px 20px;
            }
        }
    </style>
</head>

<body>
    <div class="main-wrapper">
        <div class="left-panel">
            <img src="{{ asset('image/MAMO_FORMDK-02.png') }}" alt="Mammo Care Anniversary">
        </div>

        <div class="right-panel">
            <div class="form-section">
                <h2>ĐĂNG KÝ THAM DỰ</h2>
                <p>Vui lòng điền thông tin để xác nhận chỗ ngồi</p>

                <form action="#" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Họ và tên</label>
                        <input type="text" name="name" placeholder="Nhập họ và tên..." required>
                    </div>

                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input type="tel" name="phone" placeholder="Nhập số điện thoại..." required>
                    </div>

                    <button type="submit" class="submit-btn">XÁC NHẬN THAM GIA</button>
                </form>
            </div>

            <div class="program-section">
                <h3>CHƯƠNG TRÌNH SỰ KIỆN</h3>
                <div class="sub-title">MAMMOCARE - 5 NĂM 1 HÀNH TRÌNH TIÊN PHONG</div>

                <ul class="program-list">
                    <li class="program-item">
                        <span class="time">10:50 - 11:15</span> Đón tiếp & Check-in khách mời
                    </li>

                    <li class="program-item title-item">
                        <span class="ribbon-icon">🎗️</span> PHẦN 1: HỘI NGHỊ CHUYÊN ĐỀ UNG THƯ TUYẾN VÚ
                    </li>

                    <li class="program-item">
                        <span class="time">11:15 - 11:20</span> Khai mạc chương trình
                    </li>

                    <li class="program-item">
                        <span class="time">11:20 - 11:35</span>
                        <strong>Báo cáo khoa học: Xu hướng mới trong tầm soát ung thư vú 2026</strong>
                        <div class="speaker-box">
                            <strong>Báo cáo viên: TS. BSNT Hoàng Anh Dũng</strong>
                            Phó trưởng khoa ngoại Vú bệnh viện K
                        </div>
                    </li>

                    <li class="program-item">
                        <span class="time">11:35 - 11:50</span>
                        <strong>Báo cáo khoa học: Giá trị Mammography 3D Tomosynthesis...</strong>
                        <div class="speaker-box">
                            <strong>Báo cáo viên: TS.BS Lê Duy Chung</strong>
                            Phó trưởng khoa Chẩn đoán hình ảnh - Đại học Y Hà Nội
                        </div>
                    </li>

                    <li class="program-item title-item">
                        <span class="ribbon-icon">🎗️</span> PHẦN 2: YEAR END PARTY 2025
                    </li>

                    <li class="program-item">
                        <span class="time">12:00 - 14:00</span>
                        <strong>• Tri ân & chia sẻ hành trình 5 năm...</strong><br>
                        • Khai tiệc tri ân, giao lưu và kết nối<br>
                        • Văn nghệ tự do
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>

</html>