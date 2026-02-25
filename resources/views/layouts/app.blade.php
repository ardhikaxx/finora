<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="FINORA - Financial & Operational Reporting Application">
    <title>@yield('title', 'FINORA')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #0ea5e9;
            --primary-hover: #0284c7;
            --primary-light: #bae6fd;
            --secondary-color: #64748b;
            --success-color: #10b981;
            --danger-color: #ef4444;
            --warning-color: #f59e0b;
            --info-color: #06b6d4;
            --dark-color: #1e293b;
            --light-color: #f8fafc;
            --sidebar-width: 260px;
            --header-height: 64px;
            --border-color: #e2e8f0;
        }

        * {
            font-family: 'Plus Jakarta Sans', sans-serif;
            box-sizing: border-box;
        }

        body {
            background-color: #f1f5f9;
            overflow-x: hidden;
        }

        /* Sidebar Styles */
        .sidebar {
            width: var(--sidebar-width);
            background: linear-gradient(180deg, #1e293b 0%, #0f172a 100%);
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            z-index: 1050;
            transition: transform 0.3s ease, width 0.3s ease;
            overflow-y: auto;
            overflow-x: hidden;
        }

        .sidebar::-webkit-scrollbar {
            width: 4px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: rgba(255,255,255,0.05);
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255,255,255,0.2);
            border-radius: 4px;
        }

        .sidebar-brand {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .sidebar-brand .brand-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #0ea5e9, #06b6d4);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 1.25rem;
        }

        .sidebar-brand h4 {
            font-weight: 700;
            letter-spacing: 0.5px;
            margin: 0;
            color: #fff;
            font-size: 1.25rem;
        }

        .sidebar-brand .brand-subtitle {
            font-size: 0.65rem;
            color: rgba(255,255,255,0.5);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .sidebar-menu {
            padding: 1rem 0;
        }

        .sidebar-menu-item {
            padding: 0.7rem 1.5rem;
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.875rem;
            transition: all 0.2s ease;
            border-left: 3px solid transparent;
            font-size: 0.875rem;
            font-weight: 500;
            position: relative;
        }

        .sidebar-menu-item:hover {
            background: rgba(255,255,255,0.08);
            color: #fff;
        }

        .sidebar-menu-item.active {
            background: linear-gradient(90deg, rgba(79, 70, 229, 0.3) 0%, rgba(79, 70, 229, 0.1) 100%);
            color: #fff;
            border-left-color: var(--primary-color);
        }

        .sidebar-menu-item.active::before {
            content: '';
            position: absolute;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 3px;
            height: 60%;
            background: var(--primary-color);
            border-radius: 3px 0 0 3px;
        }

        .sidebar-menu-item i {
            width: 20px;
            text-align: center;
            font-size: 1rem;
        }

        .sidebar-section-title {
            padding: 1.25rem 1.5rem 0.5rem;
            font-size: 0.65rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: rgba(255,255,255,0.35);
            font-weight: 600;
        }

        /* Main Content */
        .main-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            width: calc(100% - var(--sidebar-width));
            transition: margin-left 0.3s ease;
        }

        /* Header */
        .top-header {
            background: #fff;
            height: var(--header-height);
            padding: 0 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
            position: sticky;
            top: 0;
            z-index: 100;
            border-bottom: 1px solid var(--border-color);
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .menu-toggle {
            display: none;
            width: 40px;
            height: 40px;
            border: none;
            background: var(--light-color);
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .menu-toggle:hover {
            background: var(--border-color);
        }

        .breadcrumb-custom {
            margin: 0;
            font-size: 0.875rem;
        }

        .breadcrumb-custom .breadcrumb-item {
            color: var(--secondary-color);
        }

        .breadcrumb-custom .breadcrumb-item a {
            color: var(--primary-color);
            text-decoration: none;
        }

        .breadcrumb-custom .breadcrumb-item.active {
            color: var(--dark-color);
            font-weight: 500;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .notification-btn {
            width: 40px;
            height: 40px;
            border: none;
            background: var(--light-color);
            border-radius: 10px;
            cursor: pointer;
            position: relative;
            transition: all 0.2s ease;
            color: var(--secondary-color);
        }

        .notification-btn:hover {
            background: var(--border-color);
            color: var(--dark-color);
        }

        .notification-btn .badge {
            position: absolute;
            top: 6px;
            right: 6px;
            width: 8px;
            height: 8px;
            background: var(--danger-color);
            border-radius: 50%;
            border: 2px solid #fff;
        }

        .user-dropdown {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.4rem 0.75rem;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.2s ease;
            border: 1px solid transparent;
        }

        .user-dropdown:hover {
            background: var(--light-color);
            border-color: var(--border-color);
        }

        .user-avatar {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 600;
            font-size: 0.8rem;
            box-shadow: 0 2px 4px rgba(79, 70, 229, 0.3);
        }

        .user-info {
            line-height: 1.3;
        }

        .user-name {
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--dark-color);
        }

        .user-role {
            font-size: 0.7rem;
            color: var(--secondary-color);
        }

        /* Page Content */
        .page-content {
            padding: 1.5rem;
        }

        .page-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 1.5rem;
        }

        /* Cards */
        .card-custom {
            border: none;
            border-radius: 16px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.04), 0 1px 2px rgba(0,0,0,0.06);
            transition: all 0.3s ease;
            background: #fff;
            overflow: hidden;
        }

        .card-custom:hover {
            box-shadow: 0 4px 12px rgba(0,0,0,0.08), 0 2px 4px rgba(0,0,0,0.04);
            transform: translateY(-2px);
        }

        .card-custom .card-header {
            background: #fff;
            border-bottom: 1px solid var(--border-color);
            padding: 1.25rem 1.5rem;
            font-weight: 600;
            color: var(--dark-color);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card-custom .card-body {
            padding: 1.5rem;
        }

        /* Stat Cards */
        .stat-card {
            border-radius: 16px;
            padding: 1.5rem;
            color: #fff;
            position: relative;
            overflow: hidden;
            height: 100%;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: -20px;
            right: -20px;
            width: 120px;
            height: 120px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
        }

        .stat-card::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: rgba(0,0,0,0.1);
        }

        .stat-card .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            margin-bottom: 1rem;
            background: rgba(255,255,255,0.2);
        }

        .stat-card .stat-value {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 0.25rem;
            line-height: 1.2;
        }

        .stat-card .stat-label {
            font-size: 0.8rem;
            opacity: 0.85;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .stat-card-primary { background: linear-gradient(135deg, #0ea5e9, #0891b2); }
        .stat-card-success { background: linear-gradient(135deg, #10b981, #059669); }
        .stat-card-info { background: linear-gradient(135deg, #06b6d4, #0891b2); }
        .stat-card-warning { background: linear-gradient(135deg, #f59e0b, #d97706); }
        .stat-card-danger { background: linear-gradient(135deg, #ef4444, #dc2626); }

        /* Buttons */
        .btn-primary-custom {
            background: var(--primary-color);
            border: none;
            padding: 0.6rem 1.25rem;
            font-weight: 600;
            font-size: 0.875rem;
            border-radius: 10px;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: #fff;
            text-decoration: none;
        }

        .btn-primary-custom:hover {
            background: var(--primary-hover);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.35);
            color: #fff;
        }

        .btn-icon {
            width: 36px;
            height: 36px;
            padding: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            transition: all 0.2s ease;
            border: none;
        }

        .btn-icon:hover {
            transform: scale(1.05);
        }

        .btn-icon.btn-info { background: #e0f2fe; color: #0284c7; }
        .btn-icon.btn-info:hover { background: #bae6fd; }
        .btn-icon.btn-warning { background: #fef3c7; color: #d97706; }
        .btn-icon.btn-warning:hover { background: #fde68a; }
        .btn-icon.btn-danger { background: #fee2e2; color: #dc2626; }
        .btn-icon.btn-danger:hover { background: #fecaca; }
        .btn-icon.btn-success { background: #d1fae5; color: #059669; }
        .btn-icon.btn-success:hover { background: #a7f3d0; }

        /* Tables */
        .table-custom {
            border-collapse: separate;
            border-spacing: 0;
            width: 100%;
        }

        .table-custom thead th {
            background: #f8fafc;
            color: var(--secondary-color);
            font-weight: 600;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 1rem 1.25rem;
            border-bottom: 1px solid var(--border-color);
            white-space: nowrap;
        }

        .table-custom tbody td {
            padding: 1rem 1.25rem;
            vertical-align: middle;
            border-bottom: 1px solid #f1f5f9;
            font-size: 0.875rem;
            color: var(--dark-color);
        }

        .table-custom tbody tr {
            transition: background 0.2s ease;
        }

        .table-custom tbody tr:hover {
            background: #f8fafc;
        }

        .table-custom tbody tr:last-child td {
            border-bottom: none;
        }

        /* Badges */
        .badge-custom {
            padding: 0.4rem 0.75rem;
            font-size: 0.75rem;
            font-weight: 600;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
        }

        .badge-active { background: #d1fae5; color: #065f46; }
        .badge-inactive { background: #fee2e2; color: #991b1b; }
        .badge-pending { background: #fef3c7; color: #92400e; }
        .badge-processed { background: #dbeafe; color: #1e40af; }
        .badge-paid { background: #d1fae5; color: #065f46; }
        .badge-overdue { background: #fee2e2; color: #991b1b; }

        /* Avatar */
        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 0.8rem;
            flex-shrink: 0;
        }

        .avatar-primary { background: #e0f2fe; color: #0ea5e9; }
        .avatar-success { background: #d1fae5; color: #059669; }
        .avatar-warning { background: #fef3c7; color: #d97706; }
        .avatar-danger { background: #fee2e2; color: #dc2626; }
        .avatar-info { background: #cffafe; color: #0891b2; }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 3rem;
            color: var(--secondary-color);
        }

        .empty-state i {
            font-size: 3rem;
            margin-bottom: 1rem;
            opacity: 0.4;
            color: var(--border-color);
        }

        /* Form Controls */
        .form-control-custom {
            border: 1px solid var(--border-color);
            border-radius: 10px;
            padding: 0.625rem 1rem;
            font-size: 0.875rem;
            transition: all 0.2s ease;
            background: #fff;
        }

        .form-control-custom:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
            outline: none;
        }

        .form-label-custom {
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--dark-color);
            margin-bottom: 0.5rem;
        }

        /* Dropdown */
        .dropdown-menu-custom {
            border: none;
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.12);
            padding: 0.5rem;
            min-width: 180px;
        }

        .dropdown-menu-custom .dropdown-item {
            border-radius: 8px;
            padding: 0.6rem 1rem;
            font-size: 0.875rem;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .dropdown-menu-custom .dropdown-item:hover {
            background: #f1f5f9;
        }

        .dropdown-menu-custom .dropdown-item.text-danger {
            color: var(--danger-color);
        }

        .dropdown-menu-custom .dropdown-item.text-danger:hover {
            background: #fef2f2;
        }

        /* Overlay for mobile */
        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.5);
            z-index: 1040;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .sidebar-overlay.show {
            display: block;
            opacity: 1;
        }

        /* Responsive Styles */
        @media (max-width: 1199px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .menu-toggle {
                display: flex;
                align-items: center;
                justify-content: center;
            }
        }

        @media (max-width: 767px) {
            .page-content {
                padding: 1rem;
            }

            .page-title {
                font-size: 1.25rem;
            }

            .stat-card {
                padding: 1.25rem;
            }

            .stat-card .stat-value {
                font-size: 1.5rem;
            }

            .card-custom .card-header {
                padding: 1rem;
                flex-direction: column;
                align-items: flex-start;
                gap: 0.75rem;
            }

            .card-custom .card-body {
                padding: 1rem;
            }

            .table-custom thead th,
            .table-custom tbody td {
                padding: 0.75rem;
            }

            .user-info {
                display: none;
            }

            .header-right {
                gap: 0.5rem;
            }
        }

        @media (max-width: 575px) {
            .top-header {
                padding: 0 1rem;
            }

            .page-content {
                padding: 0.75rem;
            }

            .btn-primary-custom {
                padding: 0.5rem 1rem;
                font-size: 0.8rem;
            }

            .btn-primary-custom i {
                display: none;
            }
        }

        /* Animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-fade-in {
            animation: fadeIn 0.3s ease forwards;
        }

        .animate-delay-1 { animation-delay: 0.05s; }
        .animate-delay-2 { animation-delay: 0.1s; }
        .animate-delay-3 { animation-delay: 0.15s; }
        .animate-delay-4 { animation-delay: 0.2s; }
    </style>
    @stack('styles')
</head>
<body>
    @auth
    <!-- Sidebar Overlay -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <div class="d-flex">
        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-brand">
                <div class="brand-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div>
                    <h4>FINORA</h4>
                    <div class="brand-subtitle">Finance & HR</div>
                </div>
            </div>
            
            <nav class="sidebar-menu">
                <a href="{{ route('dashboard') }}" class="sidebar-menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="fas fa-home"></i> Dashboard
                </a>

                <div class="sidebar-section-title">Pengaturan</div>
                <a href="{{ route('users.index') }}" class="sidebar-menu-item {{ request()->routeIs('users.*') ? 'active' : '' }}">
                    <i class="fas fa-users"></i> Pengguna
                </a>
                <a href="{{ route('roles.index') }}" class="sidebar-menu-item {{ request()->routeIs('roles.*') ? 'active' : '' }}">
                    <i class="fas fa-user-shield"></i> Peran
                </a>
                <a href="{{ route('permissions.index') }}" class="sidebar-menu-item {{ request()->routeIs('permissions.*') ? 'active' : '' }}">
                    <i class="fas fa-key"></i> Izin
                </a>
                <a href="{{ route('departments.index') }}" class="sidebar-menu-item {{ request()->routeIs('departments.*') ? 'active' : '' }}">
                    <i class="fas fa-building"></i> Departemen
                </a>

                <div class="sidebar-section-title">Payroll</div>
                <a href="{{ route('employees.index') }}" class="sidebar-menu-item {{ request()->routeIs('employees.*') ? 'active' : '' }}">
                    <i class="fas fa-user-tie"></i> Karyawan
                </a>
                <a href="{{ route('salary-structures.index') }}" class="sidebar-menu-item {{ request()->routeIs('salary-structures.*') ? 'active' : '' }}">
                    <i class="fas fa-money-bill-wave"></i> Struktur Gaji
                </a>
                <a href="{{ route('attendances.index') }}" class="sidebar-menu-item {{ request()->routeIs('attendances.*') ? 'active' : '' }}">
                    <i class="fas fa-clock"></i> Absensi
                </a>
                <a href="{{ route('leaves.index') }}" class="sidebar-menu-item {{ request()->routeIs('leaves.*') ? 'active' : '' }}">
                    <i class="fas fa-calendar-minus"></i> Pengajuan Cuti
                </a>
                <a href="{{ route('leave-types.index') }}" class="sidebar-menu-item {{ request()->routeIs('leave-types.*') ? 'active' : '' }}">
                    <i class="fas fa-calendar-alt"></i> Jenis Cuti
                </a>
                <a href="{{ route('payrolls.index') }}" class="sidebar-menu-item {{ request()->routeIs('payrolls.*') ? 'active' : '' }}">
                    <i class="fas fa-file-invoice-dollar"></i> Payroll
                </a>

                <div class="sidebar-section-title">Keuangan</div>
                <a href="{{ route('accounts.index') }}" class="sidebar-menu-item {{ request()->routeIs('accounts.*') ? 'active' : '' }}">
                    <i class="fas fa-book"></i> Bagan Akun
                </a>
                <a href="{{ route('journal-entries.index') }}" class="sidebar-menu-item {{ request()->routeIs('journal-entries.*') ? 'active' : '' }}">
                    <i class="fas fa-journal-whills"></i> Jurnal
                </a>
                <a href="{{ route('invoices.index') }}" class="sidebar-menu-item {{ request()->routeIs('invoices.*') ? 'active' : '' }}">
                    <i class="fas fa-file-invoice"></i> Faktur (AR)
                </a>
                <a href="{{ route('bills.index') }}" class="sidebar-menu-item {{ request()->routeIs('bills.*') ? 'active' : '' }}">
                    <i class="fas fa-file-contract"></i> Tagihan (AP)
                </a>
                <a href="{{ route('customers.index') }}" class="sidebar-menu-item {{ request()->routeIs('customers.*') ? 'active' : '' }}">
                    <i class="fas fa-user-friends"></i> Pelanggan
                </a>
                <a href="{{ route('vendors.index') }}" class="sidebar-menu-item {{ request()->routeIs('vendors.*') ? 'active' : '' }}">
                    <i class="fas fa-truck"></i> Vendor
                </a>
                <a href="{{ route('budgets.index') }}" class="sidebar-menu-item {{ request()->routeIs('budgets.*') ? 'active' : '' }}">
                    <i class="fas fa-chart-pie"></i> Anggaran
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Header -->
            <header class="top-header">
                <div class="header-left">
                    <button class="menu-toggle" id="menuToggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <nav class="breadcrumb-custom" aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fas fa-home me-1"></i>Home</a></li>
                            <li class="breadcrumb-item active">@yield('page-title', 'Dashboard')</li>
                        </ol>
                    </nav>
                </div>

                <div class="header-right">
                    <button class="notification-btn">
                        <i class="fas fa-bell"></i>
                        <span class="badge"></span>
                    </button>

                    <div class="user-dropdown" data-bs-toggle="dropdown">
                        <div class="user-avatar">
                            {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                        </div>
                        <div class="user-info">
                            <div class="user-name">{{ Auth::user()->name }}</div>
                            <div class="user-role">{{ Auth::user()->role?->name ?? 'User' }}</div>
                        </div>
                        <i class="fas fa-chevron-down text-muted" style="font-size: 0.7rem;"></i>
                    </div>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-custom">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-user"></i> Profil</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-cog"></i> Pengaturan</a></li>
                        <li><hr class="dropdown-divider my-2"></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </header>

            <!-- Page Content -->
            <main class="page-content">
                @yield('content')
            </main>
        </div>
    </div>
    @else
    @yield('content')
    @endauth

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('scripts')
    <script>
        // Mobile sidebar toggle
        const menuToggle = document.getElementById('menuToggle');
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');

        if (menuToggle && sidebar) {
            menuToggle.addEventListener('click', () => {
                sidebar.classList.toggle('show');
                sidebarOverlay.classList.toggle('show');
            });

            if (sidebarOverlay) {
                sidebarOverlay.addEventListener('click', () => {
                    sidebar.classList.remove('show');
                    sidebarOverlay.classList.remove('show');
                });
            }

            // Close sidebar on route change (mobile)
            if (window.innerWidth < 1200) {
                document.querySelectorAll('.sidebar-menu-item').forEach(item => {
                    item.addEventListener('click', () => {
                        sidebar.classList.remove('show');
                        sidebarOverlay.classList.remove('show');
                    });
                });
            }
        }

        // SweetAlert notifications
        @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session('success') }}',
            timer: 2500,
            showConfirmButton: false,
            toast: true,
            position: 'top-end',
            background: '#fff',
            iconColor: '#10b981'
        });
        @endif

        @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: '{{ session('error') }}',
            background: '#fff',
            iconColor: '#ef4444'
        });
        @endif

        @if($errors->any())
        Swal.fire({
            icon: 'error',
            title: 'Validasi Gagal!',
            html: '<ul class="text-start" style="max-height: 200px; overflow-y: auto;">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>',
            background: '#fff',
            iconColor: '#ef4444'
        });
        @endif
    </script>
</body>
</html>
