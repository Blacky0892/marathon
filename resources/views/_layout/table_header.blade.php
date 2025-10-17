@if(isset($includes))
{{-- Controls Start --}}
<div class="row">
    <div class="col-sm-12 col-md-7 col-lg-9 col-xxl-10 text-start mb-1">
        <div class="d-inline-block">

            @if(in_array('check', $includes))
            <div class="d-inline-block"
                 id="datatableCheckAllButton">
                <span class="btn btn-icon btn-icon-only btn-foreground-alternate shadow dropdown">
                    <input type="checkbox" class="form-check-input mt-0" id="datatableCheckAll"/>
                </span>
            </div>
            @endif

            @yield('inline-buttons')

            @if(in_array('export', $includes))
            {{-- Export Dropdown Start --}}
            <div class="d-inline-block datatable-export" data-datatable="#{{$table}}">
                <button class="btn p-0" type="button"
                        data-bs-offset="0,3">
                    <span class="btn btn-icon btn-icon-only btn-foreground-alternate shadow dropdown"
                          data-bs-delay="0" data-bs-placement="top" data-bs-toggle="tooltip"
                          title="Экспорт">
                        <i data-acorn-icon="download"></i>
                    </span>
                </button>
            </div>
            {{-- Export Dropdown End --}}
            @endif

            @if(in_array('pages', $includes))
            {{-- Length Start --}}
            <div class="dropdown-as-select d-inline-block datatable-length"
                 data-datatable="#{{$table}}" data-childSelector="span">
                <button class="btn p-0 shadow" type="button" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" data-bs-offset="0,3">
                                    <span class="btn btn-foreground-alternate dropdown-toggle" data-bs-toggle="tooltip"
                                          data-bs-placement="top" data-bs-delay="0" title="Количество записей">
                                        50 Записей
                                    </span>
                </button>
                <div class="dropdown-menu shadow dropdown-menu-end">
                    <a class="dropdown-item" href="#">10 Записей</a>
                    <a class="dropdown-item" href="#">25 Записей</a>
                    <a class="dropdown-item active" href="#">50 Записей</a>
                    <a class="dropdown-item" href="#">75 Записей</a>
                    <a class="dropdown-item" href="#">100 Записей</a>
                </div>
            </div>
            {{-- Length End --}}
            @endif
            @if(in_array('add', $includes))
                <div class="d-inline-block me-0 me-sm-3 float-start float-md-none">
                    <a href="{{$includes['addLink'] ?? '#'}}" class="btn btn-foreground-alternate shadow add-datatable">
                        <i data-acorn-icon="plus" data-acorn-size="16"></i>
                        {{$includes['addTitle'] ?? 'Добавить'}}
                    </a>
                </div>
            @endif
        </div>
    </div>

    @if(in_array('search', $includes))
    {{-- Search Start --}}
    <div class="col-sm-12 col-md-5 col-lg-3 col-xxl-2 mb-1">
        <div
            class="d-inline-block float-md-start me-1 mb-1 search-input-container w-100 shadow bg-foreground">
            <input class="form-control datatable-search" placeholder="Поиск"
                   data-datatable="#{{$table}}"/>
            <span class="search-magnifier-icon">
                                <i data-acorn-icon="search"></i>
                            </span>
            <span class="search-delete-icon d-none">
                                <i data-acorn-icon="close"></i>
                            </span>
        </div>
    </div>
    {{-- Search End --}}
    @endif



</div>
{{-- Controls End --}}
@endif
