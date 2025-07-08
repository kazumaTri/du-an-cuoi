<header class="jumbotron text-center p-5 rounded-3">
    <video autoplay muted loop class="w-100 rounded-3">
        <source src="assets/video/183107-870151708.mp4" type="video/mp4" />
        Trình duyệt của bạn không hỗ trợ thẻ video.
    </video>
    <div class="container">
        <h1 class="display-4 text-white">Học Lập Trình</h1>
        <p class="lead text-light">Với một website cho người mới bắt đầu</p>
        <div class="input-group search-bar mx-auto">
            <input type="text" id="searchInput" class="form-control" placeholder="Tìm kiếm bài học..." onkeyup="searchLessons()" />
            <button class="btn btn-warning" type="button">Tìm Kiếm</button>
        </div>
        <div id="searchResults" class="mt-4"></div>
        <p class="mt-4 text-light">Không Biết Bắt Đầu Từ Đâu?</p>
    </div>
</header>

<div class="container mt-4 text-center">
    <div class="row">
        <div class="col-md-6 mb-3">
            <a href="#html-section" class="btn btn-dark w-100">HTML</a>
        </div>
        <div class="col-md-6 mb-3">
            <a href="#css-section" class="btn btn-dark w-100">CSS</a>
        </div>
    </div>
</div>

<section class="container mt-5" id="html-section">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h1 class="card-title">HTML</h1>
                    <p class="card-text">Ngôn ngữ để xây dựng trang web</p>
                    <div class="mt-4">
                        <a href="index.php?page=html" class="btn btn-primary mb-2">Học HTML</a>
                        <button class="btn btn-secondary mb-2">Video hướng dẫn</button>
                    </div>
                    <hr />
                    <div class="mt-3">
                        <h5>Ví dụ HTML</h5>
                        <pre class="code-example"><code>&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;head&gt;
  &lt;title&gt;HTML Tutorial&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;
  &lt;h1&gt;This is a heading&lt;/h1&gt;
  &lt;p&gt;This is a paragraph.&lt;/p&gt;
&lt;/body&gt;
&lt;/html&gt;</code></pre>
                    </div>
                    <p class="mt-3">Hãy tự mình thử nhé</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="container mt-5" id="css-section">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h1 class="card-title">CSS</h1>
                    <p class="card-text">Ngôn ngữ để tạo kiểu cho các trang web</p>
                    <div class="mt-4">
                        <a href="index.php?page=css" class="btn btn-success mb-2">Học CSS</a>
                    </div>
                    <hr />
                    <h5>Ví dụ CSS</h5>
                    <p>Xem ví dụ trực tiếp ở trên</p>
                    <pre class="code-example">
body {
  background-color: lightblue;
  color: white;
  text-align: center;
  font-family: verdana;
}</pre>
                    <p class="mt-3">Hãy tự mình thử nhé</p>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
const danhSachBaiHoc = [
    { ten: "HTML", link: "index.php?page=html" },
    { ten: "CSS", link: "index.php?page=css" },
];

function searchLessons() {
    const input = document.getElementById("searchInput").value.toLowerCase();
    const resultsContainer = document.getElementById("searchResults");

    if (!input) {
        resultsContainer.innerHTML = "";
        return;
    }

    const results = danhSachBaiHoc.filter(baiHoc =>
        baiHoc.ten.toLowerCase().includes(input)
    );

    resultsContainer.innerHTML = "";

    if (results.length > 0) {
        results.forEach(baiHoc => {
            const link = document.createElement("a");
            link.href = baiHoc.link;
            link.className = "d-block text-decoration-none text-dark";
            link.textContent = baiHoc.ten;
            resultsContainer.appendChild(link);
        });
    } else {
        resultsContainer.innerHTML = "<p>Không tìm thấy bài học nào.</p>";
    }
}
</script> 