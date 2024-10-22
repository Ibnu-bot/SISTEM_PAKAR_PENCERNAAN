<div class="sidebar-background">
    <div class="sidebar-wrapper scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{ asset('assets/img/profile.jpg') }}" alt="..." class="avatar-img rounded-circle" />
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            {{ auth()->user()->name }}
                            <span class="user-level">{{ auth()->user()->role }}</span>
                            <span class="caret"></span>
                        </span>
                    </a>
                </div>
            </div>
            <ul class="nav">
                <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h3 class="text-section">Menu Data</h3>
                </li>
                <li class="nav-item {{ request()->routeIs('users.index') ? 'active' : '' }}">
                    <a href="{{ route('users.index') }}">
                        <i class="fas fa-users"></i>
                        <p>Data User</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('penyakit.index') ? 'active' : '' }}">
                    <a href="{{ route('penyakit.index') }}">
                        <i class="fas fa-flushed"></i>
                        <p>Data Penyakit</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('gejala.index') ? 'active' : '' }}">
                    <a href="{{ route('gejala.index') }}">
                        <i class="fas fa-allergies"></i>
                        <p>Data Gejala</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('rule.index') ? 'active' : '' }}">
                    <a href="{{ route('rule.index') }}">
                        <i class="fas fa-angle-double-up"></i>
                        <p>Data Rule</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('form.pasien') ? 'active' : '' }}">
                    <a href="{{ route('form.pasien') }}">
                        <i class="fas fa-medkit"></i>
                        <p>Diagnosis</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h3 class="text-section">Analytical Hierarchy Process</h3>
                </li>
                <li class="nav-item {{ request()->routeIs('randomindex.index') ? 'active' : '' }}">
                    <a href="{{ route('randomindex.index') }}">
                        <i class="fas fa-question-circle"></i>
                        <p>Random Index</p>
                    </a>
                </li>
                <li
                    class="nav-item {{ request()->routeIs('analisispenyakit.index') || request()->routeIs('select-penyakit') || request()->routeIs('hasil.analisis') ? 'active' : '' }}">
                    <a data-toggle="collapse" href="#analisis" aria-expanded="false" aria-controls="analisis">
                        <i class="fas fa-briefcase-medical"></i>
                        <p>Hierarki Analisis</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="analisis">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('analisispenyakit.index') }}">
                                    <span class="sub-item">Analisis Penyakit</span>
                                </a>
                            </li>
                            <li>
                                <a href="/admin/select-penyakit">
                                    <span class="sub-item">Analisis Gejala</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('hasil.analisis') }}">
                                    <span class="sub-item">Hasil Analisis</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h3 class="text-section">Riwayat</h3>
                </li>
                <li class="nav-item {{ request()->routeIs('data.diagnosis') ? 'active' : '' }}">
                    <a href="{{ route('data.diagnosis') }}">
                        <i class="fas fa-save"></i>
                        <p>Hasil Diagnosis</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
