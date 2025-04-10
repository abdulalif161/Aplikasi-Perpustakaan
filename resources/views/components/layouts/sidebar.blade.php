<nav class="col-md-2 bg-dark sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active text-white" href="{{ route('home') }}">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('member') }}">
                    <span data-feather="users"></span>
                    Daftar Anggota
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('buku') }}">
                    <span data-feather="book"></span>
                    Daftar Buku
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('pinjam') }}">
                    <span data-feather="file"></span>
                    Daftar Peminjam
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('kembali') }}">
                    <span data-feather="check-circle"></span>
                    Pengembalian Buku
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('kategori') }}">
                    <span data-feather="tag"></span>
                    Kategori Buku
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('user') }}">
                    <span data-feather="user"></span>
                    Akun
                </a>
            </li>
        </ul>
    </div>
</nav>
