<div class="ml-5 btn-group">
    <button type="button" class="btn btn-primary font-weight-bolder">
        اختر :
    </button>
    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    </button>
    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
        <ul class="nav nav-hover flex-column">

            <li class="nav-item">
                <a href="{{ url('/inventory/unit/create') }}" class="nav-link">
                    <i class="nav-icon flaticon2-add-1"></i> إضافة وحدة
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/inventory/category/create') }}" class="nav-link">
                    <i class="nav-icon flaticon2-add-1"></i> إضافة عائلة
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ url('/inventory/item/create') }}" class="nav-link">
                    <i class="nav-icon flaticon2-add-1"></i> إضافة صنف
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/inventory/store/create') }}" class="nav-link">
                    <i class="nav-icon flaticon2-add-1"></i> إضافة مخزن
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/inventory/supplier_item/create') }}" class="nav-link">
                    <i class="nav-icon flaticon2-add-1"></i> إضافة مورد
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/inventory/invoice/create') }}" class="nav-link">
                    <i class="nav-icon flaticon2-add-1"></i> إضافة سند ادخال
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/inventory/invoice_export/create') }}" class="nav-link">
                    <i class="nav-icon flaticon2-add-1"></i> إضافة سند صرف
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/inventory/custody/create') }}" class="nav-link">
                    <i class="nav-icon flaticon2-add-1"></i> إضافة عهدة </a>
            </li>
        </ul>
    </div>
</div>