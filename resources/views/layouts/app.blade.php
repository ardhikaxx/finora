<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="FINORA - Financial & Operational Reporting Application">
    <title>@yield('title', 'FINORA')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
            --sidebar-width: 270px;
            --header-height: 70px;
            --border-color: #e2e8f0;
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
        }

        * {
            font-family: 'Plus Jakarta Sans', sans-serif;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            background-color: #f0f4f8;
            overflow-x: hidden;
            background-image: 
                radial-gradient(at 0% 0%, rgba(14, 165, 233, 0.08) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(16, 185, 129, 0.08) 0px, transparent 50%);
            background-attachment: fixed;
        }

        ::selection {
            background: var(--primary-color);
            color: white;
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
            box-shadow: 4px 0 20px rgba(0,0,0,0.15);
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
            padding: 1.5rem 1.5rem 1.25rem;
            border-bottom: 1px solid rgba(255,255,255,0.08);
            display: flex;
            align-items: center;
            gap: 0.875rem;
            background: rgba(0,0,0,0.1);
        }

        .sidebar-brand .brand-icon {
            width: 44px;
            height: 44px;
            background: linear-gradient(135deg, #0ea5e9, #06b6d4);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 1.25rem;
            box-shadow: 0 4px 12px rgba(14, 165, 233, 0.4);
        }

        .sidebar-brand h4 {
            font-weight: 800;
            letter-spacing: 0.5px;
            margin: 0;
            color: #fff;
            font-size: 1.35rem;
            background: linear-gradient(135deg, #fff 0%, #cbd5e1 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .sidebar-brand .brand-subtitle {
            font-size: 0.6rem;
            color: rgba(255,255,255,0.4);
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: 600;
        }

        .sidebar-menu {
            padding: 1rem 0.75rem;
        }

        .sidebar-menu-item {
            padding: 0.75rem 1rem;
            color: rgba(255,255,255,0.65);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            transition: all 0.25s ease;
            font-size: 0.875rem;
            font-weight: 500;
            cursor: pointer;
            border-radius: 10px;
            margin-bottom: 4px;
            position: relative;
            overflow: hidden;
        }

        .sidebar-menu-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 0;
            height: 0;
            background: var(--primary-color);
            border-radius: 0 4px 4px 0;
            transition: width 0.25s ease;
            opacity: 0;
        }

        .sidebar-menu-item:hover {
            background: rgba(255,255,255,0.08);
            color: #fff;
            transform: translateX(4px);
        }

        .sidebar-menu-item.active {
            background: rgba(14, 165, 233, 0.15);
            color: #fff;
        }

        .sidebar-menu-item.active::before {
            width: 4px;
            height: 60%;
            opacity: 1;
        }

        .sidebar-menu-item i {
            width: 20px;
            text-align: center;
            font-size: 1rem;
            flex-shrink: 0;
        }

        .sidebar-menu-item .menu-arrow {
            margin-left: auto;
            font-size: 0.65rem;
            transition: transform 0.25s ease;
            opacity: 0.5;
        }

        .sidebar-menu-item[aria-expanded="true"] .menu-arrow,
        .sidebar-menu-item[data-bs-toggle="collapse"].collapsed .menu-arrow {
            transform: rotate(90deg);
            opacity: 1;
        }

        .sidebar-dropdown .sidebar-menu-item {
            padding-left: 1rem;
            font-size: 0.85rem;
        }

        .sidebar-dropdown .sidebar-menu-item:hover {
            background: rgba(255,255,255,0.05);
        }

        .sidebar-dropdown .sidebar-menu-item.active {
            background: rgba(14, 165, 233, 0.12);
        }

        .sidebar-section-title {
            padding: 1.25rem 1rem 0.5rem;
            font-size: 0.6rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: rgba(255,255,255,0.3);
            font-weight: 700;
            margin-top: 0.5rem;
        }

        .sidebar-section-title:first-child {
            margin-top: 0;
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
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(10px);
            height: var(--header-height);
            padding: 0 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: var(--shadow-sm);
            position: sticky;
            top: 0;
            z-index: 100;
            border-bottom: 1px solid rgba(226, 232, 240, 0.8);
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 1.25rem;
        }

        .menu-toggle {
            display: none;
            width: 42px;
            height: 42px;
            border: none;
            background: linear-gradient(135deg, #f1f5f9, #e2e8f0);
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.2s ease;
            color: var(--dark-color);
            font-size: 1.1rem;
        }

        .menu-toggle:hover {
            background: var(--primary-color);
            color: #fff;
            transform: scale(1.05);
        }

        .page-heading {
            display: flex;
            flex-direction: column;
        }

        .page-heading .page-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--dark-color);
            margin: 0;
            line-height: 1.2;
        }

        .page-heading .breadcrumb-custom {
            font-size: 0.8rem;
            margin-top: 2px;
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
            font-weight: 500;
        }

        .breadcrumb-custom .breadcrumb-item.active {
            color: var(--dark-color);
            font-weight: 500;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .header-btn {
            width: 42px;
            height: 42px;
            border: none;
            background: linear-gradient(135deg, #f8fafc, #f1f5f9);
            border-radius: 12px;
            cursor: pointer;
            position: relative;
            transition: all 0.2s ease;
            color: var(--secondary-color);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .header-btn:hover {
            background: var(--primary-color);
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(14, 165, 233, 0.3);
        }

        .header-btn .badge {
            position: absolute;
            top: 8px;
            right: 8px;
            width: 8px;
            height: 8px;
            background: var(--danger-color);
            border-radius: 50%;
            border: 2px solid #fff;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.2); opacity: 0.8; }
        }

        .user-dropdown {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.5rem 0.75rem;
            border-radius: 14px;
            cursor: pointer;
            transition: all 0.2s ease;
            border: 1px solid transparent;
            background: linear-gradient(135deg, #f8fafc, #f1f5f9);
        }

        .user-dropdown:hover {
            background: #fff;
            border-color: var(--primary-color);
            box-shadow: var(--shadow-md);
            transform: translateY(-1px);
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--primary-color), #38bdf8);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: 700;
            font-size: 0.85rem;
            box-shadow: 0 2px 8px rgba(14, 165, 233, 0.4);
        }

        .user-info {
            line-height: 1.3;
        }

        .user-name {
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--dark-color);
        }

        .user-role {
            font-size: 0.7rem;
            color: var(--secondary-color);
            font-weight: 500;
        }

        /* Page Content */
        .page-content {
            padding: 1.75rem;
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
            border-radius: 20px;
            box-shadow: var(--shadow-sm);
            transition: all 0.3s ease;
            background: #fff;
            overflow: hidden;
            position: relative;
        }

        .card-custom::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--primary-color), #38bdf8);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .card-custom:hover {
            box-shadow: var(--shadow-lg);
            transform: translateY(-4px);
        }

        .card-custom:hover::before {
            opacity: 1;
        }

        .card-custom .card-header {
            background: transparent;
            border-bottom: 1px solid rgba(226, 232, 240, 0.6);
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
            border-radius: 20px;
            padding: 1.5rem;
            color: #fff;
            position: relative;
            overflow: hidden;
            height: 100%;
            min-height: 140px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: -30px;
            right: -30px;
            width: 140px;
            height: 140px;
            background: rgba(255,255,255,0.08);
            border-radius: 50%;
            transition: transform 0.3s ease;
        }

        .stat-card:hover::before {
            transform: scale(1.1);
        }

        .stat-card::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: rgba(0,0,0,0.15);
        }

        .stat-card .stat-icon {
            width: 52px;
            height: 52px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.35rem;
            margin-bottom: 0.75rem;
            background: rgba(255,255,255,0.2);
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        .stat-card .stat-value {
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 0.25rem;
            line-height: 1;
        }

        .stat-card .stat-label {
            font-size: 0.75rem;
            opacity: 0.85;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
        }

        .stat-card .stat-trend {
            font-size: 0.75rem;
            opacity: 0.8;
            margin-top: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .stat-card-primary { background: linear-gradient(135deg, #0ea5e9, #0284c7); }
        .stat-card-success { background: linear-gradient(135deg, #10b981, #059669); }
        .stat-card-info { background: linear-gradient(135deg, #06b6d4, #0891b2); }
        .stat-card-warning { background: linear-gradient(135deg, #f59e0b, #d97706); }
        .stat-card-danger { background: linear-gradient(135deg, #ef4444, #dc2626); }
        .stat-card-dark { background: linear-gradient(135deg, #1e293b, #334155); }

        /* Buttons */
        .btn-primary-custom {
            background: linear-gradient(135deg, var(--primary-color), #38bdf8);
            border: none;
            padding: 0.65rem 1.25rem;
            font-weight: 600;
            font-size: 0.875rem;
            border-radius: 12px;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: #fff;
            text-decoration: none;
            box-shadow: 0 2px 8px rgba(14, 165, 233, 0.3);
        }

        .btn-primary-custom:hover {
            background: linear-gradient(135deg, #0284c7, #0ea5e9);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(14, 165, 233, 0.4);
            color: #fff;
        }

        .btn-secondary-custom {
            background: linear-gradient(135deg, #f1f5f9, #e2e8f0);
            border: none;
            padding: 0.65rem 1.25rem;
            font-weight: 600;
            font-size: 0.875rem;
            border-radius: 12px;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--dark-color);
            text-decoration: none;
        }

        .btn-secondary-custom:hover {
            background: linear-gradient(135deg, #e2e8f0, #cbd5e1);
            transform: translateY(-2px);
            color: var(--dark-color);
        }

        .btn-icon {
            width: 38px;
            height: 38px;
            padding: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            transition: all 0.2s ease;
            border: none;
            font-size: 0.9rem;
        }

        .btn-icon:hover {
            transform: scale(1.1) translateY(-2px);
        }

        .btn-icon.btn-info { background: #e0f2fe; color: #0284c7; }
        .btn-icon.btn-info:hover { background: #bae6fd; color: #0369a1; }
        .btn-icon.btn-warning { background: #fef3c7; color: #d97706; }
        .btn-icon.btn-warning:hover { background: #fde68a; color: #b45309; }
        .btn-icon.btn-danger { background: #fee2e2; color: #dc2626; }
        .btn-icon.btn-danger:hover { background: #fecaca; color: #b91c1c; }
        .btn-icon.btn-success { background: #d1fae5; color: #059669; }
        .btn-icon.btn-success:hover { background: #a7f3d0; color: #047857; }

        /* Tables */
        .table-custom {
            border-collapse: separate;
            border-spacing: 0;
            width: 100%;
        }

        .table-custom thead th {
            background: linear-gradient(135deg, #f8fafc, #f1f5f9);
            color: var(--secondary-color);
            font-weight: 700;
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 1rem 1.25rem;
            border-bottom: 2px solid var(--border-color);
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
            transition: all 0.2s ease;
            position: relative;
        }

        .table-custom tbody tr:hover {
            background: linear-gradient(135deg, rgba(14, 165, 233, 0.04), rgba(56, 189, 248, 0.02));
        }

        .table-custom tbody tr:hover td:first-child {
            border-left: 3px solid var(--primary-color);
            padding-left: calc(1.25rem - 3px);
        }

        .table-custom tbody tr:last-child td {
            border-bottom: none;
        }

        /* Badges */
        .badge-custom {
            padding: 0.45rem 0.85rem;
            font-size: 0.7rem;
            font-weight: 700;
            border-radius: 20px;
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }

        .badge-active { background: linear-gradient(135deg, #d1fae5, #a7f3d0); color: #065f46; }
        .badge-inactive { background: linear-gradient(135deg, #fee2e2, #fecaca); color: #991b1b; }
        .badge-pending { background: linear-gradient(135deg, #fef3c7, #fde68a); color: #92400e; }
        .badge-processed { background: linear-gradient(135deg, #dbeafe, #bfdbfe); color: #1e40af; }
        .badge-paid { background: linear-gradient(135deg, #d1fae5, #a7f3d0); color: #065f46; }
        .badge-overdue { background: linear-gradient(135deg, #fee2e2, #fecaca); color: #991b1b; }

        /* Avatar */
        .avatar {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.8rem;
            flex-shrink: 0;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }

        .avatar-primary { background: linear-gradient(135deg, #e0f2fe, #bae6fd); color: #0369a1; }
        .avatar-success { background: linear-gradient(135deg, #d1fae5, #a7f3d0); color: #047857; }
        .avatar-warning { background: linear-gradient(135deg, #fef3c7, #fde68a); color: #b45309; }
        .avatar-danger { background: linear-gradient(135deg, #fee2e2, #fecaca); color: #b91c1c; }
        .avatar-info { background: linear-gradient(135deg, #cffafe, #a5f3fc); color: #155e75; }
        .avatar-dark { background: linear-gradient(135deg, #1e293b, #334155); color: #fff; }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 3.5rem;
            color: var(--secondary-color);
        }

        .empty-state i {
            font-size: 3.5rem;
            margin-bottom: 1rem;
            opacity: 0.3;
            color: var(--border-color);
        }

        /* Form Controls */
        .form-control-custom {
            border: 2px solid var(--border-color);
            border-radius: 12px;
            padding: 0.75rem 1rem;
            font-size: 0.9rem;
            transition: all 0.25s ease;
            background: #fff;
        }

        .form-control-custom:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(14, 165, 233, 0.1);
            outline: none;
        }

        .form-control-custom::placeholder {
            color: #94a3b8;
        }

        .form-label-custom {
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 0.5rem;
        }

        .form-select-custom {
            border: 2px solid var(--border-color);
            border-radius: 12px;
            padding: 0.75rem 1rem;
            font-size: 0.9rem;
            transition: all 0.25s ease;
            background: #fff;
            cursor: pointer;
        }

        .form-select-custom:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(14, 165, 233, 0.1);
            outline: none;
        }

        /* Dropdown */
        .dropdown-menu-custom {
            border: none;
            border-radius: 16px;
            box-shadow: var(--shadow-xl);
            padding: 0.5rem;
            min-width: 200px;
            background: #fff;
        }

        .dropdown-menu-custom .dropdown-item {
            border-radius: 10px;
            padding: 0.7rem 1rem;
            font-size: 0.875rem;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-weight: 500;
        }

        .dropdown-menu-custom .dropdown-item:hover {
            background: linear-gradient(135deg, #f1f5f9, #e2e8f0);
            transform: translateX(4px);
        }

        .dropdown-menu-custom .dropdown-item.text-danger {
            color: var(--danger-color);
        }

        .dropdown-menu-custom .dropdown-item.text-danger:hover {
            background: linear-gradient(135deg, #fef2f2, #fee2e2);
        }

        /* Overlay for mobile */
        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(15, 23, 42, 0.6), rgba(30, 41, 59, 0.4));
            backdrop-filter: blur(4px);
            z-index: 1040;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .sidebar-overlay.show {
            display: block;
            opacity: 1;
        }

        /* Animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideInLeft {
            from { opacity: 0; transform: translateX(-20px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes slideInRight {
            from { opacity: 0; transform: translateX(20px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes scaleIn {
            from { opacity: 0; transform: scale(0.95); }
            to { opacity: 1; transform: scale(1); }
        }

        .animate-fade-in {
            animation: fadeIn 0.4s ease forwards;
            opacity: 0;
        }

        .animate-slide-in-left {
            animation: slideInLeft 0.4s ease forwards;
            opacity: 0;
        }

        .animate-slide-in-right {
            animation: slideInRight 0.4s ease forwards;
            opacity: 0;
        }

        .animate-scale-in {
            animation: scaleIn 0.3s ease forwards;
            opacity: 0;
        }

        .animate-delay-1 { animation-delay: 0.05s; }
        .animate-delay-2 { animation-delay: 0.1s; }
        .animate-delay-3 { animation-delay: 0.15s; }
        .animate-delay-4 { animation-delay: 0.2s; }
        .animate-delay-5 { animation-delay: 0.25s; }
        .animate-delay-6 { animation-delay: 0.3s; }

        /* Page Actions */
        .page-actions {
            display: flex;
            gap: 0.75rem;
            align-items: center;
        }

        /* Search Box */
        .search-box {
            position: relative;
        }

        .search-box .search-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 0.9rem;
        }

        .search-box input {
            padding-left: 2.75rem;
            border-radius: 12px;
            border: 2px solid var(--border-color);
            background: #f8fafc;
        }

        .search-box input:focus {
            background: #fff;
            border-color: var(--primary-color);
        }

        /* Filter Pills */
        .filter-pills {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .filter-pill {
            padding: 0.4rem 1rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            border: 2px solid var(--border-color);
            background: #fff;
            color: var(--secondary-color);
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .filter-pill:hover, .filter-pill.active {
            background: var(--primary-color);
            border-color: var(--primary-color);
            color: #fff;
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

            .top-header {
                padding: 0 1rem;
            }
        }

        @media (max-width: 575px) {
            .top-header {
                padding: 0 0.75rem;
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

            .header-btn {
                width: 38px;
                height: 38px;
            }
        }

        /* Loading Skeleton */
        .skeleton {
            background: linear-gradient(90deg, #f1f5f9 25%, #e2e8f0 50%, #f1f5f9 75%);
            background-size: 200% 100%;
            animation: shimmer 1.5s infinite;
            border-radius: 8px;
        }

        @keyframes shimmer {
            0% { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }

        /* Toast Notifications */
        .toast-container {
            position: fixed;
            top: 1.5rem;
            right: 1.5rem;
            z-index: 9999;
        }

        .toast-custom {
            background: #fff;
            border-radius: 14px;
            box-shadow: var(--shadow-xl);
            padding: 1rem 1.25rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            min-width: 300px;
            animation: slideInRight 0.3s ease;
        }

        .toast-custom .toast-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
        }

        .toast-success .toast-icon { background: #d1fae5; color: #059669; }
        .toast-error .toast-icon { background: #fee2e2; color: #dc2626; }
        .toast-warning .toast-icon { background: #fef3c7; color: #d97706; }
        .toast-info .toast-icon { background: #dbeafe; color: #2563eb; }
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
            <div class="sidebar-user-info px-3 py-3 border-bottom border-secondary border-opacity-10">
                <div class="d-flex align-items-center gap-3">
                    <div class="user-avatar" style="width: 48px; height: 48px; font-size: 1rem;">
                        {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                    </div>
                    <div class="flex-grow-1 min-w-0">
                        <div class="text-white fw-semibold text-truncate">{{ Auth::user()->name }}</div>
                        <div class="text-white-50 small">{{ Auth::user()->role?->name ?? 'User' }}</div>
                    </div>
                </div>
            </div>
            
            <nav class="sidebar-menu">
                <a href="{{ route('dashboard') }}" class="sidebar-menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="fas fa-home"></i> Dashboard
                </a>

                <div class="sidebar-section-title">Pengaturan</div>
                
                <div class="sidebar-dropdown">
                    <a class="sidebar-menu-item" data-bs-toggle="collapse" href="#pengaturanMenu" role="button" aria-expanded="false">
                        <i class="fas fa-cog"></i> Pengaturan
                        <i class="fas fa-chevron-right menu-arrow"></i>
                    </a>
                    <div class="collapse" id="pengaturanMenu">
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
                    </div>
                </div>

                <div class="sidebar-section-title">Payroll & HR</div>

                <div class="sidebar-dropdown">
                    <a class="sidebar-menu-item" data-bs-toggle="collapse" href="#hrMenu" role="button" aria-expanded="false">
                        <i class="fas fa-users"></i> Karyawan
                        <i class="fas fa-chevron-right menu-arrow"></i>
                    </a>
                    <div class="collapse" id="hrMenu">
                        <a href="{{ route('employees.index') }}" class="sidebar-menu-item {{ request()->routeIs('employees.*') ? 'active' : '' }}">
                            <i class="fas fa-user-tie"></i> Data Karyawan
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
                    </div>
                </div>

                <div class="sidebar-dropdown">
                    <a class="sidebar-menu-item" data-bs-toggle="collapse" href="#payrollMenu" role="button" aria-expanded="false">
                        <i class="fas fa-file-invoice-dollar"></i> Payroll
                        <i class="fas fa-chevron-right menu-arrow"></i>
                    </a>
                    <div class="collapse" id="payrollMenu">
                        <a href="{{ route('payrolls.index') }}" class="sidebar-menu-item {{ request()->routeIs('payrolls.*') ? 'active' : '' }}">
                            <i class="fas fa-list"></i> Daftar Payroll
                        </a>
                        <a href="{{ route('payrolls.create') }}" class="sidebar-menu-item">
                            <i class="fas fa-calculator"></i> Proses Payroll
                        </a>
                    </div>
                </div>

                <div class="sidebar-section-title">Keuangan</div>

                <div class="sidebar-dropdown">
                    <a class="sidebar-menu-item" data-bs-toggle="collapse" href="#keuanganMenu" role="button" aria-expanded="false">
                        <i class="fas fa-wallet"></i> Keuangan
                        <i class="fas fa-chevron-right menu-arrow"></i>
                    </a>
                    <div class="collapse" id="keuanganMenu">
                        <a href="{{ route('accounts.index') }}" class="sidebar-menu-item {{ request()->routeIs('accounts.*') ? 'active' : '' }}">
                            <i class="fas fa-book"></i> Bagan Akun
                        </a>
                        <a href="{{ route('journal-entries.index') }}" class="sidebar-menu-item {{ request()->routeIs('journal-entries.*') ? 'active' : '' }}">
                            <i class="fas fa-journal-whills"></i> Jurnal Umum
                        </a>
                        <a href="{{ route('budgets.index') }}" class="sidebar-menu-item {{ request()->routeIs('budgets.*') ? 'active' : '' }}">
                            <i class="fas fa-chart-pie"></i> Anggaran
                        </a>
                    </div>
                </div>

                <div class="sidebar-dropdown">
                    <a class="sidebar-menu-item" data-bs-toggle="collapse" href="#piutangMenu" role="button" aria-expanded="false">
                        <i class="fas fa-arrow-up"></i> Piutang (AR)
                        <i class="fas fa-chevron-right menu-arrow"></i>
                    </a>
                    <div class="collapse" id="piutangMenu">
                        <a href="{{ route('invoices.index') }}" class="sidebar-menu-item {{ request()->routeIs('invoices.*') ? 'active' : '' }}">
                            <i class="fas fa-file-invoice"></i> Faktur
                        </a>
                        <a href="{{ route('customers.index') }}" class="sidebar-menu-item {{ request()->routeIs('customers.*') ? 'active' : '' }}">
                            <i class="fas fa-user-friends"></i> Pelanggan
                        </a>
                    </div>
                </div>

                <div class="sidebar-dropdown">
                    <a class="sidebar-menu-item" data-bs-toggle="collapse" href="#hutangMenu" role="button" aria-expanded="false">
                        <i class="fas fa-arrow-down"></i> Hutang (AP)
                        <i class="fas fa-chevron-right menu-arrow"></i>
                    </a>
                    <div class="collapse" id="hutangMenu">
                        <a href="{{ route('bills.index') }}" class="sidebar-menu-item {{ request()->routeIs('bills.*') ? 'active' : '' }}">
                            <i class="fas fa-file-contract"></i> Tagihan
                        </a>
                        <a href="{{ route('vendors.index') }}" class="sidebar-menu-item {{ request()->routeIs('vendors.*') ? 'active' : '' }}">
                            <i class="fas fa-truck"></i> Vendor
                        </a>
                    </div>
                </div>
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
                    <div class="page-heading">
                        <h1 class="page-title">@yield('page-title', 'Dashboard')</h1>
                        <nav class="breadcrumb-custom" aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fas fa-home me-1"></i>Home</a></li>
                                <li class="breadcrumb-item active">@yield('page-title', 'Dashboard')</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="header-right">
                    <button class="header-btn" title="Notifications">
                        <i class="fas fa-bell"></i>
                        <span class="badge"></span>
                    </button>

                    <button class="header-btn" title="Settings">
                        <i class="fas fa-cog"></i>
                    </button>

                    <div class="user-dropdown" data-bs-toggle="dropdown">
                        <div class="user-avatar">
                            {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                        </div>
                        <div class="user-info">
                            <div class="user-name">{{ Auth::user()->name }}</div>
                            <div class="user-role">{{ Auth::user()->role?->name ?? 'User' }}</div>
                        </div>
                        <i class="fas fa-chevron-down text-muted" style="font-size: 0.65rem;"></i>
                    </div>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-custom">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-user-circle"></i> Profil</a></li>
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

        // Auto-expand dropdown menu based on active route
        document.addEventListener('DOMContentLoaded', function() {
            const activeItem = document.querySelector('.sidebar-menu-item.active');
            if (activeItem) {
                const parentCollapse = activeItem.closest('.collapse');
                if (parentCollapse) {
                    parentCollapse.classList.add('show');
                    const toggle = document.querySelector(`[href="#${parentCollapse.id}"]`);
                    if (toggle) {
                        toggle.setAttribute('aria-expanded', 'true');
                    }
                }
            }
        });

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

        // Toggle Password Visibility
        function togglePassword(inputId, iconId) {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);
            
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>
