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
                <a href="{{ url('/inventory/TypesFuel') }}" class="nav-link" target='_blank'>
                    <i class="nav-icon flaticon2-add-1"></i>  نوع المحروقات
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/supplier/create') }}" class="nav-link" target='_blank'>
                    <i class="nav-icon flaticon2-add-1"></i>  موردي المحروقات
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/diesel/create') }}" class="nav-link" target='_blank'>
                    <i class="nav-icon flaticon2-add-1"></i>  وارد المحروقات 
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/dieselexport/create') }}" class="nav-link" target='_blank'>
                    <i class="nav-icon flaticon2-add-1"></i>  صادر المحروقات 
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/inventory/unit/create') }}" class="nav-link" target='_blank'>
                    <i class="nav-icon flaticon2-add-1"></i>  وحدة
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/inventory/category/create') }}" class="nav-link" target='_blank'>
                    <i class="nav-icon flaticon2-add-1"></i>  عائلة
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ url('/inventory/item/create') }}" class="nav-link" target='_blank'>
                    <i class="nav-icon flaticon2-add-1"></i>  صنف
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ url('/inventory/supplier_item/create') }}" class="nav-link" target='_blank'>
                    <i class="nav-icon flaticon2-add-1"></i>  موردي الأصناف
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/inventory/invoice/create') }}" class="nav-link" target='_blank'>
                    <i class="nav-icon flaticon2-add-1"></i>  سند ادخال
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/inventory/invoice_export/create') }}" class="nav-link" target='_blank'>
                    <i class="nav-icon flaticon2-add-1"></i>  سند صرف
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/inventory/custody/create') }}" class="nav-link" target='_blank'>
                    <i class="nav-icon flaticon2-add-1"></i>  عهدة </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/section/create') }}" class="nav-link" target='_blank'>
                    <i class="nav-icon flaticon2-add-1"></i>  الدوائر </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/subSection/create') }}" class="nav-link" target='_blank'>
                    <i class="nav-icon flaticon2-add-1"></i>  الأقسام الفرعية </a>
            </li>
        </ul>
    </div>
</div>