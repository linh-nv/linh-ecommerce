    <!-- ..........................app-container................................. -->
    <section class="app-container">
        <p>Contact</p>
        <div class="app-contact">
            <a href="https://www.facebook.com/profile.php?id=100010431287202" class="ti-facebook">
                <p>Nguyễn Văn Linh</p> 
            </a>
            <a href="https://www.facebook.com/profile.php?id=100037167123537" class="ti-facebook">
                <p>Nguyễn Thanh Thủy</p> 
            </a>
            <a href="https://www.facebook.com/pham.thuy.03.02.10" class="ti-facebook">
                <p>Phạm Thị Hồng Thúy</p> 
            </a>
            <a href="https://www.facebook.com/nguyenvanquoc.249" class="ti-facebook">
                <p>Nguyễn Văn Quốc</p> 
            </a>
            <a href="https://www.facebook.com/heo.thao.125760" class="ti-facebook">
                <p>Nguyễn Thanh Thảo</p> 
            </a>
            <a href="" class="ti-email"> 
                <p>nvlinh.rin@gmail.com</p>
            </a>
        </div>    
        <!-- <div class="app-getNotifications">
            <p>Nhận thông báo sớm nhất từ chúng tôi</p>
            <input type="text" placeholder="Nhập email của bạn...">
            <i class="ti-check"></i>
        </div>     -->
    </section>

    <!-- ..........................footer................................. -->
    <section class="footer">
        <div class="footer-top">
            <li><a href="">Liên hệ</a></li>
            <li><a href="">Tuyển dụng</a></li>
            <li><a href="">Giới thiệu</a></li>
            <li>
                <a href="" class="ti-facebook"></a>
                <a href="" class="ti-instagram"></a>
                <a href="" class="ti-youtube"></a>
            </li>
        </div>
        <div class="footer-center">
            <p>Siêu thị Nhóm 6<br>
                <span>Địa chỉ:</span> Triều Khúc - Thanh Xuân - Hà Nội <br>
                <span>Hotline:</span>0866678297 <br>
            </p>
        </div>
        <div class="footer-bottom">
            <p>Chúc quý khách mua sắm vui vẻ!!</p>
        </div>
    </section>
</body>

<script>
    const dots = document.querySelectorAll('.dot');
    const images = document.querySelectorAll('.aspect-ratio-169 img');

    dots.forEach((dot, index) => {
    dot.addEventListener('click', () => {
        // Xóa lớp 'active' khỏi tất cả các dot và ảnh
        dots.forEach((dot) => dot.classList.remove('active'));
        images.forEach((image) => image.classList.remove('active'));
    
        // Thêm lớp 'active' cho dot và ảnh tương ứng
        dot.classList.add('active');
        images[index].classList.add('active');
        });
    });
</script>
<script src="<?php echo base_url('fontend/js/script.js') ?>"></script>
</html>