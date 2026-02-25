# FINORA - FINancial & Operational Reporting Application

## 1. Overview
FINORA is a comprehensive web-based application designed to streamline financial reporting and operational management, including a robust payroll system. Built with Laravel 12, it aims to provide a full-featured solution for businesses to manage their finances, employee payroll, and various operational aspects with different levels of access for different roles.

## 2. Core Features

### Financial Reporting
- **Dashboard:** Overview of key financial metrics (revenue, expenses, profit, cash flow).
- **Chart of Accounts Management:** Create, edit, and manage all accounts.
- **General Ledger:** Record all financial transactions.
- **Journal Entries:** Manual and automated journal entry creation.
- **Balance Sheet:** Generate reports showing assets, liabilities, and equity.
- **Income Statement (P&L):** Generate reports showing revenues, costs, and profits.
- **Cash Flow Statement:** Generate reports on cash inflows and outflows.
- **Budgeting & Forecasting:** Tools for setting budgets and forecasting financial performance.
- **Accounts Receivable:** Manage customer invoices and payments.
- **Accounts Payable:** Manage vendor bills and payments.
- **Bank Reconciliation:** Reconcile bank statements with ledger.

### Payroll System
- **Employee Management:** Add, edit, and manage employee details (personal, employment, salary).
- **Salary Structure Management:** Define and manage different salary components (basic, allowances, deductions).
- **Attendance Tracking:** Record and manage employee attendance (manual or integrated).
- **Leave Management:** Process leave requests and track leave balances.
- **Payroll Processing:** Automated calculation of salaries, taxes, and deductions.
- **Payslip Generation:** Generate and distribute detailed payslips.
- **Tax & Compliance Reporting:** Generate reports for tax filings and regulatory compliance.
- **Loan & Advance Management:** Manage employee loans and advances.

### Operational Management
- **User Management:** Create, edit, and manage user accounts and roles.
- **Role & Permission Management:** Assign specific permissions to each role.
- **Audit Trails:** Log all significant system activities for accountability.
- **Notifications:** Real-time system notifications and alerts.
- **Report Generation:** Customizable reporting for various operational data.

## 3. User Roles and Permissions

FINORA will feature a multi-tiered role system to ensure secure and appropriate access to functionalities.

### Super Admin
- **Description:** Full control over the entire system. Responsible for initial setup, system configuration, and managing all other roles.
- **Access Rights:**
    - All Financial Reporting features.
    - All Payroll System features.
    - Full User Management (create, edit, delete all users and assign roles).
    - Full Role & Permission Management.
    - System Configuration & Settings.
    - Access to Audit Logs.
    - Backup and Restore functionalities.

### Admin
- **Description:** Manages day-to-day operations for a specific department or the entire organization, excluding super-admin level configurations.
- **Access Rights:**
    - All Financial Reporting features (potentially with some restrictions on sensitive configurations).
    - All Payroll System features (manage employees, process payroll, generate payslips).
    - User Management for non-super-admin roles (create, edit, delete regular users, assign manager/staff roles).
    - Manage operational reports.
    - View Audit Trails (no modification).

### Manager
- **Description:** Oversees a team or department. Focuses on team performance, approvals, and departmental reports.
- **Access Rights:**
    - View Financial Reports relevant to their department.
    - View Payroll reports for their team.
    - Approve Leave Requests.
    - Approve Expense Reports (if applicable).
    - Manage attendance for their team.
    - Generate departmental reports.
    - No direct access to sensitive system configurations or user management beyond their team.

### Staff/Employee
- **Description:** General employees with limited access, primarily for personal information and requests.
- **Access Rights:**
    - View own payslips.
    - Apply for leave.
    - View own attendance records.
    - View own profile and update personal details (limited).
    - No access to financial or payroll management features beyond personal data.

## 4. Technical Stack

- **Framework:** Laravel 12 (PHP)
- **Frontend Styling:**
    - Bootstrap (CDN: `https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css`)
    - Custom CSS for additional styling (`resources/css/app.css`)
