@extends('layout.master')

@section('title')
    بلدية جباليا النزلة - لوحة التحكم
@endsection

@section('page_title')
    لوحة التحكم
@endsection
@section('sub_main')
    الرئيسة
@endsection
@section('sub_title')
    لوحة تحكم المخازن والمحروقات
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #1e3a8a;
            --secondary-color: #3b82f6;
            --success-color: #10b981;
            --warning-color: #f59e0b;
            --danger-color: #ef4444;
            --dark-color: #1f2937;
            --light-bg: #f8fafc;
            --card-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            --card-hover-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        body {
            background-color: var(--light-bg);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
        }

        /* Main Content */
        .main-content {
            padding: 2rem;
        }

        .content-header {
            margin-bottom: 2rem;
        }

        .page-title {
            font-size: 2.5rem;
            font-weight: bold;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
        }

        .page-subtitle {
            color: #6b7280;
            font-size: 1.2rem;
            font-weight: 500;
        }

        /* Dashboard Cards */
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .dashboard-card {
            background: linear-gradient(145deg, #ffffff, #f8fafc);
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            border: 1px solid #e5e7eb;
            position: relative;
            overflow: hidden;
        }

        .dashboard-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #3b82f6, #10b981, #f59e0b, #ef4444);
            opacity: 0.8;
        }

        .dashboard-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
            background: linear-gradient(145deg, #ffffff, #f1f5f9);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
            flex-direction: row-reverse;
        }

        .card-title {
            font-size: 0.9rem;
            color: #6b7280;
            font-weight: 500;
        }

        .card-icon {
            width: 48px;
            height: 48px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: all 0.2s ease;
            position: relative;
        }

        .card-icon::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border-radius: 8px;
            background: linear-gradient(45deg, transparent, rgba(255,255,255,0.2), transparent);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .card-icon:hover::after {
            opacity: 1;
        }

        .card-icon.blue { 
            background: linear-gradient(135deg, #3b82f6, #2563eb); 
            color: white; 
            box-shadow: 0 2px 8px rgba(59, 130, 246, 0.3);
        }
        .card-icon.green { 
            background: linear-gradient(135deg, #10b981, #059669); 
            color: white; 
            box-shadow: 0 2px 8px rgba(16, 185, 129, 0.3);
        }
        .card-icon.purple { 
            background: linear-gradient(135deg, #8b5cf6, #7c3aed); 
            color: white; 
            box-shadow: 0 2px 8px rgba(139, 92, 246, 0.3);
        }
        .card-icon.orange { 
            background: linear-gradient(135deg, #f59e0b, #d97706); 
            color: white; 
            box-shadow: 0 2px 8px rgba(245, 158, 11, 0.3);
        }
        .card-icon.red { 
            background: linear-gradient(135deg, #ef4444, #dc2626); 
            color: white; 
            box-shadow: 0 2px 8px rgba(239, 68, 68, 0.3);
        }
        .card-icon.yellow { 
            background: linear-gradient(135deg, #eab308, #ca8a04); 
            color: white; 
            box-shadow: 0 2px 8px rgba(234, 179, 8, 0.3);
        }

        .card-icon:hover {
            transform: scale(1.05);
        }

        .card-value {
            font-size: 2rem;
            font-weight: bold;
            background: linear-gradient(135deg, #1f2937, #374151);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
        }

        .card-change {
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            gap: 0.25rem;
            font-weight: 500;
        }

        .card-change.positive { 
            color: #10b981; 
            background: linear-gradient(135deg, #d1fae5, #a7f3d0);
            padding: 2px 8px;
            border-radius: 12px;
            display: inline-flex;
        }
        .card-change.negative { 
            color: #ef4444; 
            background: linear-gradient(135deg, #fee2e2, #fecaca);
            padding: 2px 8px;
            border-radius: 12px;
            display: inline-flex;
        }

        /* Fuel Status Section */
        .fuel-section {
            background: linear-gradient(135deg, rgba(255,255,255,0.9), rgba(255,255,255,0.7));
            backdrop-filter: blur(20px);
            border-radius: 25px;
            padding: 3rem 2rem;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            text-align: center;
            border: 1px solid rgba(255,255,255,0.3);
            position: relative;
            overflow: hidden;
        }

        .fuel-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(245, 158, 11, 0.1), rgba(239, 68, 68, 0.1), rgba(139, 92, 246, 0.1));
            animation: color-shift 4s ease infinite;
        }

        .fuel-icon {
            font-size: 4.5rem;
            background: linear-gradient(135deg, #f59e0b, #ef4444, #8b5cf6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1.5rem;
            animation: pulse 2s ease infinite;
            position: relative;
            z-index: 1;
        }

        .fuel-title {
            font-size: 1.8rem;
            font-weight: bold;
            background: linear-gradient(135deg, #1f2937, #374151);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.8rem;
            position: relative;
            z-index: 1;
        }

        .fuel-message {
            color: rgba(55, 65, 81, 0.8);
            font-size: 1.1rem;
            position: relative;
            z-index: 1;
        }

        /* Animations */
        @keyframes gradient-shift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        @keyframes color-shift {
            0%, 100% { opacity: 0.3; }
            50% { opacity: 0.6; }
        }

        @keyframes shine {
            0% { transform: rotate(45deg) translateY(-100%); opacity: 0; }
            50% { opacity: 1; }
            100% { transform: rotate(45deg) translateY(100%); opacity: 0; }
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }

        /* Archive Cards */
        .archive-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .archive-card {
            background: #ffffff;
            border-radius: 12px;
            padding: 1.5rem;
            text-align: center;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            border: 1px solid #e5e7eb;
            cursor: pointer;
        }

        .archive-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .archive-icon {
            font-size: 2rem;
            margin-bottom: 1rem;
            width: 48px;
            height: 48px;
            margin: 0 auto 1rem;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: all 0.2s ease;
        }

        .archive-icon.text-primary {
            background: #3b82f6;
            color: white;
        }

        .archive-icon.text-success {
            background: #10b981;
            color: white;
        }

        .archive-icon.text-info {
            background: #06b6d4;
            color: white;
        }

        .archive-icon.text-danger {
            background: #ef4444;
            color: white;
        }

        .archive-icon.text-warning {
            background: #f59e0b;
            color: white;
        }

        .archive-icon:hover {
            transform: scale(1.05);
        }

        .archive-title {
            font-weight: bold;
            color: var(--dark-color);
            margin-bottom: 0.5rem;
        }

        .archive-count {
            color: #6b7280;
            font-size: 0.9rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .dashboard-grid {
                grid-template-columns: 1fr;
            }
            
            .archive-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
@endsection


@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Main Content -->
            <div class="col-12">
                <div class="main-content">
                    <!-- Header -->
                    <div class="content-header">
                        <h1 class="page-title">لوحة التحكم</h1>
                        <p class="page-subtitle">لوحة تحكم المخازن والمحروقات - نظرة عامة على حالة المخزون والحركات</p>
                    </div>
                    
                    <!-- Archive Section -->
                    <div class="archive-grid">
                        <div class="archive-card" onclick="window.location.href='#'">
                            <div class="archive-icon text-primary">
                                <i class="fas fa-archive"></i>
                            </div>
                            <div class="archive-title">الأرشيف المركزي</div>
                            <div class="archive-count">
                                {{ \App\Models\Archive::count() }} وارد & {{ \App\Models\ArchiveExport::count() }} صادر
                            </div>
                        </div>
                        
                        <div class="archive-card" onclick="window.location.href='#'">
                            <div class="archive-icon text-success">
                                <i class="fas fa-laptop"></i>
                            </div>
                            <div class="archive-title">الحاسوب</div>
                            <div class="archive-count">
                                {{ \App\Models\Computer::count() }} وارد & {{ \App\Models\ComputerExport::count() }} صادر
                            </div>
                        </div>
                        
                        <div class="archive-card" onclick="window.location.href='#'">
                            <div class="archive-icon text-info">
                                <i class="fas fa-eye"></i>
                            </div>
                            <div class="archive-title">الرقابة</div>
                            <div class="archive-count">
                                {{ \App\Models\Censorship::count() }} وارد & {{ \App\Models\CensorshipExport::count() }} صادر
                            </div>
                        </div>
                        
                        <div class="archive-card" onclick="window.location.href='#'">
                            <div class="archive-icon text-danger">
                                <i class="fas fa-gavel"></i>
                            </div>
                            <div class="archive-title">الشؤون القانونية</div>
                            <div class="archive-count">
                                {{ \App\Models\Legal::count() }} وارد & {{ \App\Models\LegalExport::count() }} صادر
                            </div>
                        </div>
                        
                        <div class="archive-card" onclick="window.location.href='#'">
                            <div class="archive-icon text-warning">
                                <i class="fas fa-hand-holding-usd"></i>
                            </div>
                            <div class="archive-title">الجباية</div>
                            <div class="archive-count">
                                {{ \App\Models\Jibaya::count() }} وارد & {{ \App\Models\JibayaExport::count() }} صادر
                            </div>
                        </div>
                    </div>
                    
                    <!-- Dashboard Cards -->
                    <div class="dashboard-grid">
                        <div class="dashboard-card">
                            <div class="card-header">
                                <div class="card-title">إجمالي الأصناف</div>
                                <div class="card-icon blue">
                                    <i class="fas fa-boxes"></i>
                                </div>
                            </div>
                            <div class="card-value">{{ \App\Models\Item::count() }}</div>
                            <div class="card-change positive">
                                <i class="fas fa-arrow-up"></i>
                                <span>12% من الشهر الماضي</span>
                            </div>
                        </div>
                        
                        <div class="dashboard-card">
                            <div class="card-header">
                                <div class="card-title">فواتير الوارد</div>
                                <div class="card-icon green">
                                    <i class="fas fa-arrow-down"></i>
                                </div>
                            </div>
                            <div class="card-value">{{ \App\Models\Invoice::count() }}</div>
                            <div class="card-change negative">
                                <i class="fas fa-arrow-down"></i>
                                <span>0.00 ₪</span>
                            </div>
                        </div>
                        
                        <div class="dashboard-card">
                            <div class="card-header">
                                <div class="card-title">طلبات معلقة</div>
                                <div class="card-icon purple">
                                    <i class="fas fa-clipboard-list"></i>
                                </div>
                            </div>
                            <div class="card-value">0</div>
                            <div class="card-change">
                                <i class="fas fa-minus"></i>
                                <span>لا توجد طلبات</span>
                            </div>
                        </div>
                        
                        <div class="dashboard-card">
                            <div class="card-header">
                                <div class="card-title">عهد متأخرة</div>
                                <div class="card-icon orange">
                                    <i class="fas fa-clock"></i>
                                </div>
                            </div>
                            <div class="card-value">0</div>
                            <div class="card-change">
                                <i class="fas fa-check"></i>
                                <span>جميع العهد مستلمة</span>
                            </div>
                        </div>
                        
                        <div class="dashboard-card">
                            <div class="card-header">
                                <div class="card-title">نفد من المخزون</div>
                                <div class="card-icon red">
                                    <i class="fas fa-times"></i>
                                </div>
                            </div>
                            <div class="card-value">5</div>
                            <div class="card-change negative">
                                <i class="fas fa-exclamation"></i>
                                <span>يتطلب إعادة تعبئة</span>
                            </div>
                        </div>
                        
                        <div class="dashboard-card">
                            <div class="card-header">
                                <div class="card-title">مخزون منخفض</div>
                                <div class="card-icon yellow">
                                    <i class="fas fa-triangle-exclamation"></i>
                                </div>
                            </div>
                            <div class="card-value">5</div>
                            <div class="card-change negative">
                                <i class="fas fa-exclamation"></i>
                                <span>أقل من الحد الأدنى</span>
                            </div>
                        </div>
                        
                        <div class="dashboard-card">
                            <div class="card-header">
                                <div class="card-title">سندات الصرف</div>
                                <div class="card-icon red">
                                    <i class="fas fa-arrow-up"></i>
                                </div>
                            </div>
                            <div class="card-value">{{ \App\Models\InvoiceExport::count() }}</div>
                            <div class="card-change positive">
                                <i class="fas fa-arrow-up"></i>
                                <span>0.00 ₪</span>
                            </div>
                        </div>
                        
                        <div class="dashboard-card">
                            <div class="card-header">
                                <div class="card-title">عهد نشطة</div>
                                <div class="card-icon purple">
                                    <i class="fas fa-handshake"></i>
                                </div>
                            </div>
                            <div class="card-value">{{ \App\Models\Custody::count() }}</div>
                            <div class="card-change positive">
                                <i class="fas fa-arrow-up"></i>
                                <span>جميعها نشطة</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Fuel Status Section -->
                    <div class="fuel-section">
                        <div class="fuel-icon">
                            <i class="fas fa-gas-pump"></i>
                        </div>
                        <div class="fuel-title">حالة المحروقات</div>
                        <div class="fuel-message">لم يتم إضافة أنواع محروقات بعد</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
// Add some interactivity
document.addEventListener('DOMContentLoaded', function() {
    // Animate cards on load
    const cards = document.querySelectorAll('.dashboard-card, .archive-card');
    cards.forEach((card, index) => {
        setTimeout(() => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'all 0.5s ease';
            
            setTimeout(() => {
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, 100);
        }, index * 50);
    });
});
</script>
@endsection