- **Icons:** Font Awesome (CDN: `https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css`)
- **Templating:**
    - Blade Templates for views.
    - Layouts (`resources/views/layouts/app.blade.php`)
    - Partials (`resources/views/partials/_header.blade.php`, `resources/views/partials/_sidebar.blade.php`, etc.)
    - `@stack` and `@push` directives for dynamic content injection in layouts (referencing `Illuminate\View\Concerns\ManagesStacks.php`).
- **Content Per Page:** Dynamic content loaded into `yield` sections within layouts.
- **Notifications:** SweetAlert2 (CDN: `https://cdn.jsdelivr.net/npm/sweetalert2@11`) for interactive and visually appealing alerts.

## 5. Database Schema (Conceptual)

Below is a conceptual database schema outlining key tables and their relationships. This will be implemented using Laravel migrations.

```mermaid
erDiagram
    USERS {
        id INT PK
        name VARCHAR
        email VARCHAR UNIQUE
        password VARCHAR
        role_id INT FK
        employee_id INT FK
        created_at DATETIME
        updated_at DATETIME
    }

    ROLES {
        id INT PK
        name VARCHAR UNIQUE
        description TEXT
        created_at DATETIME
        updated_at DATETIME
    }

    PERMISSIONS {
        id INT PK
        name VARCHAR UNIQUE
        description TEXT
        created_at DATETIME
        updated_at DATETIME
    }

    ROLE_PERMISSIONS {
        role_id INT FK
        permission_id INT FK
        PRIMARY KEY (role_id, permission_id)
    }

    EMPLOYEES {
        id INT PK
        user_id INT FK
        first_name VARCHAR
        last_name VARCHAR
        date_of_birth DATE
        gender VARCHAR
        address TEXT
        phone_number VARCHAR
        hire_date DATE
        job_title VARCHAR
        department_id INT FK
        salary_structure_id INT FK
        status VARCHAR
        created_at DATETIME
        updated_at DATETIME
    }

    DEPARTMENTS {
        id INT PK
        name VARCHAR UNIQUE
        description TEXT
        created_at DATETIME
        updated_at DATETIME
    }

    SALARY_STRUCTURES {
        id INT PK
        name VARCHAR
        basic_salary DECIMAL
        created_at DATETIME
        updated_at DATETIME
    }

    SALARY_COMPONENTS {
        id INT PK
        salary_structure_id INT FK
        name VARCHAR
        type ENUM('allowance', 'deduction')
        amount DECIMAL
        is_percentage BOOLEAN
        created_at DATETIME
        updated_at DATETIME
    }

    ATTENDANCE {
        id INT PK
        employee_id INT FK
        date DATE
        check_in_time DATETIME
        check_out_time DATETIME
        status VARCHAR
        created_at DATETIME
        updated_at DATETIME
    }

    LEAVE_APPLICATIONS {
        id INT PK
        employee_id INT FK
        leave_type_id INT FK
        start_date DATE
        end_date DATE
        reason TEXT
        status ENUM('pending', 'approved', 'rejected')
        approved_by INT FK (USERS.id)
        created_at DATETIME
        updated_at DATETIME
    }

    LEAVE_TYPES {
        id INT PK
        name VARCHAR UNIQUE
        description TEXT
        max_days INT
        created_at DATETIME
        updated_at DATETIME
    }

    PAYROLLS {
        id INT PK
        employee_id INT FK
        pay_period_start DATE
        pay_period_end DATE
        gross_salary DECIMAL
        total_deductions DECIMAL
        net_salary DECIMAL
        status VARCHAR
        processed_by INT FK (USERS.id)
        created_at DATETIME
        updated_at DATETIME
    }

    PAYSLIPS {
        id INT PK
        payroll_id INT FK
        employee_id INT FK
        file_path VARCHAR
        generated_date DATETIME
        created_at DATETIME
        updated_at DATETIME
    }

    CHART_OF_ACCOUNTS {
        id INT PK
        account_name VARCHAR
        account_number VARCHAR UNIQUE
        account_type ENUM('asset', 'liability', 'equity', 'revenue', 'expense')
        parent_account_id INT FK
        created_at DATETIME
        updated_at DATETIME
    }

    TRANSACTIONS {
        id INT PK
        transaction_date DATE
        description TEXT
        reference_number VARCHAR
        transaction_type ENUM('debit', 'credit')
        created_at DATETIME
        updated_at DATETIME
    }

    JOURNAL_ENTRIES {
        id INT PK
        transaction_id INT FK
        account_id INT FK (CHART_OF_ACCOUNTS.id)
        debit DECIMAL
        credit DECIMAL
        created_at DATETIME
        updated_at DATETIME
    }

    BUDGETS {
        id INT PK
        name VARCHAR
        start_date DATE
        end_date DATE
        total_amount DECIMAL
        created_at DATETIME
        updated_at DATETIME
    }

    BUDGET_ALLOCATIONS {
        id INT PK
        budget_id INT FK
        account_id INT FK (CHART_OF_ACCOUNTS.id)
        allocated_amount DECIMAL
        created_at DATETIME
        updated_at DATETIME
    }

    INVOICES {
        id INT PK
        customer_id INT FK
        invoice_number VARCHAR UNIQUE
        invoice_date DATE
        due_date DATE
        total_amount DECIMAL
        status ENUM('pending', 'paid', 'overdue')
        created_at DATETIME
        updated_at DATETIME
    }

    CUSTOMERS {
        id INT PK
        name VARCHAR
        email VARCHAR
        phone VARCHAR
        address TEXT
        created_at DATETIME
        updated_at DATETIME
    }

    BILLS {
        id INT PK
        vendor_id INT FK
        bill_number VARCHAR UNIQUE
        bill_date DATE
        due_date DATE
        total_amount DECIMAL
        status ENUM('pending', 'paid', 'overdue')
        created_at DATETIME
        updated_at DATETIME
    }

    VENDORS {
        id INT PK
        name VARCHAR
        email VARCHAR
        phone VARCHAR
        address TEXT
        created_at DATETIME
        updated_at DATETIME
    }

    USERS ||--o{ ROLES : "has"
    USERS ||--o{ EMPLOYEES : "manages"
    ROLES ||--o{ ROLE_PERMISSIONS : "defines"
    PERMISSIONS ||--o{ ROLE_PERMISSIONS : "is_assigned_to"
    EMPLOYEES ||--o{ DEPARTMENTS : "belongs_to"
    EMPLOYEES ||--o{ SALARY_STRUCTURES : "has"
    SALARY_STRUCTURES ||--o{ SALARY_COMPONENTS : "includes"
    EMPLOYEES ||--o{ ATTENDANCE : "logs"
    EMPLOYEES ||--o{ LEAVE_APPLICATIONS : "submits"
    LEAVE_TYPES ||--o{ LEAVE_APPLICATIONS : "specifies"
    EMPLOYEES ||--o{ PAYROLLS : "generates"
    PAYROLLS ||--o{ PAYSLIPS : "creates"
    CHART_OF_ACCOUNTS ||--o{ JOURNAL_ENTRIES : "is_involved_in"
    TRANSACTIONS ||--o{ JOURNAL_ENTRIES : "details"
    BUDGETS ||--o{ BUDGET_ALLOCATIONS : "contains"
    CHART_OF_ACCOUNTS ||--o{ BUDGET_ALLOCATIONS : "allocates_to"
    CUSTOMERS ||--o{ INVOICES : "receives"
    VENDORS ||--o{ BILLS : "sends"
    INVOICES ||--o{ TRANSACTIONS : "records_payment"
    BILLS ||--o{ TRANSACTIONS : "records_payment"
```

## 6. Notifications

- **SweetAlert2:** For user-friendly and interactive notifications (success messages, error alerts, confirmation dialogs).
    - Example usage:
        ```javascript
        // Success
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: 'Operation completed successfully.',
            timer: 2000,
            showConfirmButton: false
        });

        // Error
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'Something went wrong. Please try again.',
        });

        // Confirmation
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Perform deletion
            }
        });
        ```
- **In-app notifications:** A notification bell icon for system-generated alerts (e.g., new leave requests, overdue invoices).
- **Email notifications:** For critical events (e.g., payroll processed, password reset).
